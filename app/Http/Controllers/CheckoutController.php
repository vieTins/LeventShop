<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\alert;

session_start();
class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        return view("pages.checkout.login_checkout")->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table("tbl_customer")->insertGetId($data); // insertGetId() return id of inserted row
        Session::put("customer_id", $customer_id);
        Session::put("customer_name", $request->customer_name);
        return Redirect::to("/login-checkout");
    }
    public function checkout()
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        // seo 
        $meta_desc = "";
        $meta_keywords = "";
        $meta_title = "";
        $url_canonical = "";
        $city = City::orderBy('matp', 'ASC')->get();
        return view("pages.checkout.checkout")->with('category', $cate_product)->with('brand', $brand_product)
            ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
            ->with('city', $city);
    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data2 = array();
        // insert shipping address
        $city = City::where('matp', $request->city)->first();
        $district = Province::where('ma_city', $city->matp)->where('maqh', $request->district)->first();
        $ward = Ward::where('ma_district', $district->maqh)->where('xaid', $request->ward)->first();
        $data['shipping_name'] = $request->shipping_first_name . " " . $request->shipping_last_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address . " , " . $ward->name_ward . " , " . $district->name_district . " , " . $city->name_city;
        $data['shipping_zipcode'] = $request->shipping_zipCode;
        $data['shipping_notes'] = $request->shipping_notes;
        $data["created_at"] = now();
        $data["updated_at"] = now();
        $shipping_id = DB::table("tbl_shipping")->insertGetId($data);
        Session::put("shipping_id", $shipping_id);
        // insert billing address
        $data2['billing_name'] = $request->billing_first_name . " " . $request->billing_last_name;
        $data2['billing_email'] = $request->billing_email;
        $data2['billing_phone'] = $request->billing_phone;
        $data2['billing_address'] = $request->billing_address;
        $data2['billing_zipcode'] = $request->billing_zipCode;
        if ($request->payment_method == "banktransfer") {
            $data2['billing_method'] = "banktransfer";
        } else {
            $data2['billing_method'] = "cod";
        }
        $data2['billing_status'] = "pending processing";
        $data2["created_at"] = now();
        $data2["updated_at"] = now();
        $billing_id = DB::table("tbl_billing_address")->insertGetId($data2);
        Session::put("billing_id", $billing_id);
        // insert order
        $data3 = array();
        $sessionCart = Session::get('cart', []);
        if (!is_array($sessionCart)) {
            $sessionCart = [];
        }
        $sessionCartNormalized = [];
        foreach ($sessionCart as $item) {
            if (is_array($item)) {
                $sessionCartNormalized[] = [
                    'id' => $item['product_id'],
                    'name' => $item['product_name'],
                    'image' => $item['product_image'],
                    'price' => $item['product_price'],
                    'qty' => $item['product_qty'],
                ];
            }
        }
        $finalCart = [];
        foreach ($sessionCartNormalized as $item) {
            if (isset($finalCart[$item['id']])) {
                $finalCart[$item['id']]['qty'] += $item['qty'];
            } else {
                $finalCart[$item['id']] = $item;
            }
        }
        $newarray = array_values($finalCart);
        $content = $newarray;

        $cart = $content;
        $data3['customer_id'] = Session::get("customer_id");
        $data3["shipping_id"] = Session::get("shipping_id");
        $data3["billing_id"] = $billing_id;
        $data3["order_total"] = Cart::priceTotal();
        $data3["order_status"] = "pending processing";
        $data3["created_at"] = now();
        $data3["updated_at"] = now();
        $order_id = DB::table("tbl_order")->insertGetId($data3);
        // insert order detail
        $data4 = array();
        foreach ($cart as $v_cart) {
            $data4['order_id'] = $order_id;
            $data4["product_id"] = $v_cart['id'];
            $data4["product_name"] = $v_cart['name'];
            $data4["product_price"] = $v_cart['price'];
            $data4["product_sales_quantity"] = $v_cart['qty'];
            DB::table("tbl_order_details")->insert($data4);
        }
        if ($data2['billing_method'] == "banktransfer") {
            return Redirect::to("/information-order");
        } else {
            return Redirect::to("/information-order");
        }
    }
    public function infor_oder()
    {
        // Lấy danh mục sản phẩm
        $cate_product = DB::table("tbl_category_product")
            ->where("category_status", "1")
            ->orderBy("category_id", "desc")
            ->get();

        // Lấy danh sách thương hiệu sản phẩm
        $brand_product = DB::table("tbl_brand")
            ->where("brand_status", "1")
            ->orderBy("brand_id", "desc")
            ->get();

        // Lấy ID khách hàng từ session
        $customer_id = Session::get('customer_id');

        // Lấy tất cả đơn hàng của khách hàng
        $orders = Order::where("customer_id", $customer_id)->get();

        if ($orders->isEmpty()) {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng nào.');
        }

        // Tạo danh sách dữ liệu đơn hàng
        $orders_data = [];
        foreach ($orders as $order) {
            $shipping_id = $order->shipping_id;
            $order_code = $order->order_code;

            // Lấy thông tin vận chuyển và chi tiết đơn hàng
            $shipping = Shipping::where("shipping_id", $shipping_id)->first();
            $order_detail = OrderDetails::where("order_code", $order_code)
                ->get();
            // Đưa dữ liệu đơn hàng vào mảng
            $orders_data[] = [
                'order' => $order,
                'shipping' => $shipping,
                'order_detail' => $order_detail,
            ];
        }

        // SEO metadata
        $meta_desc = "Thông tin đơn hàng";
        $meta_keywords = "đơn hàng, chi tiết";
        $meta_title = "Chi tiết đơn hàng";
        $url_canonical = url()->current();
        // Trả về view với dữ liệu
        return view("pages.checkout.handcash")
            ->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('meta_desc', $meta_desc)
            ->with('meta_keywords', $meta_keywords)
            ->with('meta_title', $meta_title)
            ->with('url_canonical', $url_canonical)
            ->with('orders_data', $orders_data);
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to("/login-checkout");
    }
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table("tbl_customer")->where("customer_email", $email)->where("customer_password", $password)->first();
        if ($result) {
            Session::put("customer_id", $result->customer_id);
            Session::put("customer_name", $result->customer_name);
            Session::put("message", "Welcome " . $result->customer_name);
            return Redirect::to("/home");
        } else {
            Session::put("message", "Email or password is incorrect");
            return Redirect::to("/login-checkout");
        }
    }
    public function select_delivery_home(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'city') {
                $select_province = Province::where('ma_city', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output .= '<option value="">Select District</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option class="district_option" value="' . $province->maqh . '">' . $province->name_district . '</option>';
                }
            } else {
                $select_wards = Ward::where('ma_district', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output .= '<option value="">Select Ward</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option class="ward_option" value="' . $ward->xaid . '">' . $ward->name_ward . '</option>';
                }
            }
        }
        echo $output;
    }
    public function caculate_fee(Request $request)
    {
        $data = $request->all();
        if ($data['matp']) {
            $feeship  = Feeship::where('fee_city_id', $data['matp'])->where('fee_district_id', $data['maqh'])->where('fee_ward_id', $data['xaid'])->get();
            if ($feeship) {
                $count_feeship = $feeship->count();
                if ($count_feeship > 0) {
                    foreach ($feeship as $key => $fee) {
                        Session::put('fee', $fee->fee_feeship);
                        Session::save();
                    }
                } else {
                    Session::put('fee', 40);
                    Session::save();
                }
            }
        }
    }
    public function confirm_order(Request $request)
    {
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_zipcode = $data['shipping_zipCode'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;
        $order = new Order();
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->order_date = now()->format('Y-m-d h:i:s A');
        $order->order_code = $checkout_code;
        $order->save();
        $sessionCart = Session::get('cart');
        if (!is_array($sessionCart)) {
            $sessionCart = [];
        }
        $sessionCartNormalized = [];
        foreach ($sessionCart as $item) {
            if (is_array($item)) {
                $sessionCartNormalized[] = [
                    'id' => $item['product_id'],
                    'name' => $item['product_name'],
                    'image' => $item['product_image'],
                    'price' => $item['product_price'],
                    'qty' => $item['product_qty'],
                ];
            }
        }
        $finalCart = [];
        foreach ($sessionCartNormalized as $item) {
            if (isset($finalCart[$item['id']])) {
                $finalCart[$item['id']]['qty'] += $item['qty'];
            } else {
                $finalCart[$item['id']] = $item;
            }
        }
        $newarray = array_values($finalCart);
        $content = $newarray;
        $Cart = $content;
        if ($Cart) {
            foreach ($Cart as $cart) {
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['id'];
                $order_details->product_name =  $cart['name'];
                $order_details->product_price = $cart['price'];
                $order_details->product_sales_quantity = $cart['qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }
        // send-mail
        $customer = Customer::find(Session::get('customer_id'));
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $titel_mail = 'Order Confirmation at ' . $now;
        $cart_array = [];

        if (Session::get('cart')) {
            foreach (Session::get('cart') as $key => $cart_mail) {
                $cart_array[] = [
                    'product_name' => $cart_mail['product_name'],
                    'product_qty' => $cart_mail['product_qty'],
                    'product_price' => $cart_mail['product_price'],
                    'product_image' => $cart_mail['product_image'],
                ];
            }
        }

        $shipping_array = [
            'customer_name' => $customer->customer_name,
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $customer->customer_phone,
            'shipping_address' => $data['shipping_address'],
            'shipping_method' => $customer->shipping_method,
            'shipping_notes' => $data['shipping_notes'],
            'shipping_zipcode' => $customer->customer_zipcode,
            'shipping_date' => $now,
        ];

        $ordercode_mail = [
            'coupon_code' => Session::get('order_coupon'),
            'feeship' => Session::get('order_fee'),
            'order_code' => $checkout_code,
        ];

        // Prepare customer data
        $customerData = [
            'email' => $data['shipping_email'],
            'name' => $customer->customer_name,
            'cart_array' => $cart_array,
            'shipping_array' => $shipping_array,
            'ordercode_mail' => $ordercode_mail,
            'now' => $now,
        ];
        Mail::send('admin.mail.mail_order', $customerData, function ($message) use ($customerData, $titel_mail) {
            $message->to($customerData['email'])->subject($titel_mail)
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        Session::forget('fee');
        Session::forget('coupon');
        Cart::destroy();
        Session::forget('cart');
    }
}
