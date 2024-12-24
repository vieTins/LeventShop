<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Slider;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

session_start();
class OutFitController extends Controller
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
    public function show_outfits(Request $request)
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $meta_desc = "Levents - Shop for men's and women's fashion, shoes, accessories, genuine products, good prices, nationwide delivery, cash on delivery";
        $meta_keywords = "Levents, Fashion , Levent";
        $meta_title = "Levents - Modern Simplicity";
        $url_canonical = $request->url();
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        $outfits = DB::table("tbl_outfits")
            ->join("tbl_product", "tbl_outfits.product_id", "=", "tbl_product.product_id")
            ->select("tbl_outfits.*", "tbl_product.product_name", "tbl_product.product_price", "tbl_product.product_id")
            ->orderby("tbl_outfits.outfit_id", "desc")
            ->get();
        return view('pages.outfits.show_outfit')
            ->with("category", $cate_product)->with("brand", $brand_product)
            ->with('meta_desc', $meta_desc)
            ->with('meta_keywords', $meta_keywords)
            ->with('meta_title', $meta_title)
            ->with('url_canonical', $url_canonical)
            ->with('slider', $slider)
            ->with('outfits', $outfits);
    }
    public function add_outfits()
    {
        $this->AuthLogin();
        $all_product =  Product::orderBy('product_id', 'desc')->get();
        return view("admin.outfits.add_outfit")->with(compact('all_product'));
    }
    public function save_outfit(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_id'] = $request->product_outfit;
        $data['outfit_desc'] = $request->outfit_desc;
        $data['outfit_status'] = $request->outfit_status;
        $get_image_first = $request->file("outfit_image_first");
        if ($get_image_first) {
            $get_name_image_first = $get_image_first->getClientOriginalName();
            $name_image_first = current(explode(".", $get_name_image_first));
            $new_image_first = $name_image_first . rand(0, 99) . "." . $get_image_first->getClientOriginalExtension();
            $get_image_first->move("public/uploads/outfit", $new_image_first);
            $data["outfit_image_first"] = $new_image_first;
        } else {
            $data["outfit_image_first"] = ""; // Nếu không có ảnh đầu tiên
        }
        $get_image_second = $request->file("outfit_image_second");
        if ($get_image_second) {
            $get_name_image_second = $get_image_second->getClientOriginalName();
            $name_image_second = current(explode(".", $get_name_image_second));
            $new_image_second = $name_image_second . rand(0, 99) . "." . $get_image_second->getClientOriginalExtension();
            $get_image_second->move("public/uploads/outfit", $new_image_second);
            $data["outfit_image_second"] = $new_image_second;
        } else {
            $data["outfit_image_second"] = ""; // Nếu không có ảnh thứ hai
        }
        DB::table("tbl_outfits")->insert($data);
        Session::put("message", "Add Outfit Successfully");
        return Redirect::to("add-outfits");
    }
    public function manage_outfits()
    {
        $this->AuthLogin();
        $all_outfit = DB::table("tbl_outfits")
            ->join("tbl_product", "tbl_outfits.product_id", "=", "tbl_product.product_id")
            ->select("tbl_outfits.*", "tbl_product.product_name", "tbl_product.product_image")
            ->orderby("tbl_outfits.outfit_id", "desc")
            ->get();
        return view("admin.outfits.manage_outfit")->with(compact("all_outfit"));
    }
    public function unactive_outfit($outfit_id)
    {
        $this->AuthLogin();
        DB::table("tbl_outfits")->where("outfit_id", $outfit_id)->update(["outfit_status" => 1]);
        Session::put("message", "Active Outfit Successfully");
        return Redirect::to("manage-outfits");
    }
    public function active_outfit($outfit_id)
    {
        $this->AuthLogin();
        DB::table("tbl_outfits")->where("outfit_id", $outfit_id)->update(["outfit_status" => 0]);
        Session::put("message", "Unactive Outfit Successfully");
        return Redirect::to("manage-outfits");
    }
    public function delete_outfit($outfit_id)
    {
        $this->AuthLogin();
        DB::table("tbl_outfits")->where("outfit_id", $outfit_id)->delete();
        Session::put("message", "Delete Outfit Successfully");
        return Redirect::to("manage-outfits");
    }
}
