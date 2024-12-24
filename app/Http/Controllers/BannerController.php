<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

Session::start();
class BannerController extends Controller
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
    public function manage_banner()
    {
        $all_slide = Slider::orderBy('slider_id', 'desc')->get();
        return view('admin.slider.list_slide')->with(compact('all_slide'));
    }
    public function add_slider()
    {
        return view('admin.slider.add_slider');
    }
    public function insert_slider(Request $request)
    {
        $data = $request->all();
        $get_image = $request->file("slider_image");
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_imgae = current(explode(".", $get_name_image));
            $new_image = $name_imgae . rand(0, 99) . "." . $get_image->getClientOriginalExtension();
            $get_image->move("public/uploads/slider", $new_image);
            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_desc = $data['slider_desc'];
            $slider->slider_status = $data['slider_status'];
            $slider->save();
            Session::put('message', 'Add slider successfully');
            return Redirect::to('add-slider');
        } else {
            Session::put('message', 'Add slider failed');
            return Redirect::to('add-slider');
        }
    }
    public function unactive_slide($slider_id)
    {
        $this->AuthLogin();
        DB::table("tbl_slider")->where("slider_id", $slider_id)->update(["slider_status" => 1]);
        Session::put("message", "Active Slide Successfully");
        return Redirect::to("manage-banner");
    }
    public function active_slide($slider_id)
    {
        $this->AuthLogin();
        DB::table("tbl_slider")->where("slider_id", $slider_id)->update(["slider_status" => 0]);
        Session::put("message", "Unactive Slide Successfully");
        return Redirect::to("manage-banner");
    }
}
