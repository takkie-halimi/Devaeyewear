<?php

/* headers */
require_once('php/connexion.php');
session_start();

/* variables */
$username = $_POST['username'];
$password = $_POST['password'];
$error = "";

$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$Previous = $page - 1;
$Next = $page + 1;


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
      <script src="js/jquery-1.12.4.js"></script>
      <link rel="stylesheet" href="css/jquery-ui.css">

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
               <a class="navbar-brand" href="#"><img src="images/logo/header-logo.png"></a>
               <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav ml-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Accueil</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="boutique.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Boutique</a>
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
                                 <h2 class="sidebar_title">Rechercher</h2>
                                 <div class="sidebar_search">
                                     <form action="" method="POST">
                                         <input id="searchBar" name="searchBar" type="text" placeholder="Rechercher:">
                                         <button name="r_submit" type="submit"><i class="ti-search"></i></button>
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
                                 <h2 class="sidebar_title">Catégories</h2>
                                 <ul class="sidebar_categories">
                                     <?php
                                         $connexion = OpenConnexion();
                                         $query = "SELECT COUNT(DISTINCT pId) gender_count,
                                                          COUNT(DISTINCT CASE WHEN gender = 'Homme'   THEN pId END) male_count,
                                                          COUNT(DISTINCT CASE WHEN gender = 'Femme' THEN pId END) female_count,
                                                          COUNT(DISTINCT CASE WHEN gender = 'Mix' THEN pId END) mix_count
                                                    FROM product";
                                         $result = mysqli_query($connexion, $query);
                                         $row = mysqli_fetch_row($result);
                                     ?>
                                     <li><a>Homme<span>(<?php echo $row[1]?>)</span></a></li>
                                     <li><a>Femme<span>(<?php echo $row[2]?>)</span></a></li>
                                     <li><a>Mix [Homme & Femme]<span>(<?php echo $row[3]?>)</span></a></li>
                                     <li><a>Tous <span>(<?php echo $row[0]?>)</span></a></li>
                                 </ul>
                                 <?php  CloseConnexion($connexion);?>
                             </div>
                             <!-- End Single Wedget -->

                             <!-- Start Single Wedget -->
                             <div class="sidebar_widget widget_banner mb--60">
                                 <div class="sidebar_banner">
                                     <a><img src="images/carousel-slider/sidebar-banner.jpg" alt="sidebar banner"></a>
                                 </div>
                             </div>
                             <!-- End Single Wedget -->

                             <!-- Start Single Wedget -->
                             <div class="sidebar_widget widget_tag">
                                 <h2 class="sidebar_title">Mots Clés</h2>
                                 <ul class="sidebar_tag">
                                     <li><a>Homme</a></li>
                                     <li><a>Femme</a></li>
                                     <li><a>Tous</a></li>
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
                                     </div>
                                 </div>
                                 <div class="shop-found-selector">
                                     <p>Affichage des résultats 1–10 sur 12</p>
                                         <select name="zoneSelect">
                                             <option onclick="page_restrict('genre','Tous')">Trier par : Tous</option>
                                             <option onclick="page_restrict('genre','Homme')">Trier par : Homme</option>
                                             <option onclick="page_restrict('genre','Femme')">Trier par : Femme</option>
                                             <option onclick="page_restrict('genre','Mix')">Trier par : (MIX) Homme & Femme</option>
                                             <option onclick="page_restrict('prix','pbh')">Trier par prix : De Bas en Haut</option>
                                             <option onclick="page_restrict('prix','phb')">Trier par prix : De Haut en Bas</option>
                                         </select>
                                 </div>
                             </div>

                             <div class="tab_content">
                                 <div class="row single_grid_product tab-pane fade show active" id="tab1" role="tabpanel">
                                     <!-- Start Single Product -->
                                     <?php
                                         if(!empty($_GET['gender'])) {
                                             if($_GET['gender'] == 'Homme')
                                                 $query = "SELECT p.pId,
                                                                  p.pName,
                                                                  p.pAPrice,
                                                                  p.pPPrice,
                                                                  p.gender,
                                                                  p.size,
                                                                  p.pImageName
                                                       FROM product AS p where p.gender = 'Homme'
                                                       LIMIT $start , $limit";
                                             else if($_GET['gender'] == 'Femme') {
                                                 $query = "SELECT p.pId,
                                                                  p.pName,
                                                                  p.pAPrice,
                                                                  p.pPPrice,
                                                                  p.gender,
                                                                  p.size,
                                                                  p.pImageName
                                                   FROM product AS p where p.gender = 'Femme'
                                                   LIMIT $start , $limit";
                                             }
                                             else if($_GET['gender'] == 'Mix') {
                                                 $query = "SELECT p.pId,
                                                                  p.pName,
                                                                  p.pAPrice,
                                                                  p.pPPrice,
                                                                  p.gender,
                                                                  p.size,
                                                                  p.pImageName
                                                           FROM product AS p where p.gender = 'Mix'
                                                           LIMIT $start , $limit";
                                             }else {
                                                 $query = "SELECT p.pId,
                                                                  p.pName,
                                                                  p.pAPrice,
                                                                  p.pPPrice,
                                                                  p.gender,
                                                                  p.size,
                                                                  p.pImageName
                                                           FROM product AS p 
                                                           LIMIT $start , $limit";
                                             }
                                         }
                                         else if (!empty($_GET['prix'])){
                                             if($_GET['prix'] == 'pbh')
                                                 $query = " SELECT p.pId,
                                                                   p.pName,
                                                                   p.pAPrice,
                                                                   p.pPPrice,
                                                                   p.gender,
                                                                   p.size,
                                                                   p.pImageName
                                                           FROM product AS p
                                                           ORDER BY p.pAPrice
                                                           LIMIT $start , $limit";
                                             else
                                                 $query = " SELECT p.pId,
                                                                   p.pName,
                                                                   p.pAPrice,
                                                                   p.pPPrice,
                                                                   p.gender,
                                                                   p.size,
                                                                   p.pImageName
                                                           FROM product AS p
                                                           ORDER BY p.pAPrice DESC
                                                           LIMIT $start , $limit";
                                         }
                                         else{
                                             $query = "SELECT p.pId,
                                                              p.pName,
                                                              p.pAPrice,
                                                              p.pPPrice,
                                                              p.gender,
                                                              p.size,
                                                              p.pImageName
                                                       FROM product AS p 
                                                       LIMIT $start , $limit";
                                         }
                                         if(isset($_POST['r_submit']))
                                         {
                                             $searchTerm = $_POST['searchBar'];
                                             $query = "SELECT p.pId,
                                                              p.pName,
                                                              p.pAPrice,
                                                              p.pPPrice,
                                                              p.gender,
                                                              p.size,
                                                              p.pImageName
                                                       FROM product AS p 
                                                       Where p.pName LIKE '%".$searchTerm."%' LIMIT $start , $limit";
                                         }

                                         $connexion = OpenConnexion();
                                         $result = mysqli_query($connexion, $query);
                                         if ($result->num_rows > 0) {
                                             while($row = mysqli_fetch_row($result)) {
                                                 $id = $row[0];
                                     ?>
                                     <div class="col-lg-6 col-xl-4 col-sm-6 col-12">
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

                                             <!-- <div class="pi-text">
                                                 <a href="#">
                                                     <h5><?php echo $row[1];?></h5>
                                                 </a>
                                                 <div class="catagory-name" style="background: black;
                                                                              color: white;
                                                                              padding: 2px;
                                                                              box-shadow: 5px 5px 2px 1px rgba(0, 0, 255, .2);">
                                                      <?php echo $row[4];?>
                                                  </div>
                                                 <div class="product-price">
                                                     €<?php echo $row[2];?>
                                                     <span>€<?php echo $row[3];?></span>
                                                 </div>
                                             </div> -->
                                         </div>
                                     </div>
                                     <?php
                                     }}
                                     else echo "0 results";
                                     CloseConnexion($connexion);
                                     ?>
                                 </div>
                             </div>
                             <?php
                                 $connexion = OpenConnexion();
                                 $query = "SELECT count(pId) AS id FROM product";
                                 $result = mysqli_query($connexion, $query);
                                 $productsCount = mysqli_fetch_row($result);
                                 $pages = ceil($productsCount[0] / $limit);
                                 CloseConnexion($connexion);
                             ?>
                             <ul class="pagination_style">
                                 <?php
                                     $href = basename($_SERVER['REQUEST_URI']);
                                     if(strpos($href, '&') > -1) {
                                         $new_href = explode('&', $href);
                                         $sufix = '&'.$new_href[1];

                                         if (!($Previous == 0))
                                             print'<li><a href="boutique.php?page=' . $Previous.$sufix .'" aria-label="Previous"><i class="ti-angle-left"></i></a></li>';

                                         for ($i = 1; $i <= $pages; $i++):
                                             if ($i == $_GET['page']) print'<li><a class="active" href="boutique.php?page=' . $i.$sufix . '">' . $i . '</a></li>';
                                             else print'<li><a href="boutique.php?page=' . $i.$sufix . '">' . $i . '</a></li>';
                                         endfor;
                                         if (!($Next > $pages))
                                             print'<li> <a href="boutique.php?page=' . $Next.$sufix . '" aria-label="Next"><i class="ti-angle-right"></i></a></li>';
                                     }else{

                                         if(!($Previous == 0))
                                             print'<li><a href="boutique.php?page='.$Previous.'" aria-label="Previous"><i class="ti-angle-left"></i></a></li>';

                                         for($i = 1; $i<= $pages; $i++):
                                             if($i == $_GET['page']) print'<li><a class="active" href="boutique.php?page='.$i.'">'.$i.'</a></li>';
                                             else print'<li><a href="boutique.php?page='.$i.'">'.$i.'</a></li>';
                                         endfor;
                                         if(!($Next > $pages))
                                             print'<li> <a href="boutique.php?page='.$Next.'" aria-label="Next"><i class="ti-angle-right"></i></a></li>';
                                     }
                                 ?>
                             </ul>
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

        <script>
            function page_restrict(name, value)
            {
                var href = window.location.href;

                if(href.indexOf("?") > -1)
                    window.location.href = href + "&" + name + "=" + value;
                if(href.indexOf("&") > -1)
                    var  base_href = href.split("&");
                window.location.href = base_href[0] + "&" + name + "=" + value;
            }
        </script>

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
         <script src="js/jquery-ui.js"></script>

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
        <script>
            $(function() {
                $( '#searchBar' ).autocomplete({
                    source: 'search-assist.php',
                });
            });
        </script>
   </body>
</html>