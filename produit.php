<!--  Copyright (C) 2021 Halimi Takkie Eddine  <takkie8halimi@gmail.com> -->
<?php

/* headers */
require_once('php/connexion.php');
session_start();

/* variables */
$username = $_POST['username'];
$password = $_POST['password'];
$error = "";
$id = $_GET['id'];
$sub_dir = "product-".$id."";


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
      <title>Deva - Vue du Produit </title>
      <link rel="icon" href="images/logo/logo.ico"/>
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
   <body>

         <div id="preloder">
            <div class="loader"></div>
         </div>
         <!-- Quickview Window -->
         <div class="hamburger-box button mobile-toggle"></div>
         <!-- End Quickview Window -->

         <!-- navigation Bar -->
         <nav class="navbar navbar-expand-lg navbar-light nav-dark">
            <div class="container">
               <a class="navbar-brand" href="index.php"><img src="images/logo/header-logo.png"></a>
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
                                      <img src="images/icons/avatar.jpg" alt="Avatar" class="avatar">
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
         <div class="bradcaump_area bg_image--2">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="bradcaump_inner text-left">
                             <h2 style="color: #000000;" class="bradcaump-title">Vue De Produit</h2>
                             <nav class="bradcaump-content">
                                 <a style="color: #000000;" class="breadcrumb_item" href="boutique.php?page=1">Boutique</a>
                                 <span style="color: #000000;" class="brd-separetor">/</span>
                                 <span style="color: #000000;" class="breadcrumb_item active">Vue De Produit</span>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Quick View Modal -->
         <div class="gm_single_product pt--100 pb--100 bg--white">
                 <div class="container">
                     <div class="product-details">
                         <!-- Product Details Left -->
                         <?php
                             $connexion = OpenConnexion();
                             $query = ("SELECT p.pName,
                                               p.pAPrice,
                                               p.pPPrice,
                                               p.gender,
                                               p.size,
                                               p.pImageName,
                                               pi.p_img1,
                                               pi.p_img2,
                                               pi.p_img3,
                                               pi.p_img4
                                        FROM product as p LEFT JOIN product_images pi on pi.pImageName = p.pImageName
                                        WHERE p.pId ='$id'");

                             $result = mysqli_query($connexion,$query);
                             $row = mysqli_fetch_row($result);
                         ?>
                         <div class="product-details-left">
                             <div class="product-details-images slider-navigation-2">
                                 <a href="products/<?php echo $sub_dir."/".$row[5];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[5];?>" alt="product image">
                                 </a>
                                 <a href="products/<?php echo $sub_dir."/".$row[6];?>">
                                     <img src="/products/<?php echo $sub_dir."/".$row[6];?>" alt="product image">
                                 </a>
                                 <a href="products/<?php echo $sub_dir."/".$row[7];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[7];?>" alt="product image">
                                 </a>
                                 <a href="products/<?php echo $sub_dir."/".$row[8];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[8];?>" alt="product image">
                                 </a>
                                 <a href="products/<?php echo $sub_dir."/".$row[9];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[9];?>" alt="product image">
                                 </a>
                             </div>
                             <div class="product-details-thumbs slider-navigation-2">
                                 <img src="products/<?php echo $sub_dir."/".$row[5];?>" alt="product image thumb">
                                 <img src="products/<?php echo $sub_dir."/".$row[6];?>" alt="product image thumb">
                                 <img src="products/<?php echo $sub_dir."/".$row[7];?>" alt="product image thumb">
                                 <img src="products/<?php echo $sub_dir."/".$row[8];?>" alt="product image thumb">
                                 <img src="products/<?php echo $sub_dir."/".$row[9];?>" alt="product image thumb">
                             </div>
                         </div>
                         <!--// Product Details Left -->

                         <!-- Product Details Right -->
                         <div class="product-details-right">
                             <h5 class="product-title"><?php echo $row[0];?></h5>

                             <div class="ratting-stock-availbility">
                                 <div class="ratting-box">
                                     <span><i class="fa fa-star"></i></span>
                                     <span><i class="fa fa-star"></i></span>
                                     <span><i class="fa fa-star"></i></span>
                                     <span><i class="fa fa-star"></i></span>
                                     <span><i class="fa fa-star"></i></span>
                                 </div>
                                 <span class="stock-available">In stock</span>
                             </div>
                             <p>Clean, classic, and comfortable. The glasses takes the best of both feminine and masculine qualities.</p>

                             <div class="price-box">
                                 <div class="product-item">
                                     <div class="pi-price">
                                         <div class="product-price">
                                             €<?php echo $row[1];?>
                                             <?php if($row[2] != 0){?>
                                                 <span>€<?php echo $row[2];?></span>
                                             <?php }?>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <?php
                             $size = $row[4];
                             $ref = explode("-", $size);
                             ?>
                             <div class="product-details-size">
                                 <span>Taille :</span>
                                 <ul>
                                     <li><?php echo $ref[0].' <i class="fa fa-square-o" aria-hidden="true"></i> '.$ref[1]." <img src='images/icons/bar.png' style='height: 20px; width: 50px;'> ".$ref[2]?></li>
                                 </ul>
                             </div>
                             <div class="product-details-categories">
                                 <span>Categories :</span>
                                 <ul>
                                     <?php if($row[3] == "Mix"){?>
                                         <li><a style="background: black;
                                      color: white;
                                      padding: 2px;
                                      box-shadow: 5px 5px 2px 1px rgba(0, 0, 255, .2);"><?php echo $row[3];?></a>&nbsp;
                                             <a style="background: black;
                                      color: white;
                                      padding: 2px;
                                      box-shadow: 5px 5px 2px 1px rgba(0, 0, 255, .2);">Homme</a>&nbsp;
                                             <a style="background: black;
                                      color: white;
                                      padding: 2px;
                                      box-shadow: 5px 5px 2px 1px rgba(0, 0, 255, .2);">Femme</a>
                                         </li>
                                     <?php }else{?>
                                         <li><a style="background: black;
                                      color: white;
                                      padding: 2px;
                                      box-shadow: 5px 5px 2px 1px rgba(0, 0, 255, .2);">
                                                 <?php echo $row[3];?>
                                             </a>
                                         </li>
                                     <?php }?>
                                 </ul>
                             </div>
                             <div class="product-details-socialshare">
                                 <span>Partager  :</span>
                                 <ul>
                                     <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?app_id=1180062399123345&sdk=joey&u=/URL/&display=popup&ref=plugin&src=share_button" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')"><i class="fa fa-facebook"></i></a></li>
                                     <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                 </ul>
                             </div>
                             <div class="product-details-quantity">
                                 <a href="contact.php" class="add-to-cart-button">
                                     <span>Acheter Maintenant</span>
                                 </a>
                             </div>
                         </div>
                         <!--// Product Details Right -->
                     </div>
                 </div>
                 <?php CloseConnexion($connexion); ?>
                 <div class="product_review">
                     <div class="container">
                         <div class="row">
                             <div class="col-lg-12">
                                 <div class="description_nav nav nav-tabs d-block" role="tablist">
                                     <a class="active" id="descrip-tab" data-toggle="tab" href="#descrip" role="tab" aria-controls="descrip" aria-selected="true">Description du Produit</a>
                                 </div>
                             </div>
                         </div>
                         <div class="tab_container">
                             <div class="single_review_content tab-pane fade show active" id="descrip" role="tabpanel">
                                 <div class="content">
                                     <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                 </div>
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
                            <a href="index.php"><img src="images/logo/footer-logo.png" alt=""></a>
                         </div>
                          <ul>
                              <ul>
                                  <!-- <li><i class="ti-location-pin"> 60-49 Road 11378 New York</i></li>
                                  <li><i class="ti-mobile"> +65 11.188.888</i></li>-->
                                  <li><i class="ti-email"> bensalahnoufel@gmail.com</i></li>
                              </ul>
                          </ul>
                          <div class="footer-social">
                              <a href="#"><i class="fa fa-facebook"></i></a>
                              <a href="#"><i class="fa fa-instagram"></i></a>
                          </div>
                      </div>
                   </div>
                    <div class="col-lg-4">
                        <img src="images/icons/instagram.jpg">
                    </div>
                    <div class="col-lg-5">
                        <div class="newslatter-item">
                            <h5>Rejoignez notre newsletter maintenant</h5>
                            <p>Recevez des mises à jour par e-mail sur notre dernière boutique et nos offres spéciales.</p>
                            <form action="" class="subscribe-form">
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
                            Copyright © <script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> Tous Les Droits Sont Réservés
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <div class="payment-pic">
                               <img src="images/icons/payment-method.png" alt="">
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
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

         <!-- ------------------------------------------- -->
         <!-- Nav bar backround -->
   </body>
</html>
