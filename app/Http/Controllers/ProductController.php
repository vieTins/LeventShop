<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

session_start();
class ProductController extends Controller
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
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table("tbl_category_product")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->orderby("brand_id", "desc")->get();
        return view("admin.add_product")->with("cate_product", $cate_product)->with("brand_product", $brand_product);
    }
    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table("tbl_product")
            ->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")
            ->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")
            ->orderby("tbl_product.product_id", "desc")
            ->get();
        $manager_product = view("admin.all_product")->with("all_product", $all_product);
        return view("admin_layout")->with("admin.all_product", $manager_product);
        // lấý dữ liệu truyền dữ liệu vào một view và hiển thị ở layout chính 
    }
    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data["product_name"] = $request->product_name;
        $data["product_quantity"] = $request->product_quantity;
        $data["product_tags"] = $request->product_tags;
        $data["product_desc"] = $request->product_desc;
        $data["product_status"] = $request->product_status;
        $data["category_id"] = $request->product_cate;
        $data["brand_id"] = $request->product_brand;
        $data["product_price"] = $request->product_price;
        $data["product_content"] = $request->product_content;
        $get_image = $request->file("product_image");
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_imgae = current(explode(".", $get_name_image));
            $new_image = $name_imgae . rand(0, 99) . "." . $get_image->getClientOriginalExtension();
            $get_image->move("public/uploads/product", $new_image);
            $data["product_image"] = $new_image;
            DB::table("tbl_product")->insert($data);
            Session::put("message", "Add Product Successfully");
            return Redirect::to("add-product");
        }
        $data["product_image"] = "";
        DB::table("tbl_product")->insert($data);
        Session::put("message", "Add Product Successfully");
        return Redirect::to("all-product");
    }
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_product")->where("product_id", $product_id)->update(["product_status" => 1]);
        Session::put("message", "Active Product Successfully");
        return Redirect::to("all-product");
    }
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_product")->where("product_id", $product_id)->update(["product_status" => 0]);
        Session::put("message", "Unactive Product Successfully");
        return Redirect::to("all-product");
    }
    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table("tbl_category_product")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->orderby("brand_id", "desc")->get();
        $edit_product = DB::table("tbl_product")->where("product_id", $product_id)->get();
        $manager_product = view("admin.edit_product")->with("edit_product", $edit_product)->with("cate_product", $cate_product)->with("brand_product", $brand_product);
        return view("admin_layout")->with("admin.edit_product", $manager_product);
    }
    public function edit_image_product($product_id) {}
    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data["product_name"] = $request->product_name;
        $data["product_quantity"] = $request->product_quantity;
        $data["product_desc"] = $request->product_desc;
        $data["product_tags"] = $request->product_tags;
        $data["product_price"] = $request->product_price;
        $data["product_content"] = $request->product_content;
        $data["brand_id"] = $request->product_brand;
        $data["category_id"] = $request->product_cate;
        $data["product_status"] = $request->product_status;
        $get_image = $request->file("product_image");
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_imgae = current(explode(".", $get_name_image));
            $new_image = $name_imgae . rand(0, 99) . "." . $get_image->getClientOriginalExtension();
            $get_image->move("public/uploads/product", $new_image);
            $data["product_image"] = $new_image;
            DB::table("tbl_product")->where("product_id", $product_id)->update($data);
            Session::put("message", "Edit Product Successfully");
            return Redirect::to("all-product");
        }
        DB::table("tbl_product")->where("product_id", $product_id)->update($data);
        Session::put("message", "Edit Product Successfully");
        return Redirect::to("all-product");
    }
    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table("tbl_product")->where("product_id", $product_id)->delete();
        Session::put("message", "Delete Product Successfully");
        return Redirect::to("all-product");
    }
    // end function admin page
    public function detail_product($product_id, Request $request)
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $detail_product = DB::table("tbl_product")
            ->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")
            ->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")
            ->where("tbl_product.product_id", $product_id)->get();
        foreach ($detail_product as $key => $value) {
            $category_id = $value->category_id;
            $product_id = $value->product_id;
        }
        // gallery 
        $gallery = Gallery::where("product_id", $product_id)->get();
        $related_product = DB::table("tbl_product")
            ->join("tbl_category_product", "tbl_product.category_id", "=", "tbl_category_product.category_id")
            ->join("tbl_brand", "tbl_product.brand_id", "=", "tbl_brand.brand_id")
            ->where("tbl_category_product.category_id", $category_id)
            ->whereNotIn("tbl_product.product_id", [$product_id])
            ->get();
        // seo 
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        foreach ($detail_product as $key => $value) {
            $meta_desc = $value->product_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->product_name;
            $url_canonical = $request->url();
        }

        $rating = Rating::where('product_id', $product_id)->avg('rating');
        $count_rating = Rating::where('product_id', $product_id)->count('rating');
        $rating = round($rating);

        $coupon = Coupon::where('coupon_status', 1)->get();

        return view("pages.product.show_detail")->with("category", $cate_product)->with("brand", $brand_product)->with("detail_product", $detail_product)
            ->with("related_product", $related_product)->with("gallery", $gallery)
            ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
            ->with('slider', $slider)
            ->with('rating', $rating)
            ->with('count_rating', $count_rating)
            ->with('coupon', $coupon);
    }
    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = Comment::where("comment_product_id", $product_id)->where('comment_parent_comment', Null)->where('comment_status', 0)->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment', '>', 0)->orderBy('comment_id', 'desc')->get();
        $output = "";
        foreach ($comment as $key => $comm) {
            $output .= '
                <div class="review-card">
                    <div class="reviewer">
                        <img src="' .
                url('/public/frontend/img/userComment.png')
                . '" alt="User Image">
                        <div>
                            <h4>@' . $comm->comment_name . '</h4>
                            <div class="dateComment">' .
                $comm->comment_date
                . '</div>
                        </div>
                    </div>
                                                <p>“' .  $comm->comment  . '”</p>
                </div>';

            foreach ($comment_rep as $key => $rep_comment) {
                if ($rep_comment->comment_parent_comment == $comm->comment_id) {
                    $output .=
                        '<div class="review-card">
                    <div class="replycomment"  style="margin-left:50px">
                                        <div class="reviewer">
                        <img src="' .
                        url('/public/frontend/img/iconAdmin.jpg')
                        . '" alt="User Image">
                        <div>
                            <h4>@Levent</h4>
                            <div class="dateComment">' .
                        $comm->comment_date
                        . '</div>
                        </div>
                    </div>
                                                <p>“' .  $rep_comment->comment  . '”</p>
                    </div>
                </div>
                ';
                }
            }
        }
        echo $output;
    }
    public function send_comment(Request $request)
    {
        $data = $request->all();
        $orders = Order::where('customer_id', Session::get('customer_id'))->get();
        $canComment = false; // Cờ kiểm tra có được phép bình luận hay không
        foreach ($orders as $order) {
            $order_detail = OrderDetails::where('order_code', $order->order_code)->get();
            foreach ($order_detail as $value) {
                if ($value->product_id == $data['product_id']) {
                    $canComment = true;
                    break 2;
                }
            }
        }

        if ($canComment) {
            $comment = new Comment();
            $comment->comment = $data['comment_content'];
            $comment->comment_product_id = $data['product_id'];
            $comment->comment_name = $data['comment_name'];
            $comment->comment_status = 1;
            $comment->save();
            echo "done";
        } else {
            echo "fail";
        }
    }


    public function list_comment()
    {
        $comment = Comment::with('product')->where('comment_parent_comment', Null)->orderBy('comment_status', 'desc')->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment', '>', 0)->orderBy('comment_id', 'desc')->get();
        return view('admin.comment.list_comment')->with(compact('comment', 'comment_rep'));
    }
    public function allow_comment(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function reply_comment(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_name = 'admin';
        $comment->comment_status = 0;
        $comment->save();
    }
    public function insert_rating(Request $request)
    {
        $data = $request->all();
        $orders = Order::where('customer_id', Session::get('customer_id'))->get();
        $canComment = false; // Cờ kiểm tra có được phép bình luận hay không
        foreach ($orders as $order) {
            $order_detail = OrderDetails::where('order_code', $order->order_code)->get();
            foreach ($order_detail as $value) {
                if ($value->product_id == $data['product_id']) {
                    $canComment = true;
                    break 2;
                }
            }
        }
        if ($canComment) {
            $rating = new Rating();
            $rating->rating = $data['index'];
            $rating->product_id = $data['product_id'];
            $rating->save();
            echo "done";
        } else {
            echo "fail";
        }
    }
    public function quickview(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id', $product_id)->get();
        $output['product_gallery'] = "";
        foreach ($gallery->slice(0, 4) as $key => $value) {
            $output['product_gallery'] .= ' 
                <li class="thumb-item">
                <button type="button" class="thumb-item__btn" aria-label="change to image ' .  $key + 1 . '">
                      <img role="presentation" src="' . url('/public/uploads/gallery/' . $value->gallery_image) . '" alt="" data-thumb-index="' .  $key . '">
                 </button>
                </li>
                ';
        }
        $output['product_name'] = $product->product_name;
        $output['product_price'] = " &dollar;" . $product->product_price;
        $output['product_price_full'] = "&dollar;" . $product->product_price * 2;
        $output['product_desc'] =
            '
        <b>
        <i class="fas fa-info-circle"></i>   
         ' . $product->product_desc . '
        </b>
        ';
        $output['product_content'] = $product->product_content;
        $output['product_id'] =
            '<a href="' . url('/product-detail/' . $product->product_id) . '" style="color: white">
                    See more
                </a>';
        $output['product_image']  = '<img style="width:350px" class="image-box__src" tabindex="0" aria-controls="lightbox" aria-expanded="false"  src="' . url('/public/uploads/product/' . $product->product_image) . '" alt="" data-product-id="item-cart-1">';
        echo json_encode($output);
    }
    public function tag(Request $request, $tag)
    {
        $cate_product = DB::table("tbl_category_product")->where("category_status", "1")->orderby("category_id", "desc")->get();
        $brand_product = DB::table("tbl_brand")->where("brand_status", "1")->orderby("brand_id", "desc")->get();
        $product_tag = Product::where('product_status', 1)->where('product_name', 'like', '%' . $tag . '%')->orWhere('product_tags', 'LIKE', '%' . $tag . '%')->get();
        // seo 
        $slider = Slider::orderBy('slider_id', 'asc')->where('slider_status', 1)->limit(4)->get();
        return view("pages.tags.tag")->with("category", $cate_product)->with("brand", $brand_product)->with('slider', $slider)
            ->with('meta_desc', '')->with('meta_keywords', '')->with('meta_title', '')->with('url_canonical', '')
            ->with('tag', $tag)
            ->with('product_tag', $product_tag);
    }
}
