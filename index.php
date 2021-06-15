<?php

/* headers */
require_once('php/connexion.php');
session_start();

/* variables */
$username = $_POST['username'];
$password = $_POST['password'];
$error = "";
$id = '1';

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
      <title>Diva - Accueil</title>
      <link rel="icon" href="images/logo/logo.ico"/>
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="js/jquery-1.12.4.js"></script>
</head>
   <body>

         <div id="preloder">
            <div class="loader"></div>
         </div>
         <!-- Quickview Window -->
         <div class="hamburger-box button mobile-toggle"></div>
         <!-- End Quickview Window -->

         <!-- navigation Bar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
               <a class="navbar-brand" href="#"><img src="images/logo/header-logo.png"></a>
               <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav ml-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Accueil</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="boutique.php?page=1"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Boutique</a>
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

        <div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
            <ol class="carousel-indicators">
               <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
               <li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
               <li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img alt="First slide" class="d-block w-100" src="images/carousel-slider/b5.jpg">
                  <div class="carousel-caption">
                     <h5 class="animated zoomIn" style="animation-delay: 1s">Commencez<br>Vos Chats Préférés</h5>
                     <p class="animated bounceInLeft" style="animation-delay: 1s">
                        <button class="buynow_bt">
                        <a href="boutique.php?page=1">Boutique</a>
                        </button>
                     </p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img alt="Second slide" class="d-block w-100" src="images/carousel-slider/b2.png">
                  <div class="carousel-caption">
                     <h5 class="animated slideInUp" style="animation-delay: 1s">Commencez<br>Vos Chats Préférés</h5>
                     <p class="animated fadeInLeft" style="animation-delay: 1s">
                        <button class="buynow_bt">
                            <a href="boutique.php?page=1">Boutique</a>
                        </button>
                     </p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img alt="Third slide" class="d-block w-100" src="images/carousel-slider/b4.jpg">
                  <div class="carousel-caption">
                     <h5 class="animated slideInRight" style="animation-delay: 1s">Commencez<br>Vos Chats Préférés</h5>
                     <p class="animated zoomIn" style="animation-delay: 1s">
                        <button class="buynow_bt">
                            <a href="boutique.php?page=1">Boutique</a>
                        </button>
                     </p>
                  </div>
               </div>
            </div>
             <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button">
                 <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button">
                 <span aria-hidden="true" class="carousel-control-next-icon"></span>
                 <span class="sr-only">Next</span>
             </a>
         </div>

         <!-- Women Banner Section Begin -->
         <section class="women-banner spad">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-3">
                         <div class="product-large set-bg" data-setbg="images/slider/women-large.jpg">
                             <h2>Women’s</h2>
                             <a href="boutique.php?page=1">Découvrir plus</a>
                         </div>
                     </div>
                     <div class="col-lg-8 offset-lg-1">
                         <div class="col-sm-12 text-center wow fadeInUp">
                             <h2>LUNETTES POUR FEMME</h2>
                         </div>
                         <?php
                         $connexion = OpenConnexion();
                         $query = "SELECT p.pId,
                                           p.pName,
                                           p.pAPrice,
                                           p.pPPrice,
                                           p.gender,
                                           p.size,
                                           p.pImageName
                                    FROM product AS p
                                    WHERE p.gender = 'Femme'
                                    ORDER BY RAND()
                                    LIMIT 5";
                         $result = mysqli_query($connexion, $query);?>
                         <div class="product-slider owl-carousel">
                             <?php if ($result->num_rows > 0) {
                                 while($row = mysqli_fetch_row($result)) {
                                     $id = $row[0];
                                     ?>
                                     <div class="product-item">
                                         <div class="product">
                                             <div class="thumb">
                                                 <a href="produit.php?id=<?php echo $row[0];?>">
                                                     <img src="products/product-<?php echo $row[0]."/".$row[6];?>" alt="product img">
                                                 </a>
                                                 <div id="<?php echo $id;?>"  class="product_action">
                                                     <h4>
                                                         <a href="produit.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a>
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
                                                 €<?php echo $row[2];?>
                                                 <?php if($row[3] != 0){?>
                                                     <span>€<?php echo $row[3];?></span>
                                                 <?php }?>
                                             </div>
                                         </div>
                                     </div>
                                     <?php
                                 }}
                             else echo "0 results";
                             CloseConnexion($connexion);
                             ?>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- Women Banner Section End -->


         <!-- Latest Products -->
         <section class="carousel_se_02">
             <div class="container bg-light">
                 <div class="row">
                     <div class="col-sm-12 text-center wow fadeInUp">
                         <h2>DERNIÈRES LUNETTES</h2>
                     </div>
                     <div class="col-md-12 px-4 pt-0">
                         <div class="owl-carousel carousel_se_02_carousel owl-theme">
                             <?php
                                 $connexion = OpenConnexion();
                                 $miniQuery = "SELECT p.pId FROM product AS p ORDER BY p.pId DESC LIMIT 2";
                                 $result = mysqli_query($connexion, $miniQuery);
                                 $row = mysqli_fetch_row($result);
                                 $lastProduct = $row[0];
                                 $beforeLastProduct = $row[1];
                                 $query = "SELECT
                                            p.pId,
                                            p.pName,
                                            p.pAPrice,
                                            p.pPPrice,
                                            p.gender,
                                            p.size,
                                            p.pImageName
                                          FROM product AS p
                                          ORDER BY p.pId DESC LIMIT 6";
                                 $result = mysqli_query($connexion, $query);
                                 if ($result->num_rows > 0) {
                                 while($row = mysqli_fetch_row($result)) {
                                 $id = $row[0];
                             ?>
                             <div class="item">
                                 <div class="col-md-12">
                                     <div class="product-item">
                                         <div class="product">
                                             <div class="thumb">
                                                 <?php
                                                 if($row[0] == $lastProduct){?>
                                                     <a href="produit.php?id=<?php echo $row[0];?>">
                                                         <img src="products/product-<?php echo $row[0]."/".$row[6];?>" alt="product img">
                                                         <span class="spanProduct">Nouveau</span>
                                                     </a>
                                                 <?php }else if($row[0] == $beforeLastProduct){ ?>
                                                     <a href="produit.php?id=<?php echo $row[0];?>">
                                                         <img src="products/product-<?php echo $row[0]."/".$row[6];?>" alt="product img">
                                                         <span class="spanProduct">Nouveau</span>
                                                     </a>
                                                 <?php }else{?>
                                                     <a href="produit.php?id=<?php echo $row[0];?>">
                                                         <img src="products/product-<?php echo $row[0]."/".$row[6];?>" alt="product img">
                                                     </a>
                                                 <?php }?>
                                                 <div id="<?php echo $id;?>"  class="product_action">
                                                     <h4>
                                                         <a href="produit.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a>
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
                                                 €<?php echo $row[2];?>
                                                 <?php if($row[3] != 0){?>
                                                     <span>€<?php echo $row[3];?></span>
                                                 <?php }?>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <?php
                                 }}
                                 CloseConnexion($connexion);
                             ?>
                         </div>
                     </div>
                 </div>
             </div>
         </section>

         <!-- Man Banner Section Begin -->
         <section class="man-banner spad ">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-8">
                         <div class="col-sm-12 text-center wow fadeInUp">
                             <h2>LUNETTES POUR HOMMES</h2>
                         </div>
                         <?php
                         $connexion = OpenConnexion();
                         $query = "SELECT p.pId,
                                          p.pName,
                                          p.pAPrice,
                                          p.pPPrice,
                                          p.gender,
                                          p.size,
                                          p.pImageName
                                    FROM product AS p
                                    WHERE p.gender = 'Homme'
                                    ORDER BY RAND()
                                    LIMIT 5";
                         $result = mysqli_query($connexion, $query);?>
                         <div class="product-slider owl-carousel">
                             <?php if ($result->num_rows > 0) {
                                 while($row = mysqli_fetch_row($result)) {
                                      $id = $row[0];
                             ?>
                             <div class="product-item">
                                 <div class="product">
                                     <div class="thumb">
                                         <a href="produit.php?id=<?php echo $row[0];?>">
                                             <img src="products/product-<?php echo $row[0]."/".$row[6];?>" alt="product img">
                                         </a>
                                         <div id="<?php echo $id;?>"  class="product_action">
                                             <h4>
                                                 <a href="produit.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a>
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
                                         €<?php echo $row[2];?>
                                         <?php if($row[3] != 0){?>
                                             <span>€<?php echo $row[3];?></span>
                                         <?php }?>
                                     </div>
                                 </div>
                             </div>
                             <?php
                                 }}
                                 else echo "0 results";
                                 CloseConnexion($connexion);
                             ?>
                         </div>
                     </div>
                     <div class="col-lg-3 offset-lg-1">
                         <div class="product-large set-bg m-large" data-setbg="images/slider/man-large.jpg">
                             <h2>Men’s</h2>
                             <a href="boutique.php?page=1">Découvrir plus</a>
                         </div>
                     </div>
                 </div>
             </div>
         </section>


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
                            Copyright © <script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> All rights reserved
                            <div class="payment-pic">
                               <img src="images/payment-method.png" alt="">
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>

         <!-- Quick View Modal -->
         <!-- Quick View Modal -->
         <div class="quick-view-modal">
             <div id='view' class="quick-view-modal-inner">
             </div>
         </div>
         <!--// End Quick View Modal -->
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

         <!-- Scripts section -->
         <!-- ------------------------------------------- //-->
         <!-- Scripts for Product Quickview -->
         <script src="js/vendor/modernizr-3.6.0.min.js"></script>
         <script src="js/vendor/jquery-3.3.1.min.js"></script>
         <script src="js/popper.min.js"></script>
         <script src="js/plugins.js"></script>
         <script src="js/main.js"></script>
         <!-- ------------------------------------------- -->
         <!-- Scripts for Product Slider -->
         <script src="js/bootstrap.min.js"></script>
         <script src="js/jquery-3.3.1.min.js"></script>
         <script src="js/jquery.slicknav.js"></script>
         <script src="js/owl.carousel.min.js"></script>
         <script src="js/product-slider.js"></script>
         <!-- Nav bar backround -->
         <script>
             $(window).scroll(function()
             {$('nav').toggleClass('scrolled', $(this).scrollTop() > 30);});
         </script>
         <script>
             $(document).ready(function () {
                 $(".carousel_se_02_carousel").owlCarousel({
                     loop: true,
                     items: 4,
                     nav: true,
                     mouseDrag: true,
                     responsiveClass: true,
                     autoplay: true,
                     navText: ["<i class='icofont-bubble-left'></i>","<i class='icofont-bubble-right'></i>"],
                     responsive: {
                         0: {items: 1,},
                         650: {items: 2,},
                         767: {items: 3,},
                         992: {items: 3,},
                         1200: {items: 4,},
                     },
                 });
             });
         </script>
   </body>
</html>