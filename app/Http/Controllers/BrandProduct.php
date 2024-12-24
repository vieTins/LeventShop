<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;

session_start();
class BrandProduct extends Controller
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
    public function add_brand_product()
    {
        $this->AuthLogin();
        return view("admin.add_brand_product");
    }
    public function all_brand_product()
    {
        $this->AuthLogin();
        $all_brand_product = Brand::all();
        $manager_brand_product = view("admin.all_brand_product")->with("all_brand_product", $all_brand_product);
        return view("admin_layout")->with("admin.all_brand_product", $manager_brand_product);
        // lấý dữ liệu truyền dữ liệu vào một view và hiển thị ở layout chính 
    }
    public function save_brand_product(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->meta_keywords = $data['brand_product_keywords'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        Session::put("message", "Add Brand Product Successfully");
        return Redirect::to("add-brand-product");
    }
    public function unactive_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_brand")->where("brand_id", $brand_product_id)->update(["brand_status" => 1]);
        Session::put("message", "Active Brand Product Successfully");
        return Redirect::to("all-brand-product");
    }
    public function active_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_brand")->where("brand_id", $brand_product_id)->update(["brand_status" => 0]);
        Session::put("message", "Unactive Brand Product Successfully");
        return Redirect::to("all-brand-product");
    }
    public function edit_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        $edit_brand_product = Brand::where("brand_id", $brand_product_id)->get();
        $manager_brand_product = view("admin.edit_brand_product")->with("edit_brand_product", $edit_brand_product);
        return view("admin_layout")->with("admin.edit_brand_product", $manager_brand_product);
    }
    public function update_brand_product(Request $request, $brand_product_id)
    {
        $this->AuthLogin();
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->meta_keywords = $data['brand_product_keywords'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->save();
        Session::put("message", "Update brand Product Successfully");
        return Redirect::to("all-brand-product");
    }
    public function delete_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_brand")->where("brand_id", $brand_product_id)->delete();
        Session::put("message", "Delete brand Product Successfully");
        return Redirect::to("all-brand-product");
    }
    public function show_brand_home($brand_id, Request $request)
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $brand_by_id = DB::table("tbl_product")->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")->where("tbl_product.brand_id", $brand_id)->get();
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        $product_bestseller = OrderDetails::select(DB::raw('sum(product_sales_quantity) as product_sales_quantity, product_id'))
            ->groupBy('product_id')
            ->orderByDesc('product_sales_quantity') // Sắp xếp giảm dần theo số lượng bán
            ->take(6) // Lấy 5 bản ghi
            ->get();
        $bestSellingProducts = [];
        foreach ($product_bestseller as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $bestSellingProducts[] = [
                    'product_id' => $product->product_id,
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'product_image' => $product->product_image,
                    'product_desc' => $product->product_desc,
                ];
            }
        }
        foreach ($brand_product as $key => $value) {
            $meta_desc = "";
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->brand_name;
            $url_canonical = $request->url();
        }

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'increasing') {
                $brand_by_id = DB::table("tbl_product")->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")->where("tbl_product.brand_id", $brand_id)->orderby("product_price", "asc")->paginate(4)->appends(request()->query());
            } else if ($sort_by == 'decreasing') {
                $brand_by_id = DB::table("tbl_product")->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")->where("tbl_product.brand_id", $brand_id)->orderby("product_price", "desc")->paginate(4)->appends(request()->query());
            } else if ($sort_by == 'atoz') {
                $brand_by_id = DB::table("tbl_product")->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")->where("tbl_product.brand_id", $brand_id)->orderby("product_name", "desc")->paginate(4)->appends(request()->query());
            } else if ($sort_by == 'ztoa') {
                $brand_by_id = DB::table("tbl_product")->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")->where("tbl_product.brand_id", $brand_id)->orderby("product_name", "asc")->paginate(4)->appends(request()->query());
            }
        } else if (isset($_GET['start_price']) && isset($_GET['end_price'])) {
            $start_price = $_GET['start_price'];
            $end_price = $_GET['end_price'];
            $brand_by_id = DB::table("tbl_product")->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")->where("tbl_product.brand_id", $brand_id)->whereBetween("product_price", [$start_price, $end_price])->paginate(4)->appends(request()->query());
        } else {
            $brand_by_id = DB::table("tbl_product")->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")->where("tbl_product.brand_id", $brand_id)->orderby("product_id", "desc")->paginate(4);
        }
        return view("pages.brand.show_brand")->with("category", $cate_product)->with("brand", $brand_product)->with("brand_by_id", $brand_by_id)
            ->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('meta_desc', $meta_desc)
            ->with('slider', $slider)
            ->with('bestSellingProducts', $bestSellingProducts)
        ;
    }
}
