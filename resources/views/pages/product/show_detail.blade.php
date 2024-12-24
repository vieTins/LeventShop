@extends('layout')
@section("content")
            <div class="container-fluid breadcrumb-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::to('/home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{URL::to('/list-category-product/'.$detail_product->first()->category_id)}}">
                {{ $detail_product->first()->category_name }}    
                </a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $detail_product->first()->product_name }}
                </li>
                </ol>
            </nav>
            </div>
            <div class="main-wrapper">
             @foreach ($detail_product as $key => $value)
                 <article class="product">
                    <section class="product__slider default-container" aria-label="Product preview">
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
                             <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="Brown and white sneaker" class="image-box__src" data-product-id="item-cart-1" tabindex="0" aria-controls="lightbox" aria-expanded="false">
                        </div>
                        <ul class="product__thumbs default-container" aria-label="Product thumbnails">
                            @foreach ($gallery->slice(0, 4) as $key => $gal)
                                <li class="thumb-item">
                                    <button type="button" class="thumb-item__btn" aria-label="change to image {{ $key + 1 }}">
                                        <img src="{{ URL::to('public/uploads/gallery/' . $gal->gallery_image) }}" alt="" data-thumb-index="{{ $key }}" role="presentation">
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                        <section class="product__content default-container" aria-label="Product content">
                        <form>
                        @csrf   
                        <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                        <header>
                            <h2 class="company-name" tabindex="0">Levents</h2>
                            <p class="product__name" tabindex="0">
                                {{ $value->product_name }}
                            </p>
                            <h3 class="product__title" tabindex="0">
                               {{ $value->product_name }} 
                            </h3>
                        </header>
                        <p class="product__description" tabindex="0">
                            {{ $value->product_desc }}
                        </p>
                        <div class="product__price">
                            <div class="discount-price">
                                <p class="discount-price__value" tabindex="0">
                                    &dollar;  {{ $value->product_price }}
                                    <span class="sr-only">dollars</span>
                                </p>
                                <p class="discount-price__discount" tabindex="0">50%</p>
                            </div>
                            <div class="full-price">
                                <p tabindex="0">
                                    &dollar;
                                    @php
                                        $value->product_price = $value->product_price * 2;
                                        echo $value->product_price;
                                    @endphp
                                    <span class="sr-only">dollars</span>
                                </p>
                            </div>
                        </div>
                        <div class="voucherProduct">
                            <div class="voucherLevent">
                                <div class="voucherName">
                                    <svg class="icon icon-accordion" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.8995 12.7279C18.6805 11.9469 18.6805 10.6805 17.8995 9.89949L9.41421 1.41421C8.63317 0.633165 7.36684 0.633164 6.58579 1.41421L5.77766 2.22234C6.71492 3.15959 6.72849 4.66562 5.80797 5.58614C4.88745 6.50667 3.38142 6.4931 2.44416 5.55584L1.63604 6.36396C0.854991 7.14501 0.854991 8.41134 1.63604 9.19239L10.1213 17.6777C10.9024 18.4587 12.1687 18.4587 12.9497 17.6777L13.7579 16.8695C12.8206 15.9323 12.807 14.4263 13.7276 13.5057C14.6481 12.5852 16.1541 12.5988 17.0914 13.536L17.8995 12.7279Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11.96 3.95972L4.18179 11.7379" stroke="black" stroke-width="1.4" stroke-linecap="round"></path>
                                    </svg>
                                    <div class="voucherNameInfor">
                                        <span class="" style="font-size: 1rem; font-weight: 500;    ">
                                            Voucher of Levent
                                        </span>
                                    </div>
                                    <button class="buttonMore" type="button">
                                        <i class="fa-solid fa-chevron-right" style="margin-top:2px;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="productTags" style="padding: 10px 0px">
                            <div class="">
                                <span style="font-size: 1.2rem;font-weight: 600"> <i class="fa-solid fa-tags"></i> Tags</span>
                            </div>
                            <div class="tags-container1">
                                <p>
                                    @php
                                        $tags = $value->product_tags;
                                        $tags = array_filter(explode(',', $tags));
                                    @endphp
                                    @if(!empty($tags))
                                        @foreach ($tags as $tag)
                                        <div class="tag-item">
                                            <i class="fa-solid fa-tag"></i>
                                            <a style="font-size: 1.2rem;font-weight: 500 ; color: white" href="{{URL::to('/tag/'.$tag)}}">{{$tag}}</a>
                                        </div>
                                        @endforeach
                                    @endif  
                                </p>
                            </div>
                        </div>
                        <div class="productColor">
                            <div class="">
                                <span style="font-size: 1.2rem;font-weight: 600">Color</span>
                            </div>
                            <div class="imgColor">
                                    <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="">
                                @if(isset($gallery[4]))
                                    <div class="">
                                        <img src="{{ asset('public/uploads/gallery/'.$gallery[4]->gallery_image) }}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="sizeProduct">
                            <div class="size">
                                <span style="font-size: 1.2rem;font-weight: 600">Size</span>
                                    <div class="" style="display: flex;">
                                        <div class="buttonTableSize">
                                            <img alt="size-chart" width="16" height="16" class="mr2" loading="lazy" src="//levents.asia/cdn/shop/files/size_chart_1.svg?v=1711013285">
                                            <span style="font-size: 1.2rem; margin-left: 5px; font-weight: 600; cursor: pointer;">Table Size</span>
                                        </div>
                                    </div>
                            </div>
                            <div class="sizeOptions">
                                <div class="option">
                                    <input type="radio" id="size1" name="size" value="Size 1" required>
                                    <label for="size1">Size 1</label>
                                </div>
                                <div class="option">
                                    <input type="radio" id="size2" name="size" value="Size 2">
                                    <label for="size2">Size 2</label>
                                </div>
                                <div class="option">
                                    <input type="radio" id="size3" name="size" value="Size 3">
                                    <label for="size3">Size 3</label>
                                </div>
                            </div>
                        </div>
                        <div class="product-rating">
                            <div class="review-star">
                                @if (Session::get('customer_id'))
                                    <ul class="list-inline" style="display: flex; margin: 0px">
                                    @for ($count = 1 ; $count <=5 ; $count++)
                                        @php
                                            $color = ($count <= $rating) ? "color: #ffcc00;" : "color: #ccc;";
                                        @endphp
                                            <li id="{{$value->product_id}}-{{ $count }}"
                                        data-index="{{ $count }}"
                                        data-product_id="{{ $value->product_id }}"
                                        data-rating="{{ $rating }}"
                                        class="rating"
                                        style="cursor: pointer; {{ $color }} ; font-size: 20px ; margin-right:5px;">
                                        &#9733
                                        </li>
                                    @endfor
                                    </ul>
                                @else 
                                    <ul class="list-inline" style="display: flex; margin: 0px">
                                    @for ($count = 1 ; $count <=5 ; $count++)
                                        @php
                                            $color = ($count <= $rating) ? "color: #ffcc00;" : "color: #ccc;";
                                        @endphp
                                        <li id=""
                                        data-index=""
                                        data-product_id=""
                                        data-rating=""
                                        class="rating"
                                        style="cursor: pointer; {{ $color }} ; font-size: 20px ; margin-right:5px;">
                                        &#9733
                                        </li>
                                    @endfor
                                    </ul>
                                @endif
                            </div>
                            <span style="font-size: 1.2rem;">( {{ $count_rating}} ) ratings</span>
                        </div>
                        <div class="add-product">
                            <div class="update-amount">
                                <span id="minus" aria-label="Minus Button" onclick="changeQuantity(-1)">
                                    <i class="fa-solid fa-minus"></i>    
                                </span>  
                                <input type="number" min="1" value="1" id="input" name="qty" required class="cart_product_qty_{{$value->product_id}}">
                                <span id="plus" aria-label="Plus Button" onclick="changeQuantity(1)">
                                    <i class="fa-solid fa-plus"></i> 
                                </span>  
                            </div>
                            <button id="update-cart" name="submit" type="button" class="add-to-cart" data-id_product="{{$value->product_id}}">  
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p class="cart-text">Add to cart</p></button>
                        </div>
                        </form>
                        <div class="productInformation">
                                <div class="productInforCard">
                                    <div class="productInforTitle">
                                        <span class="titleIC">Information Product</span>
                                        <button class="productInforClose">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </div>
                                    <div class="titleDes">
                                        Sturdy denim material with stain-resistant black color
                                    </div>
                                </div>
                                <div class="productInforCard">
                                    <div class="productInforTitle">
                                        <span class="titleIC">Shipping policy</span>
                                        <button class="productInforClose">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </div>
                                    <div class="titleDes">
                                        Free shipping for orders over 1,000,000 VND
                                    </div>
                                </div>
                                <div class="productInforCard">
                                    <div class="productInforTitle">
                                        <span class="titleIC">Return policy</span>
                                        <button class="productInforClose">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </div>
                                    <div class="titleDes">
                                        Free returns within 7 days
                                    </div>
                                </div>
                        </div>
                        <div class="reviews-comment">
                            <div class="review-details">
                                <h3>Reviews</h3>
                                  <form action="">  
                                        @csrf
                                        <input type="hidden" name="comment_product_id" value="{{$value->product_id}}"  class="comment_product_id">
                                        <div id="comment_show">

                                        </div>
                                   </form>
                                <div class="add-comment">
                                    <h3>Comments</h3>
                                    <div class="information-comment">
                                        <div class="infor-comment">
                                            <div class="user-comment">
                                                <i class="fa-solid fa-user"></i>
                                                 {{ Session::get('customer_name') }}
                                            </div>
                                            <div class="time-comment">
                                                <i class="fa-solid fa-clock"></i>
                                                @php
                                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                    echo date('d/m/Y H:i');
                                                @endphp
                                            </div>
                                            <div class="date-comment">
                                                <i class="fa-solid fa-calendar"></i>
                                                @php
                                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                    echo date('d/m/Y');
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="genral-infor">
                                             <span>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore voluptatum praesentium magnam doloribus voluptas, omnis culpa ad error quae mollitia animi sequi beatae veritatis sunt amet, maiores nesciunt minima ex?
                                             </span>
                                        </div>
                                        @if (Session::get('customer_id'))   
                                            <form action="">
                                            @csrf
                                             <div class="write-your-review">
                                                <div class="name-email">
                                                    <input type="text" name="comment_name" id="" placeholder="Your Name" class="comment_name" value=" {{ Session::get('customer_name') }}" readonly>
                                                    <input type="text" name="comment_email" id="" placeholder="Your Email">
                                                </div>
                                                <div class="content-email">
                                                    <textarea name="comment_content" id="" cols="30" rows="5" class="comment_content"></textarea>
                                                </div>
                                            </div>
                                            <div class="submit-comment">
                                                <button type="button" class="send_comment">Comment Now</button>
                                            </div>  
                                            </form>
                                        @else
                                            <div class="write-your-review">
                                                <div class="name-email">
                                                    <input type="text" name="comment_name" id="" placeholder="Your Name" class="comment_name" value=" {{ Session::get('customer_name') }}" readonly>
                                                    <input type="text" name="comment_email" id="" placeholder="Your Email" readonly>
                                                </div>
                                                <div class="content-email">
                                                    <textarea name="comment_content" id="" cols="30" rows="5" class="comment_content" readonly></textarea>
                                                </div>
                                            </div>
                                            <div class="submit-comment">
                                                <span>
                                                    You need to login to comment
                                                </span>
                                            </div>  
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- </form> --}}
                </article>       
             @endforeach
            </div>
            <div class="product-footer">
    <div class="product-footer__title">
        <h3>YOU MAY ALSO LIKE</h3>
    </div>
    <div class="glider-contain">
        <div class="glider">
            @foreach ($related_product as $key => $related)
                <div class="container-box">
                <div class="product-box">
                    <span class="p-disscount discount-price__discount">-20%</span>
                    <div class="p-img-container">
                        <div class="p-img">
                            <a href="#">
                                <img src="{{URL::to('public/uploads/product/'.$related->product_image)}}" class="p-img-front" alt="Front">
                                <img src="{{URL::to('public/uploads/product/'.$related->product_image)}}" class="p-img-back" alt="Back">
                            </a>
                        </div>
                    </div>
                    <div class="p-box-text">
                        <div class="product-category">
                            <span>
                                {{ $related->category_name }}
                            </span>
                        </div>
                        <a href="{{URL::to('/product-detail/'.$related->product_id)}}" class="product-title">
                           {{$related->product_name}}
                        </a>
                        <div class="price-buy">
                            <span class="p-price">
                                {{ $related->product_price }}
                            </span>
                            <div class="buy-btn-button">
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button aria-label="Previous" class="glider-prev"><i class="fa-solid fa-arrow-left"></i></button>
        <button aria-label="Next" class="glider-next"><i class="fa-solid fa-arrow-right"></i></button>
        <div role="tablist" class="dots"></div>
    </div>
</div>
        </div>
        <div class="cardVoucher">
            <div class="card">
                <div class="cardInfo">
                    <button class="iconClose">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <div class="cardTitle">
                        <span class="cardTitle">
                            Voucher Of Levents
                        </span>
                    </div>
                </div>
                <div class="cardVoucherContent">
                    @foreach ($coupon as $key => $item)
                        <div class="voucherDiv">
                            <div class="imgVoucher">
                                <img src="https://levents.asia/cdn/shop/files/Va_no_la.png?v=1700562522&width=160" alt="">
                            </div>
                            <div class="divide"></div>
                            <div class="membership__info-title">
                                <div class=""> 
                                    <span class="titleVoucher">
                                        {{ $item['coupon_code'] }}
                                    </span>
                                </div>
                                <div class="">
                                    <span class="test-base">
                                        VOUCHER FOR {{ $item['coupon_number'] }} DISSCOUNT
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" id="myInput{{ $key }}" value="{{ $item['coupon_code'] }}">
                            <button onclick="myFunction({{ $key }})" type="button" class="copyVoucher" id="copyButton{{ $key }}">
                                Copy
                            </button>
                        </div>
                    @endforeach
                    <div class="voucherFooter">
                        <img src="{{ asset('public/frontend/img/voucher.jpg') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
        <div class="tableSize">
            <div class="cardTableSize">
                <div class="cardInfo">
                    <button class="iconCloseTableSize">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <div class="cardTitle">
                        <span class="cardTitle">
                            Table Size
                        </span>
                    </div>
                </div>
                <div class="cardTableSizeContent">
                    <div class="tableSizeImg">
                        <img src="{{ asset('public/frontend/img/tableSize.jpg') }}" alt="">
                    </div>
                </div>
                <div class="tableSizeFooter">
                    <div class="">
                        <a class="link" href="./Product.html">You can not choose the right size?</a>
                    </div>
                </div>
            </div>
@endsection 