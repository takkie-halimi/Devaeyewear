<?php

/* headers */
require_once('php/connexion.php');
session_start();

/* variables */
$username = $_POST['username'];
$password = $_POST['password'];
$error = "";
$message = "";

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


if (isset($_POST['mail_submit'])) {
    $email_Reciver = "jasper@jasper"; //email inbox address for reciving the emails
    $full_Name = $_POST['p_name'];
    $email_Sender = $_POST['mail'];
    $subject = " Message Recieved From - ".$_POST['p_name'];
    $msg = $_POST['message'];
    $headers = "From: " . $email_Sender;
    mail($email_Reciver, $subject, $msg, $headers);
    $message = "Votre message est arrivé avec succès,<br> Nous examinerons votre message bientôt.";
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
      <title>Deva - Contact</title>
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
                                                          </div>
                                                          <p><?php echo $error;?></p>
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

         <!-- Contact Section Begin -->
         <section class="contact-section spad">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-5">
                         <div class="contact-title">
                             <h4>Contactez-nous</h4>
                             <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                                 classical Latin literature from 45 BC, maki years old.</p>
                         </div>
                         <div class="contact-widget">
                             <!--<div class="cw-item">
                                 <div class="ci-icon">
                                     <i class="ti-location-pin"></i>
                                 </div>
                                 <div class="ci-text">
                                     <span>Adresse:</span>
                                     <p>60-49 Road 11378 New York</p>
                                 </div>
                             </div>
                             <div class="cw-item">
                                 <div class="ci-icon">
                                     <i class="ti-mobile"></i>
                                 </div>
                                 <div class="ci-text">
                                     <span>Téléphoner:</span>
                                     <p>+65 11.188.888</p>
                                 </div>
                             </div>-->
                             <div class="cw-item">
                                 <div class="ci-icon">
                                     <i class="ti-email"></i>
                                 </div>
                                 <div class="ci-text">
                                     <span>Email:</span>
                                     <p>bensalahnoufel@gmail.com</p>
                                 </div>
                             </div>
                             <?php if($message != ""){?>
                             <div class="cw-item">
                                 <div class="ci-text">
                                     <?php if($message != "")?>
                                     <p><?php echo $message?></p>
                                 </div>
                             </div>
                             <?php }?>
                         </div>
                     </div>
                     <div class="col-lg-6 offset-lg-1">
                         <div class="contact-form">
                             <div class="leave-comment">
                                 <h4>Laissez un commentaire</h4>
                                 <p>Notre personnel vous rappellera plus tard et répondra à vos questions. </p>
                                 <form action="" method="POST" class="comment-form">
                                     <div class="row">
                                         <div class="col-lg-6">
                                             <input type="text" name="p_name" placeholder="Votre nom">
                                         </div>
                                         <div class="col-lg-6">
                                             <input type="text" name="mail" placeholder="Votre email">
                                         </div>
                                         <div class="col-lg-12">
                                             <textarea name="message" placeholder="Votre message"></textarea>
                                             <button type="submit" name="mail_submit" class="site-btn">Envoyer le message</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
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
                        <img src="images/instagram.jpg">
                    </div>
                    <div class="col-lg-5">
                        <div class="newslatter-item">
                            <h5>Rejoignez notre newsletter maintenant</h5>
                            <p>Recevez des mises à jour par e-mail sur notre dernière boutique.</p>
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
         <!-- Nav bar backround -->
   </body>
</html>