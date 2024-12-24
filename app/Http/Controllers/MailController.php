<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Coupon;

class MailController extends Controller
{
    public function send_coupon($coupon_id)
    {
        $customer_vip = Customer::where('customer_vip', 1)->get();
        $coupon = Coupon::find($coupon_id);
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $title_mail = 'Coupon for VIP customers at ' . $now;
        $expiry_date = $now->copy()->addMonth();
        $customerData = [];
        foreach ($customer_vip as $vip) {
            $customerData = [
                'email' => $vip->customer_email,
                'name' => $vip->customer_name,
                'coupon' => $coupon,
                'now' => $now,
                'expiry_date' => $expiry_date->format('d-m-Y H:i:s')
            ];
        }
        Mail::send('admin.mail.send_coupon', $customerData, function ($message) use ($customerData, $title_mail) {
            $message->to($customerData['email'])->subject($title_mail)
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        return redirect()->back()->with('message', 'Send mail successfully');
    }
    public function mail_example()
    {
        return view('admin.mail.send_coupon');
    }
}
