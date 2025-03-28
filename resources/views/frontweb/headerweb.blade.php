<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ekomart-Grocery-Store(e-Commerce) HTML Template: A sleek, responsive, and user-friendly HTML template designed for online grocery stores.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Grocery, Store, stores">
    <title>Ekomart-Grocery-Store(e-Commerce) HTML Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::TO('/front/') }}/assets/images/fav.png">
    <!-- plugins css -->
    <link rel="stylesheet preload" href="{{ URL::TO('/front/') }}/assets/css/plugins.css" as="style">
    <link rel="stylesheet preload" href="{{ URL::TO('/front/') }}/assets/css/style.css" as="style">

</head>

<body class="shop-main-h">

@php
$menu = get_menus();
$city = get_city();
@endphp  


 <!-- rts header area start -->
    <!-- rts header area start -->
    <div class="rts-header-one-area-one">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bwtween-area-header-top">
                            <div class="discount-area">
                                <!-- <p class="disc">FREE delivery & 40% Discount for next 3 orders! Place your 1st order in.</p> -->
                                <div class="countdown">
                                    <!-- <div class="countDown">10/05/2025 10:20:00</div> -->
                                </div>
                            </div>
                            <div class="contact-number-area">
                                <!-- <p>Need help? Call Us:
                                    <a href="tel:+4733378901">+258 3268 21485</a>
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid-one-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-mid-wrapper-between">
                            <div class="nav-sm-left">
                                <ul class="nav-h_top">
                                    <!-- <li><a href="about.html">About Us</a></li> -->
                                    <!-- <form action="
                                     " method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form> -->
                                    <li><a href="{{ route('weblogout')}}">Log Out</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                                <!-- <p class="para">We deliver to your everyday from 7:00 to 22:00</p> -->
                            </div>
                            <div class="nav-sm-left">
                             
                                <ul class="nav-h_top language">
                                    <li class="category-hover-header language-hover">
                                        <a href="#">Location</a>
                                        
                                        <ul class="category-sub-menu">
                                        @foreach($city as $key =>$value)
                                            <li>
                                                <a href="#" class="menu-item">
                                                    <span>{{ $value->city }}</span>
                                                </a>
                                                
                                            </li>
                                        @endforeach   
                                        </ul>
                                      
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-header-area-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-search-category-wrapper">
                            <a href="index.html" class="logo-area">
                                <img src="{{ asset('uploads\logo\logo2.png') }}" alt="logo-main" class="logo">
                                
                            </a>
                            <div class="category-search-wrapper">
                                <div class="category-btn category-hover-header">
                                    <img class="parent" src="{{ URL::TO('/front/') }}/assets/images/icons/bar-1.svg" alt="icons">
                                    <span>Categories</span>
                                    <ul class="category-sub-menu" id="category-active-four">
                                        @foreach($menu as $key =>$value)
                                        <li>
                                            <a href="#" class="menu-item">
                                            <img src="{{ asset('uploads/category/' . $value->image_path) }}"  style="width: 55px">
                                                <span>{{$value['category_name']}}</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                            <ul class="submenu mm-collapse">
                                                @foreach($value['subcategory'] as $skey => $svalue)
                                                <li><a class="mobile-menu-link" href="#">{{ $svalue->subcategory_name}}</a></li>
                                                @endforeach
                      
                                            </ul>
                                        </li>
                                        @endforeach
                                    
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/10.svg" alt="icons">
                                                <span>Other Items</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="" method="GET" class="search-header">
                                    <input type="text" placeholder="Search for products, categories or brands" required>
                                    <a href="{{ route('search') }}" class="rts-btn btn-primary radious-sm with-icon">
                                        <div class="btn-text">
                                            Search
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </div>
                                    </a>
                                </form>
                            </div>
                            <div class="actions-area">
                                <div class="search-btn" id="searchs">

                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z" fill="#1F1F25"></path>
                                    </svg>

                                </div>
                                <div class="menu-btn" id="menu-btn">

                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect width="20" height="2" fill="#1F1F25"></rect>
                                    </svg>

                                </div>
                            </div>
                            <div class="accont-wishlist-cart-area-header">
                                <a href="{{ route('loginsubmit') }}" class="btn-border-only account">
                        
                                    <i class="fa-light fa-user"></i>
                                    <span>Login</span>
                                </a>
                                <a href="wishlist.html" class="btn-border-only wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                    <span class="text">Wishlist</span>
                                    <!-- <span class="number">2</span> -->
                                </a>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rts-header-nav-area-one header--sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nav-and-btn-wrapper">
                            <div class="nav-area">
                                <nav>
                                    <ul class="parent-nav">
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                                            <!-- <ul class="submenu">
                                                <li><a class="sub-b" href="index.html">Home One</a></li>
                                                <li><a class="sub-b" href="index-two.html">Home Two</a></li>
                                                <li><a class="sub-b" href="index-three.html">Home Three</a></li>
                                                <li><a class="sub-b" href="index-four.html">Home Four</a></li>
                                                <li><a class="sub-b" href="index-five.html">Home Five</a></li>
                                            </ul> -->
                                        </li>
                                         <!-- <li class="parent"><a href="about.html">About</a></li> -->
                                         <li class="parent"><a href="">Shop</a></li>

                                        <!-- <li class="parent with-megamenu">
                                            <a href="#">Shop</a>
                                            <div class="rts-megamenu">
                                                <div class="wrapper">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-8">
                                                            <div class="megamenu-item-wrapper">  -->
                                                                <!-- single item areas start -->
                                                                <!-- <div class="single-megamenu-wrapper">
                                                                    <p class="title">Shop Layout</p>
                                                                    <ul>
                                                                        <li><a href="shop-grid-sidebar.html">Shop Grid Sidebar</a></li>
                                                                        <li><a href="shop-list-sidebar.html">Shop list Sidebar</a></li>
                                                                        <li><a href="shop-grid-top-filter.html">Shop Top Filter Grid</a></li>
                                                                        <li><a href="shop-list-top-filter.html">Shop Top Filter List</a></li>
                                                                    </ul>
                                                                </div> -->
                                                                <!-- single item areas end -->
                                                                <!-- single item areas start -->
                                                                <!-- <div class="single-megamenu-wrapper">
                                                                    <p class="title">Shop Details</p>
                                                                    <ul>
                                                                        <li><a class="sub-b" href="shop-details.html">Shop Details</a></li>
                                                                        <li><a class="sub-b" href="shop-details-2.html">Shop Details V2</a></li>
                                                                        <li><a class="sub-b" href="shop-details-right-sidebar.html">Shop Details V3</a></li>
                                                                        <li><a class="sub-b" href="shop-details-4.html">Shop Details V4</a></li>
                                                                    </ul>
                                                                </div> -->
                                                                <!-- single item areas end -->
                                                                <!-- single item areas start -->
                                                                <!-- <div class="single-megamenu-wrapper">
                                                                    <p class="title">Product Feature</p>
                                                                    <ul>
                                                                        <li><a class="sub-b" href="shop-details-variable.html">Variable product</a></li>
                                                                        <li><a class="sub-b" href="shop-details-affiliats.html">Affiliate product</a></li>
                                                                        <li><a class="sub-b" href="shop-details-group.html">Shop Details Group</a></li>
                                                                        <li><a class="sub-b" href="shop-compare.html">Shop Compare</a></li>
                                                                    </ul>
                                                                </div> -->
                                                                <!-- single item areas end -->
                                                                <!-- single item areas start -->
                                                                <!-- <div class="single-megamenu-wrapper">
                                                                    <p class="title">Shop Others</p>
                                                                    <ul>
                                                                        <li><a class="sub-b" href="cart.html">Cart</a></li>
                                                                        <li><a class="sub-b" href="checkout.html">Checkout</a></li>
                                                                        <li><a class="sub-b" href="trackorder.html">Track Order</a></li>
                                                                    </ul>
                                                                </div> -->
                                                                <!-- single item areas end -->
                                                            <!-- </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <a href="shop-grid-sidebar.html" class="feature-add-megamenu-area">
                                                                <img src="{{ URL::TO('/front/') }}/assets/images/feature/05.jpg" alt="feature_product">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> -->
                                        <!-- <li class="parent has-dropdown">
                                            <a class="nav-link" href="#">Vendors</a>
                                            <ul class="submenu">
                                                <li><a class="sub-b" href="vendor-list.html">Vendor List</a></li>
                                                <li><a class="sub-b" href="vendor-grid.html">Vendor Grid</a></li>
                                                <li><a class="sub-b" href="vendor-details.html">Vendor Details</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li class="parent has-dropdown">
                                            <a class="nav-link" href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a class="sub-b" href="about.html">About</a></li>
                                                <li><a class="sub-b" href="store.html">Store</a></li>
                                                <li><a class="sub-b" href="faq.html">Faq's</a></li>
                                                <li><a class="sub-b" href="invoice.html">Invoice</a></li>
                                                <li><a class="sub-b" href="contact.html">Contact</a></li>
                                                <li><a class="sub-b" href="register.html">Register</a></li>
                                                <li><a class="sub-b" href="login.html">Login</a></li>
                                                <li><a class="sub-b" href="privacy-policy.html">Privacy Policy</a></li>
                                                <li><a class="sub-b" href="cookies-policy.html">Cookies Policy</a></li>
                                                <li><a class="sub-b" href="terms-condition.html">Terms & Condition</a></li>
                                                <li><a class="sub-b" href="404.html">Error</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li class="parent has-dropdown">
                                            <a class="nav-link" href="#">Blog</a>
                                            <ul class="submenu">
                                                <li><a class="sub-b" href="blog.html">Blog</a></li>
                                                <li><a class="sub-b" href="blog-list-left-sidebar.html">Blog List Right Sidebar</a></li>
                                                <li><a class="sub-b" href="blog-list-right-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a class="sub-b" href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="parent"><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- button-area -->
                            <div class="right-btn-area">
                                <a href="#" class="btn-narrow">Trending Products</a>
                                <button class="rts-btn btn-primary">
                                    Get 30% Discount Now
                                    <span>Sale</span>
                                </button>
                            </div>
                            <!-- button-area end -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="logo-search-category-wrapper after-md-device-header">
                            <a href="index.html" class="logo-area">
                                <img src="{{ URL::TO('/front/') }}/assets/images/logo/logo-01.svg" alt="logo-main" class="logo">
                            </a>
                            <div class="category-search-wrapper">
                                <div class="category-btn category-hover-header">
                                    <img class="parent" src="{{ URL::TO('/front/') }}/assets/images/icons/bar-1.svg" alt="icons">
                                    <span>Categories</span>
                                    <ul class="category-sub-menu">
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/01.svg" alt="icons">
                                                <span>Breakfast & Dairy</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/02.svg" alt="icons">
                                                <span>Meats & Seafood</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/03.svg" alt="icons">
                                                <span>Breads & Bakery</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/04.svg" alt="icons">
                                                <span>Chips & Snacks</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/05.svg" alt="icons">
                                                <span>Medical Healthcare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/06.svg" alt="icons">
                                                <span>Breads & Bakery</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/07.svg" alt="icons">
                                                <span>Biscuits & Snacks</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/08.svg" alt="icons">
                                                <span>Frozen Foods</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/09.svg" alt="icons">
                                                <span>Grocery & Staples</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ URL::TO('/front/') }}/assets/images/icons/10.svg" alt="icons">
                                                <span>Other Items</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#" class="search-header">
                                    <input type="text" placeholder="Search for products, categories or brands" required>
                                    <button class="rts-btn btn-primary radious-sm with-icon">
                                        <span class="btn-text">
                                        Search
                                    </span>
                                        <span class="arrow-icon">
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </span>
                                        <span class="arrow-icon">
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </span>
                                    </button>
                                </form>
                            </div>
                            <div class="main-wrapper-action-2 d-flex">
                                <div class="accont-wishlist-cart-area-header">
                                    <a href="account.html" class="btn-border-only account">
                                        <i class="fa-light fa-user"></i>
                                        Account
                                    </a>
                                    <a href="wishlist.html" class="btn-border-only wishlist">
                                        <i class="fa-regular fa-heart"></i>
                                        Wishlist
                                    </a>
                                    <div class="btn-border-only cart category-hover-header">
                                        <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                        <span class="text">My Cart</span>
                                        <div class="category-sub-menu card-number-show">
                                            <h5 class="shopping-cart-number">Shopping Cart (03)</h5>
                                            <div class="cart-item-1 border-top">
                                                <div class="img-name">
                                                    <div class="thumbanil">
                                                        <img src="assets/images/shop/cart-1.png" alt="">
                                                    </div>
                                                    <div class="details">
                                                        <a href="shop-details.html">
                                                            <h5 class="title">Foster Farms Breast Nuggets Shaped Chicken</h5>
                                                        </a>
                                                        <div class="number">
                                                            1 <i class="fa-regular fa-x"></i>
                                                            <span>$36.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="close-c1">
                                                    <i class="fa-regular fa-x"></i>
                                                </div>
                                            </div>
                                            <div class="cart-item-1">
                                                <div class="img-name">
                                                    <div class="thumbanil">
                                                        <img src="{{ URL::TO('/front/') }}/assets/images/shop/05.png" alt="">
                                                    </div>
                                                    <div class="details">
                                                        <a href="shop-details.html">
                                                            <h5 class="title">Foster Farms Breast Nuggets Shaped Chicken</h5>
                                                        </a>
                                                        <div class="number">
                                                            1 <i class="fa-regular fa-x"></i>
                                                            <span>$36.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="close-c1">
                                                    <i class="fa-regular fa-x"></i>
                                                </div>
                                            </div>
                                            <div class="cart-item-1">
                                                <div class="img-name">
                                                    <div class="thumbanil">
                                                        <img src="{{ URL::TO('/front/') }}/assets/images/shop/04.png" alt="">
                                                    </div>
                                                    <div class="details">
                                                        <a href="shop-details.html">
                                                            <h5 class="title">Foster Farms Breast Nuggets Shaped Chicken</h5>
                                                        </a>
                                                        <div class="number">
                                                            1 <i class="fa-regular fa-x"></i>
                                                            <span>$36.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="close-c1">
                                                    <i class="fa-regular fa-x"></i>
                                                </div>
                                            </div>
                                            <div class="sub-total-cart-balance">
                                                <div class="bottom-content-deals mt--10">
                                                    <div class="top">
                                                        <span>Sub Total:</span>
                                                        <span class="number-c">$108.00</span>
                                                    </div>
                                                    <div class="single-progress-area-incard">
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <p>Spend More <span>$125.00</span> to reach <span>Free Shipping</span></p>
                                                </div>
                                                <div class="button-wrapper d-flex align-items-center justify-content-between">
                                                    <a href="cart.html" class="rts-btn btn-primary ">View Cart</a>
                                                    <a href="checkout.html" class="rts-btn btn-primary border-only">CheckOut</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="cart.html" class="over_link"></a>
                                    </div>
                                </div>
                                <div class="actions-area">
                                    <div class="search-btn" id="search">

                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z" fill="#1F1F25"></path>
                                        </svg>

                                    </div>
                                    <div class="menu-btn">

                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect width="20" height="2" fill="#1F1F25"></rect>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts header area end -->

    <!-- rts header area start -->
    <!-- header style two -->
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>


        <form action="#" class="search-input-area-menu mt--30">
            <input type="text" placeholder="Search..." required>
            <button><i class="fa-light fa-magnifying-glass"></i></button>
        </form>

        <div class="mobile-menu-nav-area tab-nav-btn mt--20">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Menu</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Category</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <!-- mobile menu area start -->
                    <div class="mobile-menu-main">
                        <nav class="nav-main mainmenu-nav mt--30">
                            <ul class="mainmenu metismenu" id="mobile-menu-active">
                                <li class="has-droupdown">
                                    <a href="{{ route('home') }}" class="main">Home</a>
                                    <!-- <ul class="submenu mm-collapse">
                                        <li><a class="mobile-menu-link" href="index.html">Home One</a></li>
                                        <li><a class="mobile-menu-link" href="index-two.html">Home Two</a></li>
                                        <li><a class="mobile-menu-link" href="index-three.html">Home Three</a></li>
                                        <li><a class="mobile-menu-link" href="index-four.html">Home Four</a></li>
                                        <li><a class="mobile-menu-link" href="index-five.html"> Home Five</a></li>
                                    </ul> -->
                                </li>
                                <li>
                                    <a href="about.html" class="main">About</a>
                                </li>
                                <li class="has-droupdown">
                                    <a href="#" class="main">Pages</a>
                                    <ul class="submenu mm-collapse">
                                        <li><a class="mobile-menu-link" href="about.html">About</a></li>
                                        <li><a class="mobile-menu-link" href="faq.html">Faq's</a></li>
                                        <li><a class="mobile-menu-link" href="invoice.html">Invoice</a></li>
                                        <li><a class="mobile-menu-link" href="contact.html">Contact</a></li>
                                        <li><a class="mobile-menu-link" href="register.html">Register</a></li>
                                        <li><a class="mobile-menu-link" href="login.html">Login</a></li>
                                        <li><a class="mobile-menu-link" href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a class="mobile-menu-link" href="cookies-policy.html">Cookies Policy</a></li>
                                        <li><a class="mobile-menu-link" href="terms-condition.html">Terms Condition</a></li>
                                        <li><a class="mobile-menu-link" href="404.html">Error Page</a></li>
                                    </ul>
                                </li>
                                <li class="has-droupdown">
                                    <a href="#" class="main">Shop</a>
                                    <ul class="submenu mm-collapse">
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Shop Layout</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="shop-grid-sidebar.html"></a>Shop Grid Sidebar</li>
                                                <li><a href="shop-list-sidebar.html"></a>Shop List Sidebar</li>
                                                <li><a href="shop-grid-top-filter.html"></a>Shop Grid Top Filter</li>
                                                <li><a href="shop-list-top-filter.html"></a>Shop List Top Filter</li>
                                            </ul>
                                        </li>
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Shop Details</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="shop-details.html"></a>Shop Details</li>
                                                <li><a href="shop-details-2.html"></a>Shop Details 2</li>
                                                <li><a href="shop-grid-top-filter.html"></a>Shop Grid Top Filter</li>
                                                <li><a href="shop-list-top-filter.html"></a>Shop List Top Filter</li>
                                            </ul>
                                        </li>
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Product Feature</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="shop-details-variable.html"></a>Shop Details Variable</li>
                                                <li><a href="shop-details-affiliats.html"></a>Shop Details Affiliats</li>
                                                <li><a href="shop-details-group.html"></a>Shop Details Group</li>
                                                <li><a href="shop-compare.html"></a>Shop Compare</li>
                                            </ul>
                                        </li>
                                        <li class="has-droupdown third-lvl">
                                            <a class="main" href="#">Shop Others</a>
                                            <ul class="submenu-third-lvl mm-collapse">
                                                <li><a href="cart.html"></a>Cart</li>
                                                <li><a href="checkout.html"></a>Checkout</li>
                                                <li><a href="trackorder.html"></a>Trackorder</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-droupdown">
                                    <a href="#" class="main">Blog</a>
                                    <ul class="submenu mm-collapse">
                                        <li><a class="mobile-menu-link" href="blog.html">Blog</a></li>
                                        <li><a class="mobile-menu-link" href="blog-list-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a class="mobile-menu-link" href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html" class="main">Contact Us</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <!-- mobile menu area end -->
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="category-btn category-hover-header menu-category">
                        <ul class="category-sub-menu" id="category-active-menu">
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/01.svg" alt="icons">
                                    <span>Breakfast &amp; Dairy</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/02.svg" alt="icons">
                                    <span>Meats &amp; Seafood</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/03.svg" alt="icons">
                                    <span>Breads &amp; Bakery</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/04.svg" alt="icons">
                                    <span>Chips &amp; Snacks</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/05.svg" alt="icons">
                                    <span>Medical Healthcare</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/06.svg" alt="icons">
                                    <span>Breads &amp; Bakery</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/07.svg" alt="icons">
                                    <span>Biscuits &amp; Snacks</span>
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                    <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                    <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/08.svg" alt="icons">
                                    <span>Frozen Foods</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/09.svg" alt="icons">
                                    <span>Grocery &amp; Staples</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-item">
                                    <img src="assets/images/icons/10.svg" alt="icons">
                                    <span>Other Items</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- button area wrapper start -->
        <div class="button-area-main-wrapper-menuy-sidebar mt--50">
            <div class="contact-area">
                <div class="phone">
                    <i class="fa-light fa-headset"></i>
                    <a href="#">02345697871</a>
                </div>
                <div class="phone">
                    <i class="fa-light fa-envelope"></i>
                    <a href="#">02345697871</a>
                </div>
            </div>
            <div class="buton-area-bottom">
                <a href="login.html" class="rts-btn btn-primary">Sign In</a>
                <a href="register.html" class="rts-btn btn-primary">Sign Up</a>
            </div>
        </div>
        <!-- button area wrapper end -->

    </div>
    <!-- header style two End -->
    <!-- rts header area end -->
    <!-- rts header area end -->