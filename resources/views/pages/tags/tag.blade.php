@extends('layout_account')
@section('content_account')
    <nav class="page-width" style="margin-top: 120px">
        <div class="address-link">
            <a href="{{URL::to('/home   ')}}" class="link">Home / </a>
            <span class="page-title">
            </span>
            <span class="page-title">
              Tag of {{$tag}}
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
                        <form action="">
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
                        </form>
                    </div>
            </li>
        </ul>
    </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="product__title contentTagTitle">
                   <center>
                        <h4> <i class="fa-solid fa-tag" style="font-weight: 800 ; color: white"></i>
                        <span style="font-weight: 800 ; color: white">
                            <?php
                                $search = $tag;
                                if($search){
                                   echo $search ;
                                }
                                Session::put('keywords', null);
                            ?>
                        </span>
                    </h4>
                   </center>
                </div>
            </div>
        </div>
    </div>
    <div class="all__Product_container">
        <!-- list all product -->
        <div class="all__Product_content">
            <div class="product-items">
                @foreach ($product_tag as $key => $product)
                <div class="item_product">
                    <div class="status__Product">
                        <div class="status_new">
                            New
                        </div>
                    <div class="status_favorite">
                        <button class="button_wishlist" style="border: none; background-color: transparent" id="{{$product->product_id}}" onclick="add_wishlist(this.id)">
                             <i class="container__selling-interactive-icon ti-heart heart"></i>
                        </button>
                    </div>
                    </div>
                    <div class="img_Product">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" class="img_Item--1" id="wishlist_productimage{{$product->product_id}}">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" class="img_Item--2">
                    </div>
                    <div class="infor_Product">
                        <span class="price_Product">
                              <input type="hidden" name=""  id="wishlist_productname{{$product->product_id}}" value="${{$product->product_name}}">
                              <input type="hidden" name="" id="wishlist_productprice{{$product->product_id}}" value="${{$product->product_price}}">
                            $ {{$product->product_price}}        
                        </span> <br>
                        <a href="{{URL::to('/product-detail/'.$product->product_id)}}" id="wishlist_producturl{{$product->product_id}}"><span class="name_Product">
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
                            <span>Buy Now</span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection