<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- script
    ================================================== -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
</head>
<body>
    <header id="header">
        <div id="header-wrap">
          <nav class="secondary-nav border-bottom">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-4 header-contact">
                  <p>Let's talk! <strong>+57 444 11 00 35</strong>
                  </p>
                </div>
                <div class="col-md-4 shipping-purchase text-center">
                  <p>Free shipping on a purchase value of $200</p>
                </div>
                <div class="col-md-4 col-sm-12 user-items">
                  <ul class="d-flex justify-content-end list-unstyled">
                    <li>
                      <a href="login.html">
                        <i class="icon icon-user"></i>
                      </a>
                    </li>
                    <li>
                      <a href="cart.html">
                        <i class="icon icon-shopping-cart"></i>
                      </a>
                    </li>
                    <li>
                      <a href="wishlist.html">
                        <i class="icon icon-heart"></i>
                      </a>
                    </li>
                    <li class="user-items search-item pe-3">
                      <a href="#" class="search-button">
                        <i class="icon icon-search"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          <nav class="primary-nav padding-small">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-lg-2 col-md-2">
                  <div class="main-logo">
                    <a href="index.html">
                      <img src="{{ asset('images/main-logo.png' ) }}" alt="logo">
                    </a>
                  </div>
                </div>
                <div class="col-lg-10 col-md-10">
                  <div class="navbar">
  
                    <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                      <ul class="menu-list">
  
                        <li class="menu-item has-sub"><a href="index.html" class="item-anchor active d-flex align-item-center" data-effect="Home">Home</a></li>
  
                        <li><a href="about.html" class="item-anchor" data-effect="About">About</a></li> 
                        
                        <li class="menu-item has-sub"><a href="blog.html" class="item-anchor d-flex align-item-center" data-effect="Blog">Blog</a></li>
  
                        <li><a href="contact.html" class="item-anchor" data-effect="Contact">Contact</a></li>
  
                      </ul>
                    </div>
  
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <div>
        @yield('content')
      </div>
    
</body>
</html>