@extends('layout_account')
@section('content_account')
    <nav class="page-width" style="margin-top: 120px">
        <div class="address-link">
            <a href="{{URL::to('/home   ')}}" class="link">Home / </a>
            <span class="page-title">
            </span>
            <span class="page-title">
                 All Product
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
                <li><a href=""></a> Line <i class="fa-solid fa-chevron-down"></i></li>
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
                                    <button type="button" class="button-close">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href=""></a> <span class="tagNew">Sort by :</span> Newest <i class="fa-solid fa-chevron-down"></i>
                    <div class="dropdown_menu_sort">
                        <ul>
                            <li>
                                <a href="">Newest</a>
                            </li>
                            <li>
                                <a href="">Price - High to low</a>
                            </li>
                            <li>
                                <a href="">Price - Low to high</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="all__Product_container">
        <!-- list all product -->
        <div class="all__Product_content">
            <div class="product-items" id="all_product">
            </div>
        </div>
        <div class="all__Product_content" style="margin-bottom: 20px">
            <div id="load_more_container"></div>
        </div>
    </div>
@endsection