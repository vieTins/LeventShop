<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\Slider;

session_start();
class CartController extends Controller
{
    public function  save_cart(Request $request)
    {
        $product_id = $request->product_id_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = "123";
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        Session::put('message', 'Add to cart successfully');
        return redirect()->back();
    }
    public function show_cart(Request $request)
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        // seo 
        $meta_desc = "Your cart";
        $meta_keywords = "Your cart";
        $meta_title = "My cart";
        $url_canonical = $request->url();
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product)
            ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
            ->with('slider', $slider);
    }
    public function delete_to_cart($rowId)
    {
        $sessionCart = Session::get('cart', []);
        $sessionCart = array_filter($sessionCart, function ($item) use ($rowId) {
            return $item['product_id'] != $rowId;
        });

        Session::put('cart', $sessionCart);
        return Redirect::to('/show-cart');
    }

    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = Session::get('coupon');
                $is_avaiable = 0;
                if ($coupon_session) {
                    foreach ($coupon_session as $key => $val) {
                        if ($val['coupon_code'] == $coupon->coupon_code) {
                            $is_avaiable++;
                        }
                    }
                }
                if ($is_avaiable == 0) {
                    $cou[] = array(
                        'coupon_number' => $coupon->coupon_number,
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                    );
                    Session::put('coupon', $cou);
                }
                return redirect()->back()->with('message', 'Apply coupon successfully');
            }
        } else {
            return redirect()->back()->with('message', 'Coupon does not exist');
        }
    }
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        $productExists = false; // Đánh dấu xem sản phẩm đã tồn tại chưa

        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    // Nếu sản phẩm đã tồn tại, tăng số lượng
                    $cart[$key]['product_qty'] += $data['cart_product_qty'];
                    $productExists = true;
                    break; // Thoát khỏi vòng lặp
                }
            }

            if (!$productExists) {
                // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
            }

            Session::put('cart', $cart);
        } else {
            // Nếu giỏ hàng trống, thêm sản phẩm mới
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart', $cart);
        }

        Session::save();
    }

    public function delete_cart($session_id)
    {
        $cart = Session::get('cart', []);
        if ($cart == true) {
            foreach ($cart as $key => $value) {
                if ($value['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Delete successfully');
        } else {
            return redirect()->back()->with('message', 'Delete failed');
        }
    }
}
