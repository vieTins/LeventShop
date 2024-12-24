@extends('layout')
@section("content")
<div class="app__container-product">
    <div class="grid wide">
        <div class="row ">
            <div class="col l-4 m-12 c-12 ">
                <div class="product-item__wrap">
                    <div class="container__product-item"
                        style="background-image: url(./public/frontend/img/lv-2.webp);">
                        <h2 class="container__product-title-content"> New <br> Shirts</h2>
                        <a href="{{URL::to('/all-product-home')}}" class="container__product-content-button">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col l-4 m-12 c-12">
                <div class="product-item__wrap">
                    <div class="container__product-item"
                        style="background-image: url(./public/frontend/img/lv-3.webp);">
                        <h2 class="container__product-title-content">Choose <br> your <br> price</h2>
                        <a href="#" class="container__product-content-button">Choose Yours</a>
                    </div>
                </div>
            </div>

            <div class="col l-4 m-12 c-12">
                <div class="product-item__wrap">
                    <div class="container__product-item"
                        style="background-image: url(./public/frontend/img/lv-1.webp);">
                        <h2 class="container__product-title-content">Clearance Sale</h2>
                        <p class="container__product-content-sale">Up to 70% Off & Free Shipping</p>
                        <a href="#" class="container__product-content-button">Browse sales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="app__container-selling">
    <div class="grid wide">
        <h4 class="app__container-title">
            Best Selling
        </h4>
        <p class="app__container-introduce">
            "Explore our exclusive range of products with irresistible discounts! Don't miss out on our
            limited-time promotion - shop now for incredible savings!"
        </p>
        <div class="row ">
             @foreach ($bestSellingProduct as $key => $best_sell )
                <div class="col l-4 m-4 c-12">
                    <form>
                        @csrf
                        <input type="hidden" class="cart_product_id_{{$best_sell->product_id}}" value="{{$best_sell->product_id}}">
                        <input type="hidden" class="cart_product_name_{{$best_sell->product_id}}" value="{{$best_sell->product_name}}">
                        <input type="hidden" class="cart_product_price_{{$best_sell->product_id}}" value="{{$best_sell->product_price}}">
                        <input type="hidden" class="cart_product_image_{{$best_sell->product_id}}" value="{{$best_sell->product_image}}">
                        <input type="hidden" class="cart_product_qty_{{$best_sell->product_id}}" value="1">
                        <div class="container__selling-item">
                            <img src="{{URL::to('public/uploads/product/'.$best_sell->product_image)}}" alt="" class="container__selling-img1" style="height: auto;" id="wishlist_productimage{{$best_sell->product_id}}">
                            <img src="{{URL::to('public/uploads/product/'.$best_sell->product_image)}}" alt="" class="container__selling-img2" style="height: auto">
                            <ul class="container__selling-interactive-list">
                                <li class="container__selling-interactive-item" style="margin-top: 20px ; margin-left: 12px">
                                    <button type="button" class="button_wishlist" style="border: none; background-color: transparent" id="{{$best_sell->product_id}}" onclick="add_wishlist(this.id)">
                                    <i class="container__selling-interactive-icon ti-heart heart"></i>
                                    </button>
                                    <span class="selling-interactive-item-content">Add to Wishlis</span>
                                </li>
                                <li class="container__selling-interactive-item">
                                    <button type="button" class="container__selling-interactive-link add-to-cart" data-id_product="{{$best_sell->product_id}}"
                                        name="add-to-cart">
                                        <i class="container__selling-interactive-icon interactive-icon-not-hover ti-bag"></i>
                                    </button>
                                    <span class="selling-interactive-item-content">View Product</span>
                                </li>
                                <li class="container__selling-interactive-item">
                                    <button type="button" class="container__selling-interactive-link quickview" data-id_product="{{$best_sell->product_id}}"
                                           data-toggle="model" data-tagert="#quickview" id="openModal">
                                          <i class="container__selling-interactive-icon interactive-icon-not-hover ti-arrows-corner icon-rotate"></i>
                                    </button>
                                    <span class="selling-interactive-item-content">Quick View</span>
                                </li>
                            </ul>
                        </div>
                    </form>
                <a href="{{URL::to('/product-detail/'.$best_sell->product_id)}}" class="container__selling-name" id="wishlist_producturl{{$best_sell->product_id}}">{{$best_sell->product_name}}</a>
                <p class="container__selling-price" style="margin-top: 45px">{{"$" . $best_sell->product_price}}</p>
                <input type="hidden" name=""  id="wishlist_productname{{$best_sell->product_id}}" value="{{$best_sell->product_name}}">
                <input type="hidden" name=""  id="wishlist_productprice{{$best_sell->product_id}}" value="{{$best_sell->product_price}}">
            </div>
             
             @endforeach
        </div>
    </div>
</div>

<!-- Slide testimoonials -->


<div class="container__testimoonials">
    <div class="container_testimoonials-heading">
        <h2 class="container__testimoonials-heading-title">New Arrival</h2>
    </div>
<div class="sajid-2 owl-carousel owl-theme">
    @php $chunks = array_chunk($all_product->toArray(), 1); @endphp
    @foreach ($chunks as $chunk)
    <div class="Product row">
        @foreach ($chunk as $product)
        <div class="col-md-3 col-sm-6 container-product">
            <div class="container-product-img">
                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="">
            </div>
            <div class="container-produtc-info">
                <form>
                    <a href="{{URL::to('/product-detail/'.$product->product_id)}}">
                        <h2 class="container-text">
                            {{$product->product_name}}
                        </h2>   
                    </a>
                    <div class="addCart" >
                            <p class="container-text">
                            {{$product->product_price}} $
                            </p>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
    <div class="owl-nav">
        <div class="owl-prev-two">
            <i class="ti-angle-left"></i>
        </div>
        <div class="owl-next-two">
            <i class="ti-angle-right"></i>
        </div>
    </div>
</div>

<div class="container__trending">
    <div class="grid wide">
        <h4 class="app__container-title">
            Trending Outfits
        </h4>
        <p class="app__container-introduce">
            Discover our top-rated products, delivering excellence in quality and performance.
        </p>
        <div class="row ">
            @foreach ($outfits as $key => $outfit)
                <div class="col l-3 m-6 c-10 c-o-1">
                <div class="container__trending-item">
                    <img src="{{URL::to('public/uploads/outfit/'.$outfit->outfit_image_first)}}" alt="" class="container__trending-img1" style="height: auto" >
                    <img src="{{URL::to('public/uploads/outfit/'.$outfit->outfit_image_second)}}" alt="" class="container__trending-img2" style="height: auto">
                    <ul class="container__trending-interactive-list">
                        <li class="container__trending-interactive-item">
                            <a href="" class="container__trending-interactive-link">
                                <i class="container__trending-interactive-icon ti-heart"></i>
                            </a>
                        </li>
                        <li class="container__trending-interactive-item interactive-item-borded">
                            <a href="" class="container__trending-interactive-link">
                                <i class="container__trending-interactive-icon ti-bag"></i>
                            </a>
                        </li>
                        <li class="container__trending-interactive-item">
                            <a href="{{URL::to('/product-detail/'.$outfit->product_id)}}" class="container__trending-interactive-link">
                                <i class="container__trending-interactive-icon ti-arrows-corner icon-rotate"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="{{URL::to('/product-detail/'.$outfit->product_id)}}" class="container__selling-name">
                    {{$outfit->product_name}}
                </a>
                <p class="container__selling-price">
                    ${{$outfit->product_price}}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-videointro" style="margin-top: 30px ;padding: 60px 0;
    border-bottom: 1px solid rgb(226, 226, 226);
}">
    <div class="videointro-container" style="display: flex;">
        <div class="video-content" style="margin-left: 20px">
            <video style="width: 100% ;width: 100% ; object-fit: cover" playsinline="true" controls="controls" autoplay="autoplay" loop="loop" preload="none" muted="muted"
             poster="//levents.asia/cdn/shop/files/preview_images/f79cc84849cb42b488b9840d8732a7e8.thumbnail.0000000000_2048x.jpg?v=1722416026">
             <source src="{{('public/frontend/img/videointro.mp4')}}"></video>
        </div>
        <div class="video-content-text" style="margin-left: 30px">
            <div class="content-heading">
                <h3 style="font-size: 2rem">
                    LEVENTS® S/S24 VACATION DREAM COLLECTION
                </h3>
            </div>
            <div class="content-concept" style="margin-top: 10px">
                <span style="font-size: 1.5rem ; color: #9c9c9c" > 
                    This summer 2024, Levents brings a new collection inspired by the joyful and vibrant summer atmosphere. <br> The designs prioritize coolness, dynamism and creativity, suitable for the spirit of youth.
                    
                    Every detail on the  <br> products is carefully taken care of by Levents, aiming to bring superior quality and high durability. The materials are carefully selected, creating a comfortable and pleasant feeling for the wearer, regardless of any outdoor activity.

                    Be confident in expressing your own personality, spreading positive energy with the latest products from Levents.
                </span>
            </div>
            <div class="button-more" style="margin-top: 40px">
                <button style="width: 100px ; height: 30px; cursor: pointer; background-color: black ; color: white">See more</button>
            </div>
        </div>
    </div>
</div>
<div class="container__visit">
    <div class="grid wide">
        <h4 class="app__container-title">
            Visit Us
        </h4>
        <p class="app__container-introduce">
            Stop by our stores to learn the stories behind our products, get a personal styling session, or
            shop the latest in person. See our store locations.
        </p>
        <img src="https://levents.asia/cdn/shop/files/97M02533-scaled_69690e57-aa0c-4013-9574-05c121ab3f68.jpg?v=1700216266&width=990"
            alt="" class="container__visit-img">
    </div>
</div>
<div class="modal" id="quickview">
    <div class="modal-content">
        <div class="modal-header">
            <div class="quickviewName">
                 <h4 class="modal-title">
                <b>
                    QuickView
                </b>
            </h4>
            </div>
            <button class="close" id="closeModal" style="font-size: 2rem ; cursor: pointer;">&times;</button>
        </div>
        <div class="modal-body">
            <article class="product" style="margin: 0px 0px ; padding: 0px 0px">
               <section class="product__slider default-container" aria-label="Product preview" style="margin: 0px 0px ; padding: 0px 0px">
                    <button type="button" class="product__slider___btn-close-lightbox">
                        <span class="sr-only">Close lightbox</span>
                        <span class="icon icon-close" aria-hidden="true"></span>
                    </button>
                    <div class="image-box" aria-label="Product preview" role="region">
                        <button type="button" class="btn-previousImage">
                            <span class="sr-only">Previous Image</span>
                            <span class="icon icon-previous" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn-nextImage">
                            <span class="sr-only">Next Image</span>
                            <span class="icon icon-next" aria-hidden="true"></span>
                        </button>
                        <span id="product_quickview_image">
                            
                        </span>
                        <ul class="product__thumbs default-container" aria-label="Product thumbnails" id="product_quickview_gallery">
                    
                        </ul>
                    </div>
              </section>
             <section class="product__content default-container" aria-label="Product content">
                <header>
                    <h2 class="company-name" tabindex="0">Levents</h2>
                    <h3 class="product__title" tabindex="0" id="product_quickview_title" style="max-width: 500px">
                       
                    </h3>
                </header>
                 <p class="product__description" tabindex="0" id="product_quickview_desc">
                           
                 </p>
                 <div class="product__price">
                    <div class="discount-price">
                        <p class="discount-price__value" tabindex="0" id="product_quickview_price">
                             
                            <span class="sr-only">dollars</span>
                        </p>
                        <p class="discount-price__discount" tabindex="0">50%</p>
                    </div>
                    <div class="full-price">
                        <p tabindex="0" id="product_quickview_price_full">
                           
                            <span class="sr-only">dollars</span>
                        </p>    
                    </div>
                </div>
                <div class="product__desc">
                    <h4 class="product__desc-title" tabindex="0">Product Details</h4>
                    <p class="product__desc-content" tabindex="0" id="product_quickview_content">
                      
                    </p>
                </div>
             </section>
            </article>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="closeFooter">Close</button>
            <button class="btn btn-primary" id="product_quickview_id">
                 
            </button>
        </div>
    </div>
</div>

@endsection