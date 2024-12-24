<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Slider;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function all_product_home(Request $request)
    {
        $meta_desc = "Levents - Shop for men's and women's fashion, shoes, accessories, genuine products, good prices, nationwide delivery, cash on delivery";
        $meta_keywords = "Levents, Fashion , Levent";
        $meta_title = "Levents - Modern Simplicity";
        $url_canonical = $request->url();
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        $all_product = DB::table("tbl_product")
            ->where("product_status", "0")
            ->orderby(DB::raw('RAND()'))
            ->take(8)
            ->get();
        return view('pages.product.all_product')->with('all_product', $all_product)
            ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
            ->with("category", $cate_product)->with("brand", $brand_product)->with('slider', $slider);
    }
    public function load_more_product(Request $request)
    {
        $data = $request->all();

        // Query sản phẩm
        if ($data['id'] > 0) {
            $all_product = DB::table("tbl_product")
                ->where("product_status", "1")
                ->where('product_id', '<', $data['id'])
                ->orderby('product_id', 'desc')
                ->take(8)
                ->get();
        } else {
            $all_product = DB::table("tbl_product")
                ->where("product_status", "1")
                ->orderby('product_id', 'desc')
                ->take(8)
                ->get();
        }

        // Output danh sách sản phẩm
        $product_output = '';
        $last_id = 0;

        if (!$all_product->isEmpty()) {
            foreach ($all_product as $key => $pro) {
                $last_id = $pro->product_id;
                $product_output .= '
            <div class="item_product">
                <div class="status__Product">
                    <div class="status_new">New</div>
                    <div class="status_favorite">
                        <button class="button_wishlist" style="border: none; background-color: transparent" id="' . $pro->product_id . '" onclick="add_wishlist(this.id)">
                            <i class="container__selling-interactive-icon ti-heart heart"></i>
                        </button>
                    </div>
                </div>
                <div class="img_Product">
                    <img src="' . URL::to('public/uploads/product/' . $pro->product_image) . '" alt="Product Image" class="img_Item--1" id="wishlist_productimage' . $pro->product_id . '">
                    <img src="' . URL::to('public/uploads/product/' . $pro->product_image) . '" alt="Product Image" class="img_Item--2">
                </div>
                <div class="infor_Product">
                    <span class="price_Product">
                        <input type="hidden" id="wishlist_productname' . $pro->product_id . '" value="' . htmlspecialchars($pro->product_name) . '">
                        <input type="hidden" id="wishlist_productprice' . $pro->product_id . '" value="' . number_format($pro->product_price, 2) . '">
                        $' . number_format($pro->product_price, 2) . '
                    </span>
                    <br>
                    <a href="' . URL::to('/product-detail/' . $pro->product_id) . '" id="wishlist_producturl' . $pro->product_id . '">
                        <span class="name_Product">' . htmlspecialchars($pro->product_name) . '</span>
                    </a>
                    <div class="feedback_Product">
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    <span class="describe__Product">New Arrival</span>
                </div>
                <div class="buy__Product">
                    <button class="buyNow">
                        <span>Buy Now</span>
                    </button>
                </div>
            </div>
            ';
            }

            $load_more_button = '
            <div id="load_more">
                <button type="button" name="load_more_button" class="boton-elegante" id="load_more_button" data-id="' . $last_id . '">Load More</button>
            </div>
        ';
        } else {
            // Không còn dữ liệu
            $load_more_button = '
            <div id="load_more">
                <button type="button" name="load_more_button" class="boton-elegante" id="load_more_button" data-id="">
                    No Data Found
                </button>
            </div>
        ';
        }

        // Trả về dữ liệu JSON
        return response()->json([
            'product_output' => $product_output,
            'load_more_button' => $load_more_button,
        ]);
    }


    public function error_page()
    {
        return view('errors.404');
    }
    public function index(Request $request)
    {
        // seo 
        $meta_desc = "Levents - Shop for men's and women's fashion, shoes, accessories, genuine products, good prices, nationwide delivery, cash on delivery";
        $meta_keywords = "Levents, Fashion , Levent";
        $meta_title = "Levents - Modern Simplicity";
        $url_canonical = $request->url();
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        $all_product = DB::table("tbl_product")->where("product_status", "1")->orderby("product_id", "desc")->limit(8)->get();
        $outfits = DB::table("tbl_outfits")
            ->join("tbl_product", "tbl_outfits.product_id", "=", "tbl_product.product_id")
            ->select("tbl_outfits.*", "tbl_product.product_name", "tbl_product.product_price", "tbl_product.product_id")
            ->orderby("tbl_outfits.outfit_id", "desc")
            ->limit(4)
            ->get();
        $bestSellingProduct = DB::table('tbl_order_details')
            ->join('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
            ->select(
                'tbl_order_details.product_id',
                'tbl_product.product_name',
                'tbl_product.product_image',
                'tbl_product.product_price',
                DB::raw('SUM(tbl_order_details.product_sales_quantity) as total_sales_quantity')
            )
            ->groupBy('tbl_order_details.product_id', 'tbl_product.product_name', 'tbl_product.product_image', 'tbl_product.product_price')
            ->orderByDesc('total_sales_quantity')
            ->limit(3)
            ->get();
        return view("pages.home")->with("category", $cate_product)->with("brand", $brand_product)->with("all_product", $all_product)
            ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
            ->with('slider', $slider)
            ->with('outfits', $outfits)
            ->with('bestSellingProduct', $bestSellingProduct);
    }
    public function search(Request $request)
    {

        $keywords = $request->keywords_submit;
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $search_product = DB::table("tbl_product")->where("product_name", "like", "%" . $keywords . "%")->get();
        Session::put("keywords", $keywords);
        return view("pages.product.search")->with("category", $cate_product)->with("brand", $brand_product)->with("search_product", $search_product);
    }
    public function send_mail()
    {
        //  send mail
        $to_name = "Levent";
        $to_email = "hhuan8882@gmail.com";
        $data = array("name" => "Mail from Levent", "body" => "This is a test mail");
        Mail::send("pages.send_mail", $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject("Levent - Modern Simplicity");
            $message->from("$to_email", "Levent");
        });
    }
    public function about_us(Request $request)
    {
        // seo 
        $meta_desc = "About Us";
        $meta_keywords = "About Us";
        $meta_title = "About Us";
        $url_canonical = $request->url();
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        return view("pages.about_us")->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)
            ->with('url_canonical', $url_canonical)
            ->with("category", $cate_product)->with("brand", $brand_product);
    }
}
