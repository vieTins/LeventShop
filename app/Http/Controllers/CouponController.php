<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

session_start();
class CouponController extends Controller
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
    public function insert_coupon()
    {
        $this->AuthLogin();
        return view('admin.coupon.insert_coupon');
    }
    public function insert_code_coupon(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_times = $data['coupon_times'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_status = $data['coupon_status'];
        $coupon->save();
        Session::put('message', 'Insert coupon successfully');
        return Redirect::to('insert-coupon');
    }
    public function list_coupon()
    {
        $this->AuthLogin();
        $list_coupon = Coupon::orderby('coupon_id', 'desc')->get();
        return view('admin.coupon.list_coupon')->with(compact('list_coupon'));
    }
    public function delete_coupon($coupon_id)
    {
        $this->AuthLogin();
        Coupon::find($coupon_id)->delete();
        Session::put('message', 'Delete coupon successfully');
        return Redirect::to('list-coupon');
    }
    public function unactive_coupon($coupon_id)
    {
        $this->AuthLogin();
        Coupon::find($coupon_id)->update(['coupon_status' => 1]);
        Session::put('message', 'Unactive coupon successfully');
        return Redirect::to('list-coupon');
    }
    public function active_coupon($coupon_id)
    {
        $this->AuthLogin();
        Coupon::find($coupon_id)->update(['coupon_status' => 0]);
        Session::put('message', 'Active coupon successfully');
        return Redirect::to('list-coupon');
    }
    public function edit_coupon($coupon_id)
    {
        $this->AuthLogin();
        $edit_coupon = Coupon::Where('coupon_id', $coupon_id)->get();
        return view('admin.coupon.edit_coupon')->with(compact('edit_coupon'));
    }
    public function update_coupon(Request $request, $coupon_id)
    {
        $this->AuthLogin();
        $data = $request->all();
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_times = $data['coupon_times'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_status = $data['coupon_status'];
        $coupon->save();
        Session::put('message', 'Update coupon successfully');
        return Redirect::to('list-coupon');
    }
}
