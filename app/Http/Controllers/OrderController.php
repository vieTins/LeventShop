<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Feeship;
use App\Models\Customer;
use App\Models\Coupon;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Support\Facades\Mail;
use App\Models\SendMail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

session_start();
class OrderController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to("/dashboard");
        } else {
            return Redirect::to("/admin")->send();
        }
    }
    public function manage_order()
    {
        $this->AuthLogin();
        $order = Order::orderBy("order_date", "desc")->get();
        return view("admin.manage_order")->with(compact("order"));
    }
    public function view_order($order_code)
    {
        $this->AuthLogin();
        $order_details = OrderDetails::with('product')->where("order_code", $order_code)->get();
        $order = Order::where("order_code", $order_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where("customer_id", $customer_id)->first();
        $shipping = Shipping::where("shipping_id", $shipping_id)->first();
        $order_detail = OrderDetails::with('product')->where("order_code", $order_code)->get();
        foreach ($order_detail as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = Coupon::where("coupon_code", $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }
        return view("admin.view_order")->with(compact("order_details", "customer", "shipping", "order_detail", "coupon_condition", "coupon_number", "order", "order_status"));
    }
    public function print_order($checkout_code)
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {
        $order_details = OrderDetails::where("order_code", $checkout_code)->get();
        $order = Order::where("order_code", $checkout_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where("customer_id", $customer_id)->first();
        $shipping = Shipping::where("shipping_id", $shipping_id)->first();
        $order_details_product = OrderDetails::with('product')->where("order_code", $checkout_code)->get();
        foreach ($order_details_product as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = Coupon::where("coupon_code", $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }
        $output = '
        ';
        $output = '
<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        color: #343a40;
    }
    h1 {
        text-align: center;
        color: black;
        margin-bottom: 20px;
    }
    h1 span {
        font-size: 1rem;
        color: #6c757d;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        background-color: #ffffff;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }
    th, td {
        text-align: left;
        padding: 12px;
        border: 1px solid #dee2e6;
    }
    th {
        background-color: black;
        color: white;
        text-transform: uppercase;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e9ecef;
    }
    </style>
    <h1>
    <center>
        Levent Company
    </center>
    <center>
        <span style="font-size: 1rem">
                Information Order Customer  
        </span>
    </center>
    </h1>
    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
        <thead>
            <tr>
                <th data-toggle="true">Name Customer</th>
                <th data-toggle="true">Phone Customer</th>
                <th data-toggle="true">Email Customer</th>
            </tr>
        </thead>
        <tbody>';
        $output .= '<tr>
                    <td>' . $customer->customer_name . '</td>
                    <td>' . $customer->customer_phone . '</td>
                    <td>' . $customer->customer_email . '</td>
                </tr>';
        $output .=
            '</tbody>
    </table>
    
    <h1>
    <center>
        <span style="font-size: 1rem">
                Information Shipping  
        </span>
    </h1>
     <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
        <thead>
            <tr>
                <th data-toggle="true">Name Customer</th>
                <th data-toggle="true">Address Customer</th>
                <th data-toggle="true">Phone Customer</th>
                <th data-toggle="true">Email Customer</th>
                <th data-toggle="true">Notes Customer</th>

            </tr>
        </thead>
        <tbody>';
        $output .= '<tr>
                    <td>' .  $shipping->shipping_name . '</td>
                    <td>' .  $shipping->shipping_address . '</td>
                    <td>' .  $shipping->shipping_phone . '</td>
                    <td>' .  $shipping->shipping_email . '</td>
                    <td>' .  $shipping->shipping_notes . '</td>
                </tr>';
        $output .=
            '</tbody>
    </table>
    
    <h1>
    <center>
        <span style="font-size: 1rem">
                Information Order  
        </span>
    </h1>
     <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
        <thead>
            <tr>
                <th data-toggle="true">Name Product</th>
                <th data-toggle="true">Coupon Product</th>
                <th data-toggle="true">Feeship Product</th>
                <th data-toggle="true">Quantity Product</th>
                <th data-toggle="true">Price Product</th>
                 <th data-toggle="true">Total Product</th>
            </tr>
        </thead>
        <tbody>';
        $total = 0;
        foreach ($order_details_product as $key => $product) {
            $subtotal = $product->product_price * $product->product_sales_quantity;
            $total += $subtotal;
            if ($product->product_coupon != 'no') {
                $product_coupon = $product->product_coupon;
            } else {
                $product_coupon = 'no coupon';
            }
            $output .= '<tr>
                    <td>' .  $product->product_name . '</td>
                    <td>' .  $product->product_coupon . '</td>
                    <td>' .  $product->product_feeship . '</td>
                    <td>' .  $product->product_sales_quantity . '</td>
                    <td>' . '$' .  $product->product_price . '</td> 
                    <td>' . '$' . $product->product_price * $product->product_sales_quantity . '</td>
                </tr>';
        }
        if ($coupon_condition == 1) {
            $total_coupon = ($total * $coupon_number) / 100;
            $total -= $total_coupon;
            $print_coupon = $coupon_number . '%';
        } else if ($coupon_condition == 2) {
            $total = $total - $coupon_number;
            $print_coupon = '$' . $coupon_number;
        } else {
            $print_coupon = '$0';
        }
        $output .= ' 
            <tr>
               <td colspan="2">
                   <p>
                      Voucher Disscount : -' . $print_coupon . '
                      
                    </p>
                   <p>
                   Fee Ship : $' . $product->product_feeship . '
                   </p>
                   <p>
                   Order Total : $' . $total + $product->product_feeship . '
                   </p>
               </td>
            </tr>
        ';
        $output .=
            '</tbody>
    </table>
      
    <h1>
    <center>
        <span style="font-size: 1rem">
                Signature of Customer
        </span>
    </h1>
    <center>
    <table style="border:none">
        <tr>
            <td style="border:none">
               <strong>
                <p>Company Signature</p>
               </strong>
            </td>
            <td style="border:none">
                <strong>    
                <p>Customer Signature</p>
                </strong>
            </td>
        </tr>
    </table>
    </center>
    ';
        return $output;
    }
    public function view_mail($customer_id, $order_code)
    {
        $this->AuthLogin();
        $customer = Customer::where("customer_id", $customer_id)->first();
        $order_code = $order_code;

        return view("admin.mail.send_mail")->with('customer', $customer)->with('order_code', $order_code);
    }
    public function send_mail(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name_to' => 'required|string',
            'email_to' => 'required|email',
            'email_subject' => 'nullable|string',
            'email_content' => 'required|string',
        ]);

        // Lưu vào CSDL
        SendMail::create([
            'name_to' => $request->name_to,
            'mail_to' => $request->email_to,
            'mail_title' => $request->email_subject,
            'mail_content' => $request->email_content,
            'order_code' => $request->order_code,
        ]);


        // Dữ liệu email
        $mail_data = [
            'name' => $request->name_to,
            'body' => $request->email_content,
        ];

        // Gửi email
        $mail_to = $request->email_to;
        $name_to = $request->name_to;
        $subject = $request->email_subject ?: "No Subject";

        try {
            Mail::send('admin.mail.mail', $mail_data, function ($message) use ($mail_to, $name_to, $subject) {
                $message->to($mail_to, $name_to)
                    ->subject($subject);
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
            Session::put("message", "Email sent and saved successfully!");
        } catch (\Exception $e) {
            Session::put("message", "Email sent failed!");
        }
        return redirect()->back();
    }
    public function update_order_qty(Request $request)
    {
        // update order
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();
        if ($order->order_status == 2) {
            foreach ($data["order_product_id"] as $key => $product_id) {
                $product  = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data["quantity"] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain =  $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        } elseif ($order->order_status != 2 && $order->order_status != 3) {
            foreach ($data["order_product_id"] as $key => $product_id) {
                $product  = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data["quantity"] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain =  $product_quantity +  $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold -  $qty;
                        $product->save();
                    }
                }
            }
        }
    }
    public function update_qty(Request $request)
    {
        $data =  $request->all();
        $order_details = OrderDetails::where("product_id", $data["order_product_id"])->where("order_code", $data["order_code"])->first();
        $order_details->product_sales_quantity = $data["order_qty"];
        $order_details->save();
    }
}
