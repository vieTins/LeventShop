<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController as ControllersAuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Http\Middleware\AccessPermission;

// frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/load-more-product', [HomeController::class, 'load_more_product']);
Route::get('/all-product-home', [HomeController::class, 'all_product_home']);
// Category Product in Home
Route::get('/list-category-product/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/list-brand-product/{brand_id}', [BrandProduct::class, 'show_brand_home']);
Route::get('/product-detail/{product_id}', [ProductController::class, 'detail_product']);

// backend 
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dasboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

// category product
Route::get(
    '/add-category-product',
    [CategoryProduct::class, 'add_category_product']
);
Route::get(
    '/all-category-product',
    [CategoryProduct::class, 'all_category_product']
);

Route::get(
    '/edit-category-product/{category_product_id}',
    [CategoryProduct::class, 'edit_category_product']
);
Route::get(
    '/delete-category-product/{category_product_id}',
    [CategoryProduct::class, 'delete_category_product']
);
Route::get(
    '/unactive-category-product/{category_product_id}',
    [CategoryProduct::class, 'unactive_category_product']
);
Route::get(
    '/active-category-product/{category_product_id}',
    [CategoryProduct::class, 'active_category_product']
);
Route::post(
    '/save-category-product',
    [CategoryProduct::class, 'save_category_product']
);
Route::post(
    '/update-category-product/{category_product_id}',
    [CategoryProduct::class, 'update_category_product']
);
// brand product
Route::get(
    '/add-brand-product',
    [BrandProduct::class, 'add_brand_product']
);
Route::get(
    '/all-brand-product',
    [BrandProduct::class, 'all_brand_product']
);
Route::get(
    '/edit-brand-product/{brand_product_id}',
    [BrandProduct::class, 'edit_brand_product']
);
Route::get(
    '/delete-brand-product/{brand_product_id}',
    [BrandProduct::class, 'delete_brand_product']
);
Route::get(
    '/unactive-brand-product/{brand_product_id}',
    [BrandProduct::class, 'unactive_brand_product']
);
Route::get(
    '/active-brand-product/{brand_product_id}',
    [BrandProduct::class, 'active_brand_product']
);
Route::post(
    '/save-brand-product',
    [BrandProduct::class, 'save_brand_product']
);
Route::post(
    '/update-brand-product/{brand_product_id}',
    [BrandProduct::class, 'update_brand_product']
);
// product
Route::get(
    '/add-product',
    [ProductController::class, 'add_product']
);
Route::get(
    '/all-product',
    [ProductController::class, 'all_product']
);
Route::get(
    '/edit-product/{product_id}',
    [ProductController::class, 'edit_product']
);
Route::get(
    '/add-gallery/{product_id}',
    [GalleryController::class, 'add_gallery']
);
Route::get(
    '/select-gallery',
    [GalleryController::class, 'select_gallery']
);
Route::post(
    '/update-gallery-name',
    [GalleryController::class, 'update_gallery_name']
);
Route::post(
    '/delete-gallery',
    [GalleryController::class, 'delete_gallery']
);
Route::post(
    '/update-gallery',
    [GalleryController::class, 'update_gallery']
);
Route::post(
    '/insert-gallery/{pro_id}',
    [GalleryController::class, 'insert_gallery']
);
Route::get(
    '/delete-product/{product_id}',
    [ProductController::class, 'delete_product']
);
Route::get(
    '/unactive-product/{product_id}',
    [ProductController::class, 'unactive_product']
);
Route::get(
    '/active-product/{product_id}',
    [ProductController::class, 'active_product']
);
Route::post(
    '/save-product',
    [ProductController::class, 'save_product']
);
Route::post(
    '/update-product/{product_id}',
    [ProductController::class, 'update_product']
);
// cart
Route::post(
    '/save-cart',
    [CartController::class, 'save_cart']
);
Route::get(
    '/show-cart',
    [CartController::class, 'show_cart']
);
Route::get(
    '/delete-to-cart/{rowId}',
    [CartController::class, 'delete_to_cart']
);
// checkout
Route::post(
    '/caculate-fee',
    [CheckoutController::class, 'caculate_fee']
);
Route::post(
    '/select-delivery-home',
    [CheckoutController::class, 'select_delivery_home']
);
Route::get(
    '/login-checkout',
    [CheckoutController::class, 'login_checkout']
);
Route::post(
    '/add-customer',
    [CheckoutController::class, 'add_customer']
);
Route::get(
    '/checkout',
    [CheckoutController::class, 'checkout']
);
Route::post(
    '/save-checkout-customer',
    [CheckoutController::class, 'save_checkout_customer']
);
Route::get(
    '/logout-checkout',
    [CheckoutController::class, 'logout_checkout']
);
Route::post(
    '/login-customer',
    [CheckoutController::class, 'login_customer']
);
Route::post(
    '/search',
    [HomeController::class, 'search']
);
Route::get(
    '/send-order-place',
    [CheckoutController::class, 'order_place']
);
Route::get(
    '/information-order',
    [CheckoutController::class, 'infor_oder']
);
// order
Route::get(
    '/manage-order',
    [OrderController::class, 'manage_order']
);
Route::get(
    '/view-order/{order_code}',
    [OrderController::class, 'view_order']
);
Route::get(
    '/delete-order/{order_code}',
    [OrderController::class, 'delete_order']
);
// about_us
Route::get(
    '/about-us',
    [HomeController::class, 'about_us']
);
// coupon 
Route::post(
    '/check-coupon',
    [CartController::class, 'check_coupon']
);
Route::get(
    '/insert-coupon',
    [CouponController::class, 'insert_coupon']
);
Route::post(
    '/insert-code-coupon',
    [CouponController::class, 'insert_code_coupon']
);
Route::get(
    '/list-coupon',
    [CouponController::class, 'list_coupon']
);
Route::get(
    '/delete-coupon/{coupon_id}',
    [CouponController::class, 'delete_coupon']
);
Route::get(
    '/unactive-coupon/{coupon_id}',
    [CouponController::class, 'unactive_coupon']
);
Route::get(
    '/active-coupon/{coupon_id}',
    [CouponController::class, 'active_coupon']
);
Route::get(
    '/edit-coupon/{coupon_id}',
    [CouponController::class, 'edit_coupon']
);
Route::post(
    '/update-coupon/{coupon_id}',
    [CouponController::class, 'update_coupon']
);
// delivery 
Route::get(
    '/delivery',
    [DeliveryController::class, 'delivery']
);
Route::post(
    '/select-delivery',
    [DeliveryController::class, 'select_delivery']
);
Route::post(
    '/insert-delivery',
    [DeliveryController::class, 'insert_delivery']
);
Route::post(
    '/select-feeship',
    [DeliveryController::class, 'select_feeship']
);
Route::post(
    '/update-delivery',
    [DeliveryController::class, 'update_delivery']
);
Route::post(
    'confirm-order',
    [CheckoutController::class, 'confirm_order']
);
Route::get(
    '/print-order/{checkout_code}',
    [OrderController::class, 'print_order']
);
// banner
Route::get(
    '/manage-banner',
    [BannerController::class, 'manage_banner']
);
Route::get(
    '/add-slider',
    [BannerController::class, 'add_slider']
);
Route::post(
    '/insert-slider',
    [BannerController::class, 'insert_slider']
);
Route::get(
    '/unactive-slide/{slider_id}',
    [BannerController::class, 'unactive_slide']
);
Route::get(
    '/active-slide/{slider_id}',
    [BannerController::class, 'active_slide']
);
// comment
Route::post(
    '/load-comment',
    [ProductController::class, 'load_comment']
);
Route::post(
    '/send-comment',
    [ProductController::class, 'send_comment']
);
Route::get(
    '/comment',
    [ProductController::class, 'list_comment']
);
Route::post(
    '/allow-comment',
    [ProductController::class, 'allow_comment']
);
Route::post(
    '/reply-comment',
    [ProductController::class, 'reply_comment']
);
Route::post(
    '/insert-rating',
    [ProductController::class, 'insert_rating']
);
// mail
Route::get(
    '/view-mail/{customer_id}/{order_code}',
    [OrderController::class, 'view_mail']
);
Route::post(
    '/send-mail',
    [OrderController::class, 'send_mail']
);
Route::get(
    '/show-outfits',
    [OutFitController::class, 'show_outfits']
);
Route::get(
    '/add-outfits',
    [OutFitController::class, 'add_outfits']
);
Route::post(
    '/save-outfit',
    [OutFitController::class, 'save_outfit']
);
Route::get(
    '/manage-outfits',
    [OutFitController::class, 'manage_outfits']
);
Route::get(
    '/unactive-outfit/{outfit_id}',
    [OutFitController::class, 'unactive_outfit']
);
Route::get(
    '/active-outfit/{outfit_id}',
    [OutFitController::class, 'active_outfit']
);
Route::get(
    '/delete-outfit/{outfit_id}',
    [OutFitController::class, 'delete_outfit']
);
Route::post(
    '/update-order-qty',
    [OrderController::class, 'update_order_qty']
);
Route::post(
    '/update-qty',
    [OrderController::class, 'update_qty']
);
// error
Route::get(
    '/404',
    [HomeController::class, 'error_page']
);
// add-cart-ajax
Route::post(
    '/add-cart-ajax',
    [CartController::class, 'add_cart_ajax']
);
Route::get(
    '/delete-cart/{session_id}',
    [CartController::class, 'delete_cart']
);
Route::post(
    '/quick-view',
    [ProductController::class, 'quickview']
);
Route::post(
    '/filter-by-date',
    [AdminController::class, 'filter_by_date']
);
Route::post(
    '/dashboard-filter',
    [AdminController::class, 'dashboard_filter']
);
Route::post(
    '/days-order',
    [AdminController::class, 'days_order']
);
Route::get(
    '/register-auth',
    [AuthController::class, 'register_auth']
);
Route::post(
    '/register',
    [AuthController::class, 'register']
);
Route::get(
    '/login-auth',
    [AuthController::class, 'login_auth']
);
Route::post(
    '/login',
    [AuthController::class, 'login']
);
Route::get(
    '/users',
    [UserController::class, 'index']
)->middleware(AccessPermission::class);
Route::post(
    '/assign-roles',
    [UserController::class, 'assign_roles']
);
Route::get(
    '/logout-auth',
    [AuthController::class, 'logout_auth']
);
Route::get(
    '/delete-user-roles/{admin_id}',
    [UserController::class, 'delete_user_roles']
);
Route::get(
    '/tag/{tag}',
    [ProductController::class, 'tag']
);

// send-mail
Route::get(
    '/send-coupon/{coupon_id}',
    [MailController::class, 'send_coupon']
);
Route::get(
    '/mail-example',
    [MailController::class, 'mail_example']
);
