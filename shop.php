<!--  Copyright (C) 2021 Halimi Takkie Eddine  <takkie8halimi@gmail.com> -->
<?php

/* headers */
require_once('php/connexion.php');
session_start();

/* variables */
$username = $_POST['username'];
$password = $_POST['password'];
$error = "";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $connexion = OpenConnexion();
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($connexion, $username);
    $password = mysqli_real_escape_string($connexion, $password);

    $query = "SELECT * FROM user WHERE username='$username' and upassword='$password'";
    $result = mysqli_query($connexion, $query);
    $row = mysqli_fetch_row($result);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['username'] = $row[0];
        header("location: gestion-produits.php");
        exit();
    }else {
        $error = "Nom ou le mot de passe n'est pas valide";
    }
    CloseConnexion($connexion);
}
?>
<!DOCTYPE HTML>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

      <!-- site metas -->
      <title>Deva - Boutique</title>
      <link rel="icon" href="images/logo/logo.ico"/>
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="js/jquery.min.js"></script>

</head>
   <body>

        <!-- <div id="preloder">
            <div class="loader"></div>
         </div>-->
         <!-- Quickview Window -->
         <div class="hamburger-box button mobile-toggle"></div>
        <div id="loader"></div>
         <!-- End Quickview Window -->

         <!-- navigation Bar -->
         <nav class="navbar navbar-expand-lg navbar-light nav-dark">
            <div class="container">
               <a class="navbar-brand" href="#"><img src="images/logo/header-logo.png"></a>
               <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav ml-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Accueil</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="shop.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Boutique</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="contact.php"><i class="fa fa-phone"></i>Contact</a>
                       </li>
                   </ul>
                  <div class="top-social">
                     <button type="button" class="btn btn-social-icon btn-facebook btn-rounded">
                        <i class="fa fa-facebook"></i>
                     </button>
                     <button type="button" class="btn btn-social-icon btn-instagram btn-rounded">
                        <i class="fa fa-instagram"></i>
                     </button>
                     <button type="button" class="btn btn-social-icon btn-youtube btn-rounded">
                        <i class="fa fa-youtube-play"></i>
                     </button>
                  </div>
               </div>
               <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto; border: none; background: none;"><a class="nav-link"><i class="fa fa-user"></i>Connexion</a></button>
                          <div id="id01" class="modal">
                              <div class="modal-content animate" action="" method="post">
                                  <div class="imgcontainer">
                                      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                      <img src="images/avatar.jpg" alt="Avatar" class="avatar">
                                  </div>
                                  <div class="my-account-area login-margin">
                                      <div class="container">
                                          <div class="d-flex justify-content-center">
                                              <!-- Login Form -->
                                              <div class="login-form-wrapper">
                                                  <form method="POST" action="" class="sn-form sn-form-boxed">
                                                      <div class="sn-form-inner">
                                                          <div class="single-input">
                                                              <label for="login-form-email">Nom d'utilisateur</label>
                                                              <input id="username" required type="text" name="username">
                                                          </div>
                                                          <div class="single-input">
                                                              <label for="login-form-password">Mot de Passe</label>
                                                              <input id="password" required type="password" name="password">
                                                          </div>
                                                          <div class="single-input">
                                                              <button type="submit" class="mr-3">
                                                                  <span>Connexion</span>
                                                              </button>
                                                          </div><br>
                                                          <p style="color: red"><?php echo $error;?></p>
                                                      </div>
                                                  </form>
                                              </div>
                                              <!--// Login Form -->
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </li>
                  </ul>
               </div>
            </div>
         </nav>

         <div class="body_overlay"></div>
         <!-- Start Bradcaump area -->
         <div class="bradcaump_area bg_image--4">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="bradcaump_inner text-center">
                             <h2 class="bradcaump-title">Shop</h2>
                             <nav class="bradcaump-content">
                                 <a class="breadcrumb_item" href="index.html">Home</a>
                                 <span class="brd-separetor">/</span>
                                 <span class="breadcrumb_item active">Shop</span>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="shop_area section-ptb-xl bg--white">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-3 col-12 order-2 order-lg-1 sm-mt--30 md-mt--30">
                         <div class="shop_sidebar">
                             <!-- Start Single Wedget -->
                             <div class="sidebar_widget search mb--60">
                                 <h2 class="sidebar_title">Search</h2>
                                 <div class="sidebar_search">
                                     <form action="#">
                                         <input type="text" placeholder="Search for:">
                                         <button type="submit"><i class="ti-search"></i></button>
                                     </form>
                                 </div>
                             </div>
                             <!-- End Single Wedget -->

                             <!-- Start Single Wedget -->
                             <div class="sidebar_widget widget_price_filter mb--60">
                                 <h2 class="sidebar_title">Filter</h2>
                                 <div class="sidebar_filter">
                                     <input type="text" id="demo_7" class="js-range-slider" name="my_range" value=""
                                            data-type="double"
                                            data-min="0"
                                            data-max="100"
                                            data-from="15"
                                            data-to="95"
                                            data-grid="true"
                                     />
                                 </div>
                             </div>
                             <!-- End Single Wedget -->

                             <!-- Start Single Wedget -->
                             <div class="sidebar_widget widget_categories mb--60">
                                 <h2 class="sidebar_title">Categories</h2>
                                 <ul class="sidebar_categories">
                                     <li><a href="#">Men <span>(01)</span></a></li>
                                     <li><a href="#">Women <span>(01)</span></a></li>
                                     <li><a href="#">All <span>(01)</span></a></li>
                                 </ul>
                             </div>
                             <!-- End Single Wedget -->

                             <!-- Start Single Wedget -->
                             <div class="sidebar_widget widget_banner mb--60">
                                 <div class="sidebar_banner">
                                     <a href="#"><img src="images/carousel-slider/sidebar-banner.jpg" alt="sidebar banner"></a>
                                 </div>
                             </div>
                             <!-- End Single Wedget -->

                             <!-- Start Single Wedget -->
                             <div class="sidebar_widget widget_tag">
                                 <h2 class="sidebar_title">Tags</h2>
                                 <ul class="sidebar_tag">
                                     <li><a href="#">Men</a></li>
                                     <li><a href="#">Woman</a></li>
                                     <li><a href="#">All</a></li>
                                 </ul>
                             </div>
                             <!-- End Single Wedget -->
                         </div>
                     </div>

                     <div class="col-lg-9 col-12 order-1 order-lg-2">
                         <div class="shop_product_area">
                             <div class="shop-bar-area">
                                 <div class="shop-filter-tab">
                                     <div class="view_mode justify-content-center nav" role="tablist">
                                         <a class="active" href="#tab1" data-toggle="tab"> <i class="ti-layout-grid4-alt"></i></a>
                                         <a class="" href="#tab2" data-toggle="tab"><i class="ti-list"></i></a>
                                     </div>
                                 </div>
                                 <div class="shop-found-selector">
                                     <p>Showing 1–12 of 16 results</p>
                                     <select>
                                         <option>Sort by popularity</option>
                                         <option>Sort by average rating</option>
                                         <option>Sort by newness</option>
                                         <option>Sort by price: low to high</option>
                                         <option>Sort by price: high to low</option>
                                     </select>
                                 </div>
                             </div>

                             <div class="tab_content">
                                 <div class="row single_grid_product tab-pane fade show active" id="tab1" role="tabpanel">
                                     <!-- Start Single Product -->
                                     <?php
                                     $connexion = OpenConnexion();
                                     $query = "SELECT
                                                p.pId,
                                                p.pName,
                                                p.pAPrice,
                                                p.pPPrice,
                                                p.sexe,
                                                p.pImageName
                                               FROM product AS p;";
                                     $result = mysqli_query($connexion, $query);
                                     if ($result->num_rows > 0) {
                                         while($row = mysqli_fetch_row($result)) {
                                             $id = $row[0];
                                     ?>
                                     <div class="col-lg-6 col-xl-4 col-sm-6 col-12">
                                         <div class="product-item">
                                             <div class="product">
                                                 <div class="thumb">
                                                     <a href="single-product.php?id=<?php echo $row[0];?>">
                                                         <img src="products/product-<?php echo $row[0]."/".$row[5];?>" alt="product img">
                                                     </a>
                                                     <div id="<?php echo $id;?>"  class="product_action">
                                                         <h4>
                                                             <a href="single-product.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a>
                                                         </h4>
                                                         <ul class="cart_action">
                                                             <li>
                                                                 <a href="cart.html">
                                                                     <img src="images/add_to_cart.png" alt="icons">
                                                                 </a>
                                                             </li>
                                                             <li>
                                                                 <a id="<?php echo $id;?>" class="quickview">
                                                                     <img id="loop" src="images/quick_view.png" alt="icons">
                                                                 </a>
                                                             </li>
                                                         </ul>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="pi-text">
                                                 <div class="catagory-name"><?php echo $row[4];?></div>
                                                 <a href="#">
                                                     <h5><?php echo $row[1];?></h5>
                                                 </a>
                                                 <div class="product-price">
                                                     $<?php echo $row[2];?>
                                                     <span>$<?php echo $row[3];?></span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <?php
                                     }}
                                     else echo "0 results";
                                     CloseConnexion($connexion);
                                     ?>
                                 </div>

                                 <div class="row single_grid_product tab-pane fade" id="tab2" role="tabpanel">
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list1.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list2.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list3.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list4.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list5.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list6.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list7.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list8.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                     <!-- Start Single Product -->
                                     <div class="col-12">
                                         <div class="product_list">
                                             <div class="product_list__thumb">
                                                 <a href="single-product.html">
                                                     <img src="images/products/list9.png" alt="product img">
                                                 </a>
                                             </div>
                                             <div class="product_list__content">
                                                 <ul class="price">
                                                     <li>
                                                         <div class="product-item">
                                                             <div class="pi-text">
                                                                 <a href="single-product.html">
                                                                     <h5>Pure Pineapple</h5>
                                                                 </a>
                                                                 <div class="product-price">
                                                                     $14.00
                                                                     <span>$35.00</span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </li>
                                                 </ul>
                                                 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born</p>
                                                 <ul class="cart_action">
                                                     <li><a href="cart.html"><img src="images/add_to_cart.png" alt="icons"></a></li>
                                                     <li><a title="Quick View" class="quickview" href="#"><img src="images/quick_view.png" alt="icons"></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Single Product -->
                                 </div>
                             </div>
                            <!-- <ul class="pagination_style">
                                 <li><a class="active" href="#">1</a></li>
                                 <li><a href="#">2</a></li>
                                 <li><a href="#"><i class="ti-angle-right"></i></a></li>
                             </ul>-->
                         </div>
                     </div>
                 </div>
             </div>
         </div>


          <!-- footer section start -->
          <div class="footer_section layout_padding">
             <div class="container">
                <div class="row">
                   <div class="col-lg-3">
                      <div class="footer-left">
                         <div class="footer-logo">
                            <a href="#"><img src="images/logo/footer-logo.png" alt=""></a>
                         </div>
                          <ul>
                              <li><i class="ti-location-pin"> 60-49 Road 11378 New York</i></li>
                              <li><i class="ti-mobile"> +65 11.188.888</i></li>
                              <li><i class="ti-email"> hellocolorlib@gmail.com</i></li>
                          </ul>
                         <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                         </div>
                      </div>
                   </div>
                    <div class="col-lg-4">
                        <img src="images/instagram.jpg">
                    </div>
                    <div class="col-lg-5">
                        <div class="newslatter-item">
                            <h5>Rejoignez notre newsletter maintenant</h5>
                            <p>Recevez des mises à jour par e-mail sur notre dernière boutique et nos offres spéciales.</p>
                            <form action="#" class="subscribe-form">
                                <input type="text" placeholder="Entrez votre e-mail ">
                                <button type="button">S'abonner</button>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
                <!-- copyright section end -->
             <div class="copyright-reserved">
                <div class="container">
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright © <script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <div class="payment-pic">
                               <img src="images/payment-method.png" alt="">
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
        <script>
            $('.quickview').mouseover( function(){
                $.ajax({
                    method: "GET",
                    url: "quick-view.php?id="+this.id,
                    success: function(result){
                        $('#view').html(result);
                    }
                });
            });
            $('.quickview').click( function() {
                $('.quick-view-modal').toggleClass('is-visible');
            });
        </script>
         <!-- Quick View Modal -->
         <div class="quick-view-modal">
             <div id='view' class="quick-view-modal-inner">

             </div>
         </div>

         <!-- Scripts section
         ------------------------------------------- //-->
         <!-- Scripts for Product Quickview -->
         <script src="js/vendor/modernizr-3.6.0.min.js"></script>
         <script src="js/vendor/jquery-3.3.1.min.js"></script>
         <script src="js/popper.min.js"></script>
         <script src="js/plugins.js"></script>
         <script src="js/main.js"></script>

         <script src="js/bootstrap.min.js"></script>
         <script src="js/ion.rangeSlider.min.js"></script>
         <script src="js/product-slider.js"></script>

         <!-- ------------------------------------------- -->
         <script>
             $(".js-range-slider").ionRangeSlider({
                 grid: true,
                 min: 0,
                 max: 100,
                 from: 15,
                 to: 95,
                 prefix: "$"
             });
         </script>
         <!-- Nav bar backround -->
   </body>
</html>