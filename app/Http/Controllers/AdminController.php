<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use function Laravel\Prompts\table;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

session_start();
class AdminController extends Controller
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
    public function index()
    {
        return view("admin_login");
    }
    public function show_dasboard()
    {
        $this->AuthLogin();
        $total_orders = Statistic::sum('total_order');
        $total_sales = Statistic::sum('sales');
        $total_customer = Customer::count();
        $total_users = DB::table('tbl_admin')->count();
        return view("admin.dashboard")->with(compact('total_orders'))->with(compact('total_sales'))->with(compact('total_customer'))
            ->with(compact('total_users'));
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table("tbl_admin")->where("admin_email", $admin_email)->where("admin_password", $admin_password)->first();
        if ($result) {
            // lưu vào session  
            Session::put("admin_name", $result->admin_name);
            Session::put("admin_id", $result->admin_id);
            return Redirect::to("/dashboard");
        } else {
            Session::put("message", "Incorrect email or password.");
            return Redirect::to("/admin");
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put("admin_name", null);
        Session::put("admin_id", null);
        return Redirect::to("/admin");
    }
    public function filter_by_date(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();
        foreach ($get as $key => $value) {
            $chart_data[] =  array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }
        echo json_encode($chart_data);
    }
    public function dashboard_filter(Request $request)
    {
        $data =  $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if ($data['dashboard_value'] == '7dayleft') {
            $get = Statistic::whereBetween('order_date', [$sub7day, $now])->orderBy('order_date', 'ASC')->get();
        } else if ($data['dashboard_value'] == 'thismonth') {
            $get = Statistic::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
        } else if ($data['dashboard_value'] == 'monthleft') {
            $get = Statistic::whereBetween('order_date', [$dauthangtruoc, $cuoithangtruoc])->orderBy('order_date', 'ASC')->get();
        } else {
            $get = Statistic::whereBetween('order_date', [$sub365day, $now])->orderBy('order_date', 'ASC')->get();
        }
        foreach ($get as $key => $value) {
            $chart_data[] =  array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function days_order(Request $request)
    {
        $data =  $request->all();
        $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$sub365day, $now])->orderBy('order_date', 'ASC')->get();
        foreach ($get as $key => $value) {
            $chart_data[] =  array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
}
