<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>Levents Fashion</title>

    <link rel="icon"
        href="https://levents.asia/cdn/shop/files/image_461.png?crop=center&height=32&v=1703152234&width=32"
        type="image/x-icon" />

    <!-- Slide -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/style.css')}}">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/js.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/style-product.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/grid.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/style.css')}}">  
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/responsive.css')}}">
    
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/glider.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/stylecss/cart.css')}}">
</head>

<body>
    <div class="preloader">
    </div>

    <div class="app">
        <div class="header">
            <div class="header__contact hide-on-mobile-tablet">
                <ul class="header__contact-list">
                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            <i class="header__contact-icon ti-facebook"></i>
                        </a>
                    </li>
                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            <i class="header__contact-icon ti-twitter-alt"></i>
                        </a>
                    </li>
                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            <i class="header__contact-icon ti-instagram"></i>
                        </a>
                    </li>

                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            About Us
                        </a>
                    </li>

                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            Wishlist
                        </a>
                    </li>

                    <li class="header__conatct-item">
                        <a href="" class="header__contact-item-link">
                            Contact
                        </a>
                    </li>

                </ul>

                <ul class="header__contact-list">
                    <li class="header__conatct-item header__conatct-language">
                        <a href="" class="header__contact-item-language ">
                            English
                            <i class="header__contact-icon-arrow ti-angle-down"></i>
                        </a>
                        <ul class="header__contact-subnav">
                            <li class="header__contact-subnav-item">
                                <a href="{{URL::to('lang/vi')}}" class="header__contact-subnav-item-link">Vietnamese</a>
                            </li>
                            <li class="header__contact-subnav-item">
                                <a href="{{URL::to('lang/en')}}" class="header__contact-subnav-item-link">English</a>
                            </li>
                            <li class="header__contact-subnav-item">
                                <a href="{{URL::to('lang/cn')}}" class="header__contact-subnav-item-link">China</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <input type="checkbox" id="header__menu-input" class="nav-input">
            <input type="checkbox" id="header__menu-bag" class="cart-input">
            <input type="checkbox" id="header__menu-search" class="search-input">
            <input type="checkbox" id="menu__mobile--tablet-check" class="menu__mobile--tablet-input">

            <label for="header__menu-search" class="header__menu-bag-overlay">
            </label>
            <label for="header__menu-bag" class="header__menu-bag-overlay">
            </label>
            <label for="menu__mobile--tablet-check" class="header__menu-bag-overlay">
            </label>

            <div class="header__menu-sreach">
                <div class="header__menu-sreach-close">
                    <label for="header__menu-search" href="#" class="header__menu-sreach-close-link">
                        <i class="nav__bang-sreach-close-icon ti-close"></i>
                    </label>
                </div>

                <div class="header__menu-sreach-nav">
                    <div class="header__menu-sreach-bar-all">
                        <div class="header__menu-sreach-bar">
                            <button type="submit" style="background-color: transparent ; border: none">
                                <i class="header__menu-sreach-icon ti-search"></i>
                            </button>
                            <form action="{{URL::to('/search')}}" method="POST">
                                @csrf
                                <input type="text" class="header__menu-sreach-input" placeholder="Search product..." name="keywords_submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="menu__mobile--tablet l-0">
                <div class="menu__mobile--tablet-header">
                    <label for="menu__mobile--tablet-check" href="#" class="mobile--tablet__link-close">
                        <i class="mobile--tablet__close-icon ti-close"></i>
                    </label>
                </div>
                <div class="menu__mobile--tablet-body">

                    <div class="menu__mobile--tablet-body-top">
                        <div class="menu__mobile--tablet-sreach">
                            <i class="menu__mobile--tablet-sreach-icon ti-search"></i>
                            <input type="text" class="menu__mobile--tablet-sreach-input"
                                placeholder="Sreach products...">
                        </div>

                        <div class="menu__mobile--tablet-nav">
                            <a href="" class="menu__mobile--tablet-content">MAIN</a>
                            <i class="menu__mobile--tablet-main-icon ti-angle-right"></i>
                        </div>
                        <div class="menu__mobile--tablet-nav">
                            <a href="" class="menu__mobile--tablet-content">SHOP</a>
                            <i class="menu__mobile--tablet-main-icon ti-angle-right"></i>
                        </div>
                        <div class="menu__mobile--tablet-nav">
                            <a href="" class="menu__mobile--tablet-content">PRODUCT</a>
                            <i class="menu__mobile--tablet-main-icon ti-angle-right"></i>
                        </div>
                        <div class="menu__mobile--tablet-nav">
                            <a href="" class="menu__mobile--tablet-content">PAGES</a>
                            <i class="menu__mobile--tablet-main-icon ti-angle-right"></i>
                        </div>
                        <div class="menu__mobile--tablet-nav">
                            <a href="" class="menu__mobile--tablet-content">JOURNAL</a>
                            <i class="menu__mobile--tablet-main-icon ti-angle-right"></i>
                        </div>
                    </div>


                    <div class="menu__mobile--tablet-body-bottom">
                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Login</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-lock"></i>
                        </div>

                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Cart</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-bag"></i>
                        </div>

                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Wishlist</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-heart"></i>
                        </div>

                        <div class="menu__mobile--tablet-subnav">
                            <a class="menu__mobile--tablet-subnav-content">Langue</a>
                            <i class="menu__mobile--tablet-subnav-icon ti-world"></i>
                        </div>

                        <i class="menu__mobile--tablet-subnav-icon ti-facebook"></i>
                        <i class="menu__mobile--tablet-subnav-icon ti-twitter-alt"></i>
                        <i class="menu__mobile--tablet-subnav-icon ti-instagram"></i>
                    </div>
                </div>
            </div>

            <div class="header__menu-nav-bag">
                <div class="nav__bang-header">
                    <span class="nav__bang-header-cart">
                        <b>
                            Your Cart
                        </b>
                    </span>
                    <label for="header__menu-bag" class="nav__bag-header-link">
                           <i class="nav__bang-header-icon ti-close"></i>
                    </label>
                </div>
                <div class="shopping__cart-container">
                    <?php
                        $sessionCart = Session::get('cart', []);
                        if (!is_array($sessionCart)) {
                            $sessionCart = [];
                        }
                        $sessionCartNormalized = [];
                        foreach ($sessionCart as $item) {
                            if (is_array($item)) {
                                $sessionCartNormalized[] = [
                                    'id' => $item['product_id'],
                                    'name' => $item['product_name'],
                                    'image' => $item['product_image'],
                                    'price' => $item['product_price'],
                                    'qty' => $item['product_qty'],
                                ];
                            }
                        }
                        $finalCart = [];
                        foreach ($sessionCartNormalized as $item) {
                            if (isset($finalCart[$item['id']])) {
                                $finalCart[$item['id']]['qty'] += $item['qty'];
                            } else {
                                $finalCart[$item['id']] = $item;
                            }
                        }
                        $newarray = array_values($finalCart);
                        $content = $newarray;
                        $total = 0;
                        foreach ($content as $item) {
                            $total += $item['price'] * $item['qty'];
                        }
                    ?>
                    <ul class="nav__bag-list">
                            @if($content == true) 
                                @foreach ($content as $subcontent)
                                    <li class="nav__bag-list-item">
                                        <div class="nav__bag-list-item-left">
                                            <img src="{{URL::to('public/uploads/product/'.$subcontent['image'])}}" class="nav__bag--item-img"
                                                alt="">
                                        </div>
                                        <div class="nav__bag-list-item-right">
                                            <div class="nav__bag--item-name">
                                                <a href="{{URL::to('/product-detail/'.$subcontent['id'])}}" class="nav__bag--item-name-link">
                                                    {{ $subcontent['name']}}
                                                </a>
                                                <a href="{{URL::to('/delete-to-cart/'.$subcontent['id'])}}">
                                                    <i class="ti-close nav__bag--item-name-close"></i>
                                                </a>
                                            </div>
                                            <div class="nav__bag--item-pricing">
                                                <div class="nav__bag--item-quantity">
                                                    <a href="#" class="minus">
                                                        <i class=" ti-minus"></i>
                                                    </a>
                                                    <input type="number" class="nav__bag--item-quantity-number" maxlength="1"
                                                        value="{{ $subcontent['qty'] }}" placeholder="0">
                                                    <a href="#" class="plus">
                                                        <i class=" ti-plus"></i>
                                                    </a>
                                                </div>

                                                <p class="nav__bag--item-price">
                                                    ${{ $subcontent['price']}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else 
                                <div class="cartEmpty" style="text-align: center"> 
                                <svg width="159" height="175" viewBox="0 0 159 175" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.5 46.3692L2.50023 172.5H156.5V46.3692M2.5 46.3692H156.5M2.5 46.3692L13.5 28.8511H20.032M156.5 46.3692L144.278 28.8511H137.755" stroke="black" stroke-width="4"></path>
                                <path d="M55.4375 72.6129V97.1685H103.562V72.6129" stroke="black" stroke-width="4"></path>
                                <path d="M93.918 23.1935V9.22327L139.234 12.5849L136.688 46.6809" stroke="black" stroke-width="4"></path>
                                <path d="M53.5456 46.6808L51.5576 28.9124L101.653 21.709L106.725 46.6808" stroke="black" stroke-width="4"></path>
                                <path d="M21.5691 45.7204L18.0596 7.04951L71.8723 2.5L74.2119 25.2476" stroke="black" stroke-width="4"></path>
                            </svg>
                            <h3 class="cartEmpty__text">Your cart is empty</h3>
                            </div>
                            @endif
                    </ul>
                    <div class="nav__bag-cart-panel">
                        <div class="nav__bag-cart-panel-total">
                            <p class="nav__bag-total-text">Subtotal:</p>
                            <p class="nav__bag-total-price">
                                ${{$total}}
                            </p>
                        </div>
                         <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id != NULL){
                            ?>
                                <a href="{{URL::to('/show-cart')}}" class="nav__bag-view-cart">View cart</a>
                                <a href="{{URL::to('/information-order')}}" class="nav__bag-check-out">Your Order</a>
                            <?php 
                            }else{
                            ?>
                                <a href="{{URL::to('/login-checkout')}}" class="nav__bag-view-cart">View cart</a>
                                <a href="{{URL::to('/login-checkout')}}" class="nav__bag-check-out">Your Order</a>
                            <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="tabFavorite">
                <div class="header__menu-nav-favorite">
                    <div class="nav__bang-header">
                        <span class="nav__bang-header-cart">Your Favorite</span>
                        <label for="header__menu-bag" class="nav__bag-header-link">
                            <button class="iconCloseTabFovorite" style="border: none ; background-color: transparent">
                                <i class="fa-solid fa-angle-left"></i>
                            </button>
                        </label>
                    </div>
                    <div class="shopping__cart-container" >
                        <ul class="nav__bag-list" id="row_wishlist">
                        </ul>
                    </div>
                    <div class="shopping__cart-container">
                        <ul class="nav__bag-list">
                        </ul>
                    </div>
                </div>
            </div>
            <div id="header__navbar-scroll" class="header__navbar hide-on-mobile-tablet">
                <div class="header__navbar-left">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <label for="header__menu-input" class="header__navbar-item-link">
                                <i class="header__navbar-icon ti-menu"></i>
                            </label>
                        </li>

                        <li onmouseover="mouseOverMain()" onmouseout="mouseOutMain()" class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                New Arrival
                            </a>
                        </li>

                        <li onmouseover="mouseOverShop()" onmouseout="mouseOutShop()" class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                Products
                            </a>
                        </li>

                        <li onmouseover="mouseOverProduct()" onmouseout="mouseOutProduct()" class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                Outfits
                            </a>
                        </li>

                        <li onmouseover="mouseOverPages()" onmouseout="mouseOutPages()" class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                Contact
                            </a>
                        </li>

                        <li onmouseover="mouseOverJournal()" onmouseout="mouseOutJournal()" class="header__navbar-item">
                            <a href="" class="header__navbar-item-link header__navbar-item-link-underline">
                                About Us
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="header__navbar-center">
                    <img src="{{('public/frontend/img/logo-1.png')}}" class="header__navbar-brand-logo" alt="">
                </div>

                <div class="header__navbar-right">
                    <ul class="header__navbar-list">

                        <li class="header__navbar-item ">
                            <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id != NULL){
                            ?>
                            <a href="{{URL::to('/logout-checkout')}}" class="header__navbar-item-link header__navbar-item-link-underline">
                                Log Out
                            </a>
                            <?php 
                            }else{
                            ?>
                             <a href="{{URL::to('/login-checkout')}}" class="header__navbar-item-link header__navbar-item-link-underline">
                                Log In
                            </a>
                            <?php 
                            }
                            ?>
                        </li>

                        <li class="header__navbar-item">
                            <label for="header__menu-search" href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon ti-search"></i>
                            </label>
                        </li>

                        <li class="header__navbar-item">
                             <button class="buttonTabFovorite" style="border: none ; background-color: transparent"> 
                                    <i class="header__navbar-icon ti-heart"></i>
                            </button>
                        </li>

                        <li class="header__navbar-item">
                            <label for="header__menu-bag" href="#" class="header__navbar-item-link">
                               <i class="header__navbar-icon ti-bag"></i>
                            </label>
                            <span class="header__navbar-item-notice">
                                  @php
                                        $sessionCart = Session::get('cart', []);
                                        if (!is_array($sessionCart)) {
                                            $sessionCart = [];
                                        }
                                        $sessionCartNormalized = [];
                                        foreach ($sessionCart as $item) {
                                            if (is_array($item)) {
                                                $sessionCartNormalized[] = [
                                                    'id' => $item['product_id'],
                                                    'name' => $item['product_name'],
                                                    'image' => $item['product_image'],
                                                    'price' => $item['product_price'],
                                                    'qty' => $item['product_qty'],
                                                ];
                                            }
                                        }
                                        $finalCart = [];
                                        foreach ($sessionCartNormalized as $item) {
                                            if (isset($finalCart[$item['id']])) {
                                                $finalCart[$item['id']]['qty'] += $item['qty'];
                                            } else {
                                                $finalCart[$item['id']] = $item;
                                            }
                                        }
                                        $newarray = array_values($finalCart);
                                        $content = $newarray;
                                        $count = count($content);
                                  @endphp
                                    {{ $count }}
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- Sub nav -->

                <!-- Main Subnav -->
                <div onmouseover="mouseOverMain()" onmouseout="mouseOutMain()"
                    class="header__navbar-item-subnav header__navbar-main">
                    <div class="grid__row-header">
                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">New Collection</h3>
                                <ul class="subnav-category-list">
                                    @foreach ($brand as $key => $collection)
                                    <li class="subnav-category-item">
                                        <a href="{{URL::to('/list-brand-product/'.$collection->brand_id)}}" class="subnav-category-item-link">
                                            {{ $collection->brand_name}}
                                        </a>
                                    </li>                                    
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">OTHER THINGS</h3>
                                <img class="subnav-category-img" src="{{('public/frontend/img/contentHeader.jpg')}}" alt="">
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Vouchers
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Main Subnav -->

                <!-- Shop Subnav -->
                <div onmouseover="mouseOverShop()" onmouseout="mouseOutShop()"
                    class="header__navbar-item-subnav header__navbar-shop">
                    <div class="grid__row-header">
                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">CATALOG</h3>
                                <ul class="subnav-category-list">
                                    @foreach ($category as $key => $cate)
                                    <li class="subnav-category-item">
                                        <a href="{{URL::to('/list-category-product/'.$cate->category_id)}}" class="subnav-category-item-link">
                                            {{ $cate->category_name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">CATALOG OPTIONS</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Classic
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Formal
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link ">
                                            Street Style
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Vintage
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">Collection</h3>
                                <ul class="subnav-category-list">
                                    @foreach ($brand as $key => $brand)
                                    <li class="subnav-category-item">
                                        <a href="{{URL::to('/list-brand-product/'.$brand->brand_id)}}" class="subnav-category-item-link">
                                            {{ $brand->brand_name}}
                                        </a>
                                    </li>                                    
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">CHECKOUT</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Modern
                                        </a>
                                    </li>
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Multi Step
                                        </a>
                                    </li>
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Classic
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Shop Subnav -->

                <!-- Product Subnav -->
                <div onmouseover="mouseOverProduct()" onmouseout="mouseOutProduct()"
                    class="header__navbar-item-subnav header__navbar-product">
                    <div class="grid__row-header">
                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">PRODUCT TYPES</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Simple
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Variable
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link ">
                                            External
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Grouped
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">PRODUCT STYLE</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Showcase Style
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Background – Light
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link ">
                                            Background – Dark
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Full Width
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Header – Regular Width
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            No Padding
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">PRODUCT GALLERY</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Carousel
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Single Column
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Grid
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Image Zoom
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">PRODUCT DETAILS</h3>

                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Tabs
                                        </a>
                                    </li>
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Accordion
                                        </a>
                                    </li>
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Vertical
                                        </a>
                                    </li>
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Extended Description
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Product Subnav -->

                <!-- Pages Subnav -->
                <div onmouseover="mouseOverPages()" onmouseout="mouseOutPages()"
                    class="header__navbar-item-subnav header__navbar-pages">
                    <div class="grid__row-header">
                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">SAMPLE PAGES</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            About Us
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Store Locations
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link ">
                                            FAQ’s
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Careers
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">LOOKBOOK</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            List
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Grid
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link ">
                                            Masonry
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">LOOKBOOK SINGLE</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Parallax Header
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Featured Slider
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Regular Title
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Background Color
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Spring Blossom
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Natural Colors
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Pages Subnav -->

                <!-- Journal Subnav -->
                <div onmouseover="mouseOverJournal()" onmouseout="mouseOutJournal()"
                    class="header__navbar-item-subnav header__navbar-journal">
                    <div class="grid__row-header">
                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">LISTING</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Classic
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Overlay
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link ">
                                            Masonry
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Cards
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Grid
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            List
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Blog + Sidebar
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">SINGLE POST</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Display Featured
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Featured Parallax
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link ">
                                            Slider Gallery
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Featured Video
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Header – Regular Width
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            No Featured
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="grid__column-5">
                            <div class="header__subnav-home">
                                <h3 class="subnav-category">NAVIGATION</h3>
                                <ul class="subnav-category-list">
                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Simple
                                        </a>
                                    </li>

                                    <li class="subnav-category-item">
                                        <a href="" class="subnav-category-item-link">
                                            Image Background
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Journal Subnav -->
            </div>

            <!-- NavBar Tablet and Mobile -->
            <div class="header-mobile-tablet">
                <label for="menu__mobile--tablet-check" href="#" class="header-mobile-tablet__icon-link">
                    <i class="ti-menu"></i>
                </label>
                <a href="#" class="header-mobile-tablet__icon-link">
                    <img src="{{('public/frontend/img/logo-1.png')}}"
                        alt="" class="header-mobile-tablet__logo-img">
                </a>
                <label for="header__menu-bag" href="" class="header-mobile-tablet__icon-link">
                    <i class="ti-bag"></i>
                </label>
            </div>

            <div class="header__menu-overlay hide-on-mobile-tablet">
                <div class="grid wide">
                    <label for="header__menu-input" class="header__menu--close-link">
                        <i class="header__menu--close-icon ti-close"></i>
                    </label>
                    <div class="row">
                        <div class="grid__column-menu-left">
                            <ul class="header__menu--list">
                                <li class="header__menu--list-item">
                                    <div class="header__menu--list-block">
                                        <a href="" class="header__menu--list-item-link">
                                            New Arrival
                                        </a>
                                        <i class="header__menu--list-icon ti-angle-right"></i>
                                    </div>
                                </li>
                                <li class="header__menu--list-item">
                                    <div class="header__menu--list-block">
                                        <a href="" class="header__menu--list-item-link">
                                            Products
                                        </a>
                                        <i class="header__menu--list-icon ti-angle-right"></i>
                                    </div>
                                </li>
                                <li class="header__menu--list-item">
                                    <div class="header__menu--list-block">
                                        <a href="" class="header__menu--list-item-link">
                                            Outfits
                                        </a>
                                        <i class="header__menu--list-icon ti-angle-right"></i>
                                    </div>
                                </li>
                                <li class="header__menu--list-item">
                                    <div class="header__menu--list-block">
                                        <a href="" class="header__menu--list-item-link">
                                            Contact
                                        </a>
                                        <i class="header__menu--list-icon ti-angle-right"></i>
                                    </div>
                                </li>
                                <li class="header__menu--list-item">
                                    <div class="header__menu--list-block">
                                        <a href="" class="header__menu--list-item-link">
                                            About us
                                        </a>
                                        <i class="header__menu--list-icon ti-angle-right"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="grid__column-menu-right">
                            <h3 class="grid__column-menu-right-category">CATALOG</h3>
                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 1
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 2
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 3
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Style 4
                                    </a>
                                </li>
                            </ul>
                            <h3 class="grid__column-menu-right-category">FILTERS</h3>

                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Top
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Sidebar
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Slide Out
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="grid__column-menu-right">
                            <h3 class="grid__column-menu-right-category">CATALOG OPTIONS</h3>
                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Darker Background
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Width – Regular
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Animation – Zoom Only
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Load More – Scroll
                                    </a>
                                </li>
                            </ul>
                            <h3 class="grid__column-menu-right-category">SHOP PAGES</h3>

                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        My account – 1 Col
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Wishlist
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="grid__column-menu-right">
                            <h3 class="grid__column-menu-right-category">CART</h3>
                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Shopping Cart
                                    </a>
                                </li>
                            </ul>
                            <h3 class="grid__column-menu-right-category">MINICART</h3>

                            <ul class="grid__column-menu-right-list">
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Top
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Side
                                    </a>
                                </li>
                                <li class="grid__column-menu-right-item">
                                    <a href="" class="grid__column-menu-right-link">
                                        Dark
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app__container">
            @yield("content_account")
        </div>

        <div class="footer">
            <div class="footer__info">
                <div class="grid wide">
                    <div class="row">
                        <div class="col l-3 m-6 c-5 c-o-1">
                            <h6 class="footer__info-title">COMPANY</h6>
                            <ul class="footer__info--list">
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        About Us
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Contact
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Store Locations
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Careers
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col l-3 m-6 c-5">
                            <h6 class="footer__info-title">HELP</h6>
                            <ul class="footer__info--list">
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Order Tracking
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        FAQ’s
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Terms & Conditions
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col l-3 m-6 c-5 c-o-1">
                            <h6 class="footer__info-title">STORE</h6>
                            <ul class="footer__info--list">
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Women
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Men
                                    </a>
                                </li>
                                <li class="footer__info--list-item">
                                    <a href="" class="footer__info--list-item-link">
                                        Speakers
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col l-3 m-6 c-5">
                            <h6 class="footer__info-title">FOLLOW US</h6>
                            <p href="" class="footer__info--list-item-link">
                                And get Free Shipping on all your orders!
                            </p>
                            <ul class="footer__info--list-icon">
                                <li class="footer__info--list-icon-item">
                                    <a href="{{URL::to('/home')}}" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-facebook"></i>
                                    </a>
                                </li>
                                <li class="footer__info--list-icon-item">
                                    <a href="" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li class="footer__info--list-icon-item">
                                    <a href="" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-instagram"></i>
                                    </a>
                                </li>
                                <li class="footer__info--list-icon-item">
                                    <a href="" class="footer__info-link-icon">
                                        <i class="footer__info-icon ti-pinterest-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <h4 class="app__container-title pd-top-60">
                        Sign up now & get 10% off
                    </h4>
                    <p class="app__container-introduce">
                        Be the first to know about our new arrivals and exclusive offers.
                    </p>
                    <div class="footer__info-form-sign-up">
                        <input type="text" class="footer__info-form-email-input" placeholder="Your email address">
                        <a href="" class="footer__info-form-sumbit">Sign up</a>
                    </div>
                </div>
            </div>

            <div class="footer__policy">
                <div class="grid wide">
                    <div class="row footer__policy-content">
                        <div class="footer__policy-left">
                            <a href="" class="footer__policy-left-link">Privacy Policy</a>
                            <a href="" class="footer__policy-left-link">Terms & Conditions</a>
                        </div>

                        <div class="footer__policy-right">
                            <p class="footer__policy-right-copyright">
                                ©2024 Levents® - Viet Tin
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="backtop">
        <i class="backtop__icon ti-arrow-up"></i>
    </div>
    @if(Session::get('message'))
    <div class="cardNotification" id="notification2">
        <div class="icon-container">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            stroke-width="0"
            fill="currentColor"
            stroke="currentColor"
            class="icon"
            >
            <path
                d="M13 7.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-3 3.75a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 .75.75v4.25h.75a.75.75 0 0 1 0 1.5h-3a.75.75 0 0 1 0-1.5h.75V12h-.75a.75.75 0 0 1-.75-.75Z"
            ></path>
            <path
                d="M12 1c6.075 0 11 4.925 11 11s-4.925 11-11 11S1 18.075 1 12 5.925 1 12 1ZM2.5 12a9.5 9.5 0 0 0 9.5 9.5 9.5 9.5 0 0 0 9.5-9.5A9.5 9.5 0 0 0 12 2.5 9.5 9.5 0 0 0 2.5 12Z"
            ></path>
            </svg>
        </div>
        <div class="message-text-container">
            <p class="message-text">Info message</p>
            <p class="sub-text">
              {{Session::get('message')}}
              {{Session::put('message', null)}}
            </p>
        </div>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 15 15"
            stroke-width="0"
            fill="none"
            stroke="currentColor"
            class="cross-icon"
            >
            <path
            fill="currentColor"
            d="M11.7816 4.03157C12.0062 3.80702 12.0062 3.44295 11.7816 3.2184C11.5571 2.99385 11.193 2.99385 10.9685 3.2184L7.50005 6.68682L4.03164 3.2184C3.80708 2.99385 3.44301 2.99385 3.21846 3.2184C2.99391 3.44295 2.99391 3.80702 3.21846 4.03157L6.68688 7.49999L3.21846 10.9684C2.99391 11.193 2.99391 11.557 3.21846 11.7816C3.44301 12.0061 3.80708 12.0061 4.03164 11.7816L7.50005 8.31316L10.9685 11.7816C11.193 12.0061 11.5571 12.0061 11.7816 11.7816C12.0062 11.557 12.0062 11.193 11.7816 10.9684L8.31322 7.49999L11.7816 4.03157Z"
            clip-rule="evenodd"
            fill-rule="evenodd"
            ></path>
        </svg>
    </div>
    @endif
    <script src="{{asset('public/frontend/js/glider.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/products.js')}}"></script>
    <script src="{{asset('public/frontend/js/index.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('public/frontend/js/ajax.js')}}"></script>
        <script>
        let openTabFovorite = document.querySelector(".buttonTabFovorite");
        let closeTabFovorite = document.querySelector(".iconCloseTabFovorite");
        let body2 = document.querySelector("body");
        openTabFovorite.addEventListener("click", () => {
            body2.classList.add("activeTabFovorite");
        });
        closeTabFovorite.addEventListener("click", () => {
            body2.classList.remove("activeTabFovorite");
        });

    </script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToScroll: 1,
            slidesToShow: 4,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            },
            // reponsive
            responsive: [{
                    // screens greater than >= 1200px
                    breakpoint: 1200,
                    settings: {
                        // Set to `auto` and provide item width to adjust to viewport
                        slidesToShow: 4,
                        slidesToScroll: 2,
                    }
                }, {
                    // screens greater than >= 900px
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    // screens greater than >= 640px
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    // screens greater than >= 304px
                    breakpoint: 304,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                    }
                },
                {
                    // screens greater than >= 304px
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }

            ]
        });   
    </script>
    <script>
      // Lấy tất cả các elements cần thiết
      const popupOverlay = document.getElementById("popupOverlay");
      const registerPopup = document.getElementById("registerPopup");
      const forgotPopup = document.getElementById("forgotPopup");
      const popupLinks = document.querySelectorAll(".popup-link");
      const btnback = document.getElementById("btn-back");

      // Thêm event listener cho tất cả các link popup
      popupLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
          e.preventDefault();
          const popupType = link.getAttribute("data-popup");
          showPopup(popupType);
        });
      });

      // Hàm hiển thị popup
      function showPopup(type) {
        popupOverlay.style.display = "flex";
        if (type === "register") {
          registerPopup.style.display = "block";
          forgotPopup.style.display = "none";
        } else if (type === "forgot") {
          forgotPopup.style.display = "block";
          registerPopup.style.display = "none";
        }
        else if (type == "back"){
            forgotPopup.style.display = "none";
            registerPopup.style.display = "block";
        }
      }

      // Hàm đóng popup
      function closePopup() {
        popupOverlay.style.display = "none";
        registerPopup.style.display = "none";
        forgotPopup.style.display = "none";
      }

      // Đóng popup khi click outside
      popupOverlay.addEventListener("click", (e) => {
        if (e.target === popupOverlay) {
          closePopup();
        }
      });
    </script>
    <script>
        $(document).ready(function() {
          $(".choose").on("change", function () {
                var action = $(this).attr("id");
                var ma_id = $(this).val();
                var _token = $("input[name='_token']").val();
                var result = "";

                console.log("Action ID:", action);
                console.log("Selected Value (ma_id):", ma_id);
                console.log("Token (_token):", _token);

                if (action == "city") {
                    result = "district";
                } else {
                    result = "ward";
                }
                console.log("Result ID to update:", result);
                $.ajax({
                    url: '{{url('/select-delivery-home')}}',
                    method: "POST",
                    data: { action: action, ma_id: ma_id, _token: _token },
                    success: function (data) {
                        console.log("AJAX Success Response:", data);
                        $("#" + result).html(data);
                    },
                    error: function (xhr) {
                        console.error("AJAX Error Response:", xhr.responseText);
                        alert("Something went wrong. Please try again.");
                    },
                });
            });
        });
        $(document).ready(function() {
               $('.caculate_delivery').click(function(){
                    var matp = $('.city').val();
                    var maqh = $('.province').val();
                    var xaid = $('.ward').val();
                    var _token = $("input[name='_token']").val();
                    if (matp == '' && maqh == '' && xaid == '') {
                        alert('You must select the delivery address');
                    }
                    else {
                        $.ajax({
                            url: '{{url('/caculate-fee')}}',
                            method: "POST",
                            data: { matp : matp , maqh : maqh , xaid : xaid , _token: _token },
                            success: function (data) {
                                console.log("AJAX Success Response:");
                                location.reload();
                            },
                            error: function (xhr) {
                                console.error("AJAX Error Response:", xhr.responseText);
                                alert("Something went wrong. Please try again.");
                            },
                        });
                    }
               });
        });
    </script>
    <script>
    // Function to handle display of payment boxes
    function showPaymentBox() {
      // Hide all payment boxes
      document.querySelectorAll(".payment_box").forEach((box) => {
        box.style.display = "none";
      });

      // Show the selected payment box
      const selectedMethod = document.querySelector(
        'input[name="payment_method"]:checked'
      ).value;
      const selectedBox = document.querySelector(
        `.payment_box.payment_method_${selectedMethod}`
      );
      if (selectedBox) {
        selectedBox.style.display = "block";
      }
    }

    // Set initial display of payment boxes
    document.addEventListener("DOMContentLoaded", showPaymentBox);

    // Add event listeners to radio buttons
    document
      .querySelectorAll('input[name="payment_method"]')
      .forEach((radio) => {
        radio.addEventListener("change", showPaymentBox);
      });
   </script>
   <script>
    setTimeout(function() {
        var notification = document.getElementById('notification2');
        if (notification) {
            notification.style.opacity = '0';
            setTimeout(function() {
                notification.style.display = 'none';
            }, 500); 
        }
    }, 3000);
</script>
<script>
    load_more_product();
    function load_more_product(id = "") {
        $.ajax({
            url: "{{url('/load-more-product')}}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id:id},
            success: function (data) {
                $('#all_product').append(data.product_output);
                  $('#load_more_container').html(data.load_more_button);
            }
        });
    }
    $(document).on('click' , '#load_more_button' , function(){
        var id = $(this).data('id');
        load_more_product(id);
    });
</script>
<div class="overlay"></div>
</body>
</html>