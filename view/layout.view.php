<?php 
!isset($_SESSION) ? session_start(): '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic page needs -->
  <meta charset="utf-8">
  <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$title?></title>
  <base href="http://localhost:8888/shop_balo/">
  <meta name="description" content="best template, template free, responsive theme, fashion store, responsive theme, responsive html theme, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template">
  <meta name="keywords" content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive theme, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template"
  />

  <!-- Mobile specific metas  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon  -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet' type='text/css'>

  <!-- CSS Style -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/bootstrap.min.css">

  <!-- font-awesome & simple line icons CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="public/source/css/simple-line-icons.css" media="all">

  <!-- owl.carousel CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="public/source/css/owl.theme.css">

  <!-- animate CSS  -->
  <link rel="stylesheet" type="text/css" href="public/source/css/animate.css" media="all">

  <!-- flexslider CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/flexslider.css">

  <!-- jquery-ui.min CSS  -->
  <link rel="stylesheet" type="text/css" href="public/source/css/jquery-ui.css">

  <!-- Revolution Slider CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/revolution-slider.css">

  <!-- style CSS -->
  <link rel="stylesheet" type="text/css" href="public/source/css/style.css" media="all">


</head>

<body class="shop_grid_page">
  <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- mobile menu -->
  <div id="mobile-menu">
    <ul>
      <li>
        <a href="index.html" class="home1">Home</a>
      </li>
      <li>
        <a href="contact_us.html">Contact us</a>
      </li>
      <li>
        <a href="about_us.html">About us</a>
      </li>
      <li>
        <a href="blog_full_width.html">Blog</a>
      </li>
    </ul>
  </div>
  <!-- end mobile menu -->
  <div id="page">
    <!-- Header -->
    <header>
      <div class="header-container">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-sm-4 hidden-xs">
                <!-- Default Welcome Message -->
                <div class="welcome-msg ">Welcome to MyStore! </div>
                <span class="phone hidden-sm">Call Us: +123.456.789</span>
              </div>

              <!-- top links -->
              <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                <div class="links">
                <?php if(isset($_SESSION['name'])){?>
                  <div class="myaccount">
                    <a title="My Account" href="account_page.html">
                      <i class="fa fa-user"></i>
                      <span class="hidden-xs"><?php echo $_SESSION['name'];?></span>
                    </a>
                  </div>
                  <div class="logout">
                    <a href="logout.php">
                      <i class="fa fa-unlock-alt"></i>
                      <span class="hidden-xs">Log Out</span>
                    </a>
                  </div>
                <?php }else{?>
                  <div class="login">
                    <a href="login.html">
                      <i class="fa fa-unlock-alt"></i>
                      <span class="hidden-xs">Log In</span>
                    </a>
                  </div>
                <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12">
              <!-- Header Logo -->
              <div class="logo">
                <a title="e-commerce" href="index.html">
                  <img alt="responsive theme logo" src="public/source/images/logo.png">
                </a>
              </div>
              <!-- End Header Logo -->
            </div>
            <div class="col-xs-9 col-sm-6 col-md-6">
              <!-- Search -->

              <div class="top-search">
                <div id="search">
                  <form action="search.html">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="keyword">
                      <button class="btn-search" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- End Search -->
            </div>
            <!-- top cart -->

            <div class="col-lg-3 col-xs-3 top-cart">
              <div class="top-cart-contain">
                <div class="mini-cart">
                  <div class="basket dropdown-toggle">
                    <a href="shopping-cart.php">
                      <div class="cart-icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                      <div class="shoppingcart-inner hidden-xs" id="shoppingcart-inner">
                        <span class="cart-title">Giỏ hàng của bạn</span>
                        
                        <span class="cart-total">
                          <?php 
                          if(isset($_SESSION['cart'])){
                            echo $_SESSION['cart']->totalQty;
                            echo " item(s) - ";
                            echo number_format($_SESSION['cart']->promtPrice);
                            echo " vnđ";
                          }
                          else{
                            echo 0;
                          }
                          ?>
                        </span>
                      </div>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->
    
    <!-- Navbar -->
    <nav>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-4">
            <div class="mm-toggle-wrap">
              <div class="mm-toggle">
                <i class="fa fa-align-justify"></i>
              </div>
              <span class="mm-label">Categories</span>
            </div>
            <div class="mega-container visible-lg visible-md visible-sm">
              <div class="navleft-container">
                <div class="mega-menu-title">
                  <h3>Categories</h3>
                </div>
                <div class="mega-menu-category">
                  <ul class="nav">
                    <?php foreach($menu as $m):?>
                   
                    <li class="nosub">
                      <a href="type.php?type=<?=$m->id?>">
                        <i class="icon fa <?=$m->icon?> fa-fw"></i> <?=$m->name?></a>
                    </li>
                   
                    <?php endforeach?>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="mtmegamenu">
              <ul>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="index.html">
                      <div class="title title_font">
                        <span class="title-text">Home</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="shop_grid.html">
                      <div class="title title_font">
                        <span class="title-text">Contact Us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="about_us.html">
                      <div class="title title_font">
                        <span class="title-text">about us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="blog_full_width.html">
                      <div class="title title_font">
                        <span class="title-text">Blog</span>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end nav -->

    <?php include_once "$view.view.php" ;?>

<!-- Modal -->
<div id="cartModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h5>Đã thêm <i class="name-res">...</i> vào giỏ hàng</h5>
        <h6><a href="shopping-cart.php">Xem giỏ hàng</a></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


    <!-- Footer -->

    <footer>
      <div class="footer-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-7">
              <form id="newsletter-validate-detail" method="post" action="#">
                <h3 class="hidden-sm">Sign up for newsletter</h3>
                <div class="newsletter-inner">
                  <input class="newsletter-email" name='Email' placeholder='Enter Your Email' />
                  <button class="button subscribe" type="submit" title="Subscribe">Subscribe</button>
                </div>
              </form>
            </div>
            <div class="social col-md-4 col-sm-5">
              <ul class="inline-mode">
                <li class="social-network fb">
                  <a title="Connect us on Facebook" target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="social-network googleplus">
                  <a title="Connect us on Google+" target="_blank" href="https://plus.google.com/">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </li>
                <li class="social-network tw">
                  <a title="Connect us on Twitter" target="_blank" href="https://twitter.com/">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="social-network linkedin">
                  <a title="Connect us on Linkedin" target="_blank" href="https://www.pinterest.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
                <li class="social-network rss">
                  <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                    <i class="fa fa-rss"></i>
                  </a>
                </li>
                <li class="social-network instagram">
                  <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-xs-12 col-lg-3">
            <div class="footer-logo">
              <a href="index-2.html">
                <img src="public/source/images/footer-logo.png" alt="fotter logo">
              </a>
            </div>
            <p>Lorem Ipsum is simply dummy text of the print and typesetting industry.</p>
            <div class="footer-content">
              <div class="email">
                <i class="fa fa-envelope"></i>
                <p>Support@themes.com</p>
              </div>
              <div class="phone">
                <i class="fa fa-phone"></i>
                <p>(800) 0123 456 789</p>
              </div>
              <div class="address">
                <i class="fa fa-map-marker"></i>
                <p> My Company, 12/34 - West 21st Street, New York, USA</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
            <div class="footer-links">
              <h3 class="links-title">Information
                <a class="expander visible-xs" href="#TabBlock-1">+</a>
              </h3>
              <div class="tabBlock" id="TabBlock-1">
                <ul class="list-links list-unstyled">
                  <li>
                    <a href="#s">Delivery Information</a>
                  </li>
                  <li>
                    <a href="#">Discount</a>
                  </li>
                  <li>
                    <a href="sitemap.html">Sitemap</a>
                  </li>
                  <li>
                    <a href="#">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="faq.html">FAQs</a>
                  </li>
                  <li>
                    <a href="#">Terms &amp; Condition</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
            <div class="footer-links">
              <h3 class="links-title">Insider
                <a class="expander visible-xs" href="#TabBlock-3">+</a>
              </h3>
              <div class="tabBlock" id="TabBlock-3">
                <ul class="list-links list-unstyled">
                  <li>
                    <a href="sitemap.html"> Sites Map </a>
                  </li>
                  <li>
                    <a href="#">News</a>
                  </li>
                  <li>
                    <a href="#">Trends</a>
                  </li>
                  <li>
                    <a href="about_us.html">About Us</a>
                  </li>
                  <li>
                    <a href="contact_us.html">Contact Us</a>
                  </li>
                  <li>
                    <a href="#">My Orders</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
            <div class="footer-links">
              <h3 class="links-title">Service
                <a class="expander visible-xs" href="#TabBlock-4">+</a>
              </h3>
              <div class="tabBlock" id="TabBlock-4">
                <ul class="list-links list-unstyled">
                  <li>
                    <a href="account_page.html">Account</a>
                  </li>
                  <li>
                    <a href="wishlist.html">Wishlist</a>
                  </li>
                  <li>
                    <a href="shopping_cart.html">Shopping Cart</a>
                  </li>
                  <li>
                    <a href="#">Return Policy</a>
                  </li>
                  <li>
                    <a href="#">Special</a>
                  </li>
                  <li>
                    <a href="#">Lookbook</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-coppyright">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2019 MyStore. Edit by
              <a href="https://www.facebook.com/nam"> Nam </a>. All Rights Reserved. </div>
            <div class="col-sm-6 col-xs-12">
              <div class="payment">
                <ul>
                  <li>
                    <a href="#">
                      <img title="Visa" alt="Visa" src="public/source/images/visa.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Paypal" alt="Paypal" src="public/source/images/paypal.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Discover" alt="Discover" src="public/source/images/discover.png">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img title="Master Card" alt="Master Card" src="public/source/images/master-card.png">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <a href="#" class="totop"> </a>
  </div>

  <!-- End Footer -->

  <!-- JS -->

  <!-- jquery js -->
  <script type="text/javascript" src="public/source/js/jquery.min.js"></script>

  <!-- bootstrap js -->
  <script type="text/javascript" src="public/source/js/bootstrap.min.js"></script>

  <!-- owl.carousel.min js -->
  <script type="text/javascript" src="public/source/js/owl.carousel.min.js"></script>

  <!-- bxslider js -->
  <script type="text/javascript" src="public/source/js/jquery.bxslider.js"></script>
  
  <!-- flexslider js -->
  <script type="text/javascript" src="public/source/js/jquery.flexslider.js"></script>


  <!-- megamenu js -->
  <script type="text/javascript" src="public/source/js/megamenu.js"></script>
  <script type="text/javascript">
    /* <![CDATA[ */
    var mega_menu = '0';

    /* ]]> */
  </script>

  <!-- jquery.mobile-menu js -->
  <script type="text/javascript" src="public/source/js/mobile-menu.js"></script>

  <!--jquery-ui.min js -->
  <script type="text/javascript" src="public/source/js/jquery-ui.js"></script>

  <!-- main js -->
  <script type="text/javascript" src="public/source/js/main.js"></script>

  <!-- countdown js -->
  <script type="text/javascript" src="public/source/js/countdown.js"></script>

  <!--cloud-zoom js -->
  <script type="text/javascript" src="public/source/js/cloud-zoom.js"></script>
  <script type="text/javascript" src="public/source/js/jquery.twbsPagination.js"></script>
  <?php if($view=='home'):?>
      <!-- Slider Js -->
      <script type="text/javascript" src="public/source/js/revolution-slider.js"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript">
      $(document).ready(function () {
        $('.tp-banner').revolution(
          {
            delay: 9000,
            startwidth: 1170,
            startheight: 530,
            hideThumbs: 10,

            navigationType: "bullet",
            navigationStyle: "preview1",

            hideArrowsOnMobile: "on",

            touchenabled: "on",
            onHoverStop: "on",
            spinner: "spinner4"
          });
      });
    </script>
  <?php endif?>
<script>
  $(document).ready(function(){
    $('.add-to-cart-mt').click(function(){
      var idSP = $(this).attr('id-sp')
        $.ajax({
          url: 'cart.php',
          type:"POST",
          data:{
            id: idSP // $_POST['id']
          },
          success:function(res){
              $('.name-res').html(res)
              $('#cartModal').modal('show')
          },
          error:function(){
            console.log('errr')
          }
        })
    })
    
    $('.pro-add-to-cart').click(function(){
      var idSP = $(this).attr('id-sp')
      var soluong = $('#qty').val()
      //console.log(soluong,idSP)
        $.ajax({
          url: 'cart.php',
          type:"POST",
          data:{
            id: idSP, // $_POST['id']
            qty: soluong // $_POST['qty']
          },
          success:function(res){
              $('.name-res').html(res)
              $('#cartModal').modal('show')
          },
          error:function(){
            console.log('errr')
          }
        })
    })
    
    // $('.pro-add-to-cart .add-to-cart-mt').click(function(){
		//   $('#cartModal').modal({
		// 	  backdrop: 'static'
		//   });
	  // }); 
    $('.pro-add-to-cart').click(function(){
		  $('#cartModal').modal({
			  backdrop: 'static'
		  });
	  }); 
    $('.add-to-cart-mt').click(function(){
		  $('#cartModal').modal({
			  backdrop: 'static'
		  });
	  }); 
    $('.close').click(function(){
     
       location.reload();
    })
  })
  


</script>

</body>


</html>













