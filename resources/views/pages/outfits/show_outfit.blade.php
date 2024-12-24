@extends('layout')
@section("content")
<nav class="page-width">
    <div class="address-link">
        <a href="{{URL::to('/home')}}" class="link">Home / </a>
        <span class="page-title">Outfits / 
        </span>
        <span class="page-title">
              Trending Outfits
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
<div class="all__Product_container">
<div class="container__trending scroll__show-product">
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
                                <i class="container__trending-interactive-icon ti-heart  "></i>
                            </a>
                        </li>
                        <li class="container__trending-interactive-item interactive-item-borded">
                            <a href="" class="container__trending-interactive-link">
                                <i class="container__trending-interactive-icon ti-bag"></i>
                            </a>
                        </li>
                        <li class="container__trending-interactive-item">
                            <a href="" class="container__trending-interactive-link">
                                <i class="container__trending-interactive-icon ti-arrows-corner icon-rotate"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="container__selling-name">
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
</div>
@endsection