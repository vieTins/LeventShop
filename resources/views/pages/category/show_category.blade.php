@extends('layout')
@section("content")
<nav class="page-width">
    <div class="address-link">
        <a href="{{URL::to('/')}}" class="link">Home / </a>
        <span class="page-title">
              @if (!empty($category_by_id[0]))
                  <a href="{{URL::to('/list-category-product/'. $category_by_id[0]->category_id)}}" class="link" style="margin-left:5px">
                     {{ $category_by_id[0]->category_name}}
                  </a>
              @endif    
        </span>
    </div>
    <div class="filterlist">
        <ul>
            <li><a href=""></a> Category <i class="fa-solid fa-chevron-down"></i>
                <div class="dropdown_menu">
                    <ul>
                        <li>
                            <a href="">All (80)</a>
                        </li>
                        <li>
                            <a href="">New Product (30)</a>
                        </li>
                        <li>
                            <a href="">Levents Animal (40)</a>
                        </li>
                        <li>
                            <a href="">Bags (10)</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href=""></a> Filter Price <i class="fa-solid fa-chevron-down"></i>
                <div class="dropdown_menu" style="width: 200px ; height: 130px; padding: 10px 10px">
                 <form action="">
                         <p>
                            <span>Price : </span>
                            <input type="text" id="amount" readonly="" style="border:0; color:#f6931f; font-weight:bold; margin: 10px 10px">
                            <input type="hidden" name="start_price" id="start_price" readonly="">
                            <input type="hidden" name="end_price" id="end_price" readonly="">
                        </p>
                        <div id="slider-range" style="padding-bottom: 10px"></div>
                        <br>
                        <input type="submit" value="Filter" name="filter_price" class="btn btn-sm btn-default" style="font-size: 1.3rem">
                     </form>
                 </div>
            </li>
            <li><a href=""></a> Filters <i class="fa-solid fa-chevron-down"></i>
                <div class="dropdown_menu_2_container">
                    <div class="dropdown_menu_2">
                        <div class="menu-1">
                            <div class="menu-container">
                                <h3>COLOR</h3>
                                <div class="filter-options">
                                    <div class="">
                                        <label><input type="checkbox" checked> All</label>
                                        <label><input type="checkbox"> Beige</label>
                                        <label><input type="checkbox"> Black</label>
                                        <label><input type="checkbox"> Blue</label>
                                    </div>
                                    <div class="">
                                        <label><input type="checkbox"> Bordeaux</label>
                                        <label><input type="checkbox"> Brown</label>
                                        <label><input type="checkbox"> Gold</label>
                                        <label><input type="checkbox"> Green</label>
                                    </div>
                                    <div class="">
                                        <label><input type="checkbox"> Grey</label>
                                        <label><input type="checkbox"> Neutral</label>
                                        <label><input type="checkbox"> Orange</label>
                                        <label><input type="checkbox"> Pink</label>
                                    </div>
                                    <div class="">
                                        <label><input type="checkbox"> Red</label>
                                        <label><input type="checkbox"> Silver</label>
                                        <label><input type="checkbox"> White</label>
                                        <label><input type="checkbox"> Yellow</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-2">
                            <div class="menu-container">
                                <h3>MATERIAl</h3>
                                <div class="filter-options">
                                    <div class="">
                                        <label><input type="checkbox" checked> All</label>
                                        <label><input type="checkbox"> Canvas</label>
                                        <label><input type="checkbox"> Fabric</label>
                                        <label><input type="checkbox"> GG Canvas</label>
                                        <label><input type="checkbox"> GG Leather</label>
                                    </div>
                                    <div class="">
                                        <label><input type="checkbox"> Leather</label>
                                        <label><input type="checkbox"> Nylon</label>
                                        <label><input type="checkbox"> Original GG Fabric</label>
                                        <label><input type="checkbox"> Patent Leather</label>
                                        <label><input type="checkbox"> Suede</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-button">
                        <div class="">
                            <div class="">
                                <span>You can select several options at once.</span>
                            </div>
                            <div class="button-group">
                                <button type="button" class="button-apply">
                                    Apply
                                </button>
                                <button type="button" class="button-dise">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="">
                </a>
                <span class="tagNew">Sort by :</span> Options 
                <i class="fa-solid fa-chevron-down"></i>
                    <div class="dropdown_menu_sort">
                        <fo rm action="">
                            @csrf
                            <select id="sort" style="background-color: white">
                                <option value="{{Request::url()}}?sort_by=none" style="font-size: 1rem;
                            cursor: pointer; color: black">Filter</option>
                                                    <option value="{{Request::url()}}?sort_by=increasing" style="font-size: 1rem;
                            cursor: pointer; color: black">Low to High</option>
                                                    <option value="{{Request::url()}}?sort_by=decreasing" style="font-size: 1rem;
                            cursor: pointer; color: black">High to Low</option>
                                                    <option value="{{Request::url()}}?sort_by=atoz" style="font-size: 1rem;
                            cursor: pointer; color: black">A to Z</option>
                                                    <option value="{{Request::url()}}?sort_by=ztoa" style="font-size: 1rem;
                            cursor: pointer; color: black">Z to A</option>
                            </select>
                        </fo>
                    </div>
            </li>
        </ul>
    </div>
</nav>
@if (!empty($category_by_id[0]))
<div class="container">
    <div class="row justify-content-center">
        <!-- First Column -->
        <div class="col-12 col-md-6">
            <div class="card-container position-relative text-center">
                <a href="" target="_self">
                    <img src="{{asset('public/frontend/img/bannerCategory/'. $category_by_id[0]->category_name . '2.jpg')}}" alt="Women's Bags" class="img-fluid card-image">
                </a>
                <div class="overlayText">
                    <span class="titleCategory">Men's 
                        {{ $category_by_id[0]->category_name}}
                    </span>
                   <div class="textBorder">
                     <span class="desCategory">Discover</span>
                   </div>
                </div>
            </div>
        </div>

        <!-- Second Column -->
        <div class="col-12 col-md-6">
            <div class="card-container position-relative text-center">
                <a href="" target="_self">
                    <img src="{{asset('public/frontend/img/bannerCategory/'. $category_by_id[0]->category_name . '1.jpg')}}" alt="Men's Bags" class="img-fluid card-image">
                </a>
                <div class="overlayText">
                    <span class="titleCategory">Women's 
                         {{ $category_by_id[0]->category_name}}
                    </span>
                  <div class="textBorder">
                      <span class="desCategory">Discover</span>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display: flex; justify-content: center;">
        <div class="contentFooter">
            <div class="contentDesc">
                <span class="desFooter">
                     {{ $category_by_id[0]->category_name}}
                </span>
            </div>
            <span>
                <div class="contentDesc">
                   <span>
                    Explore the latest <strong>
                         {{ $category_by_id[0]->category_name}}
                    </strong>
                   </span>
                </div>
            </span>
        </div>
    </div>
</div>
<div class="all__Product_container">
    <!-- list all product -->
    <div class="all__Product_content">
        <div class="product-items">
            @foreach ($category_by_id as $key => $product)
            <div class="item_product">
                <div class="status__Product">
                    <div class="status_new">
                        New
                    </div>
                    <div class="status_favorite">
                        <button class="button_wishlist" style="border: none; background-color: transparent" id="{{$product->product_id}}" onclick="add_wishlist(this.id)">
                            <i class="fa-regular fa-heart heart"></i>
                        </button>
                    </div>
                </div>
                <div class="img_Product">
                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" class="img_Item--1" id="wishlist_productimage{{$product->product_id}}">
                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" class="img_Item--2">
                </div>
                <div class="infor_Product">
                    <span class="price_Product">
                        $ {{$product->product_price}}        
                    </span> <br>
                    <input type="hidden" name=""  id="wishlist_productname{{$product->product_id}}" value="${{$product->product_name}}">
                    <input type="hidden" name="" id="wishlist_productprice{{$product->product_id}}" value="${{$product->product_price}}">
                    <a href="{{URL::to('/product-detail/'.$product->product_id)}}"  id="wishlist_producturl{{$product->product_id}}"><span class="name_Product">
                          {{$product->product_name}}    
                    </span></a>
                    <div class="feedback_Product">
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    <span class="describe__Product">
                        New Arrival
                    </span>
                </div>
                <div class="buy__Product">
                    <button class="buyNow">
                        <span>
                            <a href="{{URL::to('/product-detail/'.$product->product_id)}}" style="text-decoration: none ;">
                            <span>  Buy Now </span></a>
                        </span>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
     {{-- paginate --}}
    <div class="pagination-links">
        {{ $category_by_id->links() }}
    </div>
</div>

@else
    <center style="margin-top: 10px">
        <span>
            This category is empty now ...
        </span>
        <div class="">
            <img src="{{asset('public/frontend/img/Animation - 1732112157629.gif')}}" alt="">
        </div>
    </center>
@endif
<div class="product-footer">
    <div class="product-footer__title">
        <h3>BEST SELLER</h3>
    </div>
    <div class="glider-contain">
        <div class="glider">
            @foreach ($bestSellingProducts as  $product)
              <div class="container-box">
                    <div class="product-box">
                        <span class="p-disscount">-50%</span>
                        <div class="p-img-container">
                            <div class="p-img">
                                <a href="#">
                                    <img src="{{URL::to('public/uploads/product/'.$product['product_image'])}}" class="p-img-front" alt="Front">
                                    <img src="{{URL::to('public/uploads/product/'.$product['product_image'])}}" class="p-img-back" alt="Back">
                                </a>
                            </div>
                        </div>
                        <div class="p-box-text">
                            <div class="product-category">
                                <span>
                                    {{ $product['product_desc'] }}
                                </span>
                            </div>
                            <a href="{{URL::to('/product-detail/'.$product['product_id'])}}" class="product-title">
                               {{ $product['product_name'] }}
                            </a>
                            <div class="price-buy">
                                <span class="p-price">
                                    {{ $product['product_price'] }}
                                </span>
                                <div class="buy-btn-button">
                                    <a href="{{URL::to('/product-detail/'.$product['product_id'])}}" class="buy-btn">Buy Now</a>
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
@endsection




