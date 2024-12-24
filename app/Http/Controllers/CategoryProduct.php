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
class CategoryProduct extends Controller
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
    public function add_category_product()
    {
        $this->AuthLogin();
        return view("admin.add_category_product");
    }
    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table("tbl_category_product")->get();
        $manager_category_product = view("admin.all_category_product")->with("all_category_product", $all_category_product);
        return view("admin_layout")->with("admin.all_category_product", $manager_category_product);
        // lấý dữ liệu truyền dữ liệu vào một view và hiển thị ở layout chính 
    }
    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data["category_name"] = $request->category_product_name;
        $data["meta_keywords"] = $request->category_product_keywords;
        $data["category_desc"] = $request->category_product_desc;
        $data["category_status"] = $request->category_product_status;
        DB::table("tbl_category_product")->insert($data);
        Session::put("message", "Add Category Product Successfully");
        return Redirect::to("add-category-product");
    }
    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_category_product")->where("category_id", $category_product_id)->update(["category_status" => 1]);
        Session::put("message", "Active Category Product Successfully");
        return Redirect::to("all-category-product");
    }
    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_category_product")->where("category_id", $category_product_id)->update(["category_status" => 0]);
        Session::put("message", "Unactive Category Product Successfully");
        return Redirect::to("all-category-product");
    }
    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table("tbl_category_product")->where("category_id", $category_product_id)->get();
        $manager_category_product = view("admin.edit_category_product")->with("edit_category_product", $edit_category_product);
        return view("admin_layout")->with("admin.edit_category_product", $manager_category_product);
    }
    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data["category_name"] = $request->category_product_name;
        $data["meta_keywords"] = $request->category_product_keywords;
        $data["category_desc"] = $request->category_product_desc;
        DB::table("tbl_category_product")->where("category_id", $category_product_id)->update($data);
        Session::put("message", "Update Category Product Successfully");
        return Redirect::to("all-category-product");
    }
    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_category_product")->where("category_id", $category_product_id)->delete();
        Session::put("message", "Delete Category Product Successfully");
        return Redirect::to("all-category-product");
    }
    // end function admin page
    public function show_category_home($category_id, Request $request)
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $category_by_id = DB::table("tbl_product")->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")->where("tbl_product.category_id", $category_id)->get();
        // seo
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        $product_bestseller = OrderDetails::select(DB::raw('sum(product_sales_quantity) as product_sales_quantity, product_id'))
            ->groupBy('product_id')
            ->orderBy('product_sales_quantity', 'desc')
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
        foreach ($cate_product as $key => $value) {
            $meta_desc = $value->category_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->category_name;
            $url_canonical = $request->url();
        }
        $min_price = DB::table("tbl_product")->min("product_price");
        $max_price = DB::table("tbl_product")->max("product_price");

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'increasing') {
                $category_by_id = DB::table("tbl_product")->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")->where("tbl_product.category_id", $category_id)->orderby("product_price", "asc")->paginate(4)->appends(request()->query());
            } else if ($sort_by == 'decreasing') {
                $category_by_id = DB::table("tbl_product")->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")->where("tbl_product.category_id", $category_id)->orderby("product_price", "desc")->paginate(4)->appends(request()->query());
            } else if ($sort_by == 'atoz') {
                $category_by_id = DB::table("tbl_product")->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")->where("tbl_product.category_id", $category_id)->orderby("product_name", "desc")->paginate(4)->appends(request()->query());
            } else if ($sort_by == 'ztoa') {
                $category_by_id = DB::table("tbl_product")->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")->where("tbl_product.category_id", $category_id)->orderby("product_name", "asc")->paginate(4)->appends(request()->query());
            }
        } else if (isset($_GET['start_price']) && isset($_GET['end_price'])) {
            $start_price = $_GET['start_price'];
            $end_price = $_GET['end_price'];
            $category_by_id = DB::table("tbl_product")->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")->where("tbl_product.category_id", $category_id)->whereBetween("product_price", [$start_price, $end_price])->paginate(4)->appends(request()->query());
        } else {
            $category_by_id = DB::table("tbl_product")->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")->where("tbl_product.category_id", $category_id)->orderby("product_id", "desc")->paginate(4);
        }
        return view("pages.category.show_category")->with("category", $cate_product)->with("brand", $brand_product)->with("category_by_id", $category_by_id)
            ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
            ->with('slider', $slider)
            ->with('min_price', $min_price)
            ->with('max_price', $max_price)
            ->with('bestSellingProducts', $bestSellingProducts);
    }
}
