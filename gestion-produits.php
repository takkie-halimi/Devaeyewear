<?php
/* headers */
require_once ('php/connexion.php');
session_start();



if(isset($_POST['a_submit'])) {
    $connexion = OpenConnexion();
    $query = "SELECT pId FROM product ORDER BY pId DESC LIMIT 1";
    $result = mysqli_query($connexion, $query);
    $row = mysqli_fetch_row($result);
    $count = mysqli_num_rows($result);

    /* Folder Parameters */
    if($count == 0) $id = 1;
    else $id = intval($row[0]) + 1;
    $sub_dir = "product-".$id;
    $main_dir = "products/".$sub_dir."/";

    if(!empty($_POST['product_name']) && !empty($_POST['p_price']) && !empty($_POST['a_price']) && !empty($_POST['sexe'])) {

        if($_FILES['indexImage']['size'] != 0 && $_FILES['images']['size'] != 0) {
            if (is_dir("products/" . $sub_dir) === false)
                mkdir("products/" . $sub_dir);

            $indexExt = pathinfo($_FILES['indexImage']['name'], PATHINFO_EXTENSION);
            $indexFileName = "index-" . $id . "." . $indexExt;

            $imagesNames = array();
            $countFiles = count($_FILES['images']['name']);
            for ($i = 0; $i < $countFiles; $i++) {
                $ind = $i + 1;
                $ext = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
                $fileName = "product-" . $ind . "." . $ext;
                $imagesNames[$i] = $fileName;
            }
            $query = "INSERT INTO product_images 
                      values('$indexFileName',
                             '$imagesNames[0]',
                             '$imagesNames[1]',
                             '$imagesNames[2]',
                             '$imagesNames[3]')";
            $result = mysqli_query($connexion, $query);
            if (!$result) echo $connexion->error;
            else {
                move_uploaded_file($_FILES['images']['tmp_name'][0], $main_dir . $imagesNames[0]);
                move_uploaded_file($_FILES['images']['tmp_name'][1], $main_dir . $imagesNames[1]);
                move_uploaded_file($_FILES['images']['tmp_name'][2], $main_dir . $imagesNames[2]);
                move_uploaded_file($_FILES['images']['tmp_name'][3], $main_dir . $imagesNames[3]);
            }
            CloseConnexion($connexion);

            $connexion = OpenConnexion();
            $query = "INSERT INTO product(
                       pId,
                       pName,
                       pPPrice,
                       PAPrice,
                       sexe,
                       pImageName)
                       VALUES('$id',
                             '".$_POST['product_name']."',
                             '".$_POST['p_price']."',
                             '".$_POST['a_price']."',
                             '".$_POST['sexe']."',
                             '$indexFileName')";
            $result = mysqli_query($connexion, $query);
            if (!$result) echo $connexion->error;
            else move_uploaded_file($_FILES["indexImage"]["tmp_name"], $main_dir . $indexFileName);
            CloseConnexion($connexion);
        }
    }
}

if(isset($_POST['u_submit'])) {

    $id = $_GET['id'];
    if(isset($_POST['uproduct_name']) || isset($_POST['up_price']) || isset($_POST['ua_price']) || isset($_POST['usexe'])) {

        $product_name = $_POST['uproduct_name'];
        $p_price = $_POST['up_price'];
        $a_price = $_POST['ua_price'];
        $sexe = $_POST['usexe'];

        $connexion = OpenConnexion();
        $query = "UPDATE product SET 
                       pName='$product_name',
                       pPPrice='$p_price',
                       pAPrice='$a_price',
                       sexe='$sexe'
                  WHERE pId ='$id'";
        mysqli_query($connexion, $query);
        CloseConnexion($connexion);
    }
}

if(isset($_POST['d_submit'])) {
    $id = $_GET['id'];
    $sub_dir = "product-".$id."";
    $connexion = OpenConnexion();
    $query = "DELETE FROM product WHERE pId = '$id'";
    mysqli_query($connexion, $query);
    $pImageName = 'index-' . $id . '.jpg';
    $query = "DELETE FROM product_images WHERE pImageName='$pImageName'";
    mysqli_query($connexion, $query);
    CloseConnexion($connexion);
    system("rm -rf " . escapeshellarg("products/" . $sub_dir));
    header("location: gestion-produits.php");
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
      <title>Gestion des Produits</title>
      <link rel="icon" href="images/logo/logo.ico"/>
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                 <button type="button" class="btn btn-social-icon btn-youtube btn-rounded">
                    <i class="fa fa-youtube-play"></i>
                 </button>
              </div>
           </div>
           <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <button style="width:auto; border: none; background: none;">
                          <a class="nav-link" href="php/logout.php"><i class="fa fa-sign-out"></i>
                              <?php
                              if(!$_SESSION["username"]) header('Location: index.php');
                              else echo $_SESSION['username']?>
                          </a>
                      </button>
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

     <div class="product_review g-prd" >
         <div class="container">
             <h2>Bienvenue dans la gestion des produits</h2></br></br>
             <div class="row">
                 <div class="col-lg-12">
                     <div class="description_nav nav nav-tabs d-block" id="mytab" role="tablist">
                         <a class="active show" id="descrip-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="true"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un Produit</a>
                         <a id="nav-review" data-toggle="tab" href="#update" role="tab" aria-controls="update" aria-selected="false" class=""> <i class="fa fa-edit" aria-hidden="true"></i> Modifier un Produit</a>
                         <a id="nav-product-tag" data-toggle="tab" href="#delete" role="tab" aria-controls="delete" aria-selected="false" class=""> <i class="fa fa-trash" aria-hidden="true"></i> Supprimer un Produit</a>
                     </div>
                 </div>
             </div>
             <div class="tab_container">
                 <div class="single_review_content tab-pane fade active show" id="add" role="tabpanel">
                     <div class="content">
                         <div class="classs__review__inner">
                             <form id="myForm" action="" method="post" enctype="multipart/form-data">
                                 <div class="input__box">
                                     <h5>Nom de Produit (*)</h5>
                                     <input type="text" name="product_name" id="product_name">
                                 </div>
                                 <div class="input__box">
                                     <h5>Prix précédent (*)</h5>
                                     <input type="text" name="p_price" id="p_price">
                                 </div>
                                 <div class="input__box">
                                     <h5>prix actuel (*)</h5>
                                     <input type="text" name="a_price" id="a_price">
                                 </div>
                                 <div class="input__box">
                                     <h5>Sélectionnez le sexe (*)</h5>
                                     <select name="sexe" id="sexe" class="custom-select">
                                         <option selected>-</option>
                                         <option value="Homme">Homme</option>
                                         <option value="Femme">Femme</option>
                                     </select>
                                 </div>
                                 <br><br>
                                 <h4>Sélectionnez les images pour le téléchargement:</h4>
                                 <span>Sélectionner l'image index:</span><br>
                                 <input  type="file" name="indexImage" id="indexImage" oninput="pic.src=window.URL.createObjectURL(this.files[0])"><br>
                                 <div class="image-preview"><img id="pic" src="#" alt="image index"/></div><br>
                                 Sélectionnez les compléments:<br>
                                 <input  type="file" name="images[]" id="images" multiple>
                                 <div class="gallery"></div>
                                 <input class="valid_btn" type="submit" id="a_submit" name="a_submit" value="Ajouter un Produit">
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="single_review_content tab-pane fade" id="update" role="tabpanel">
                     <div class="content">
                         <div class="classs__review__inner">
                             <form action="" method="post" enctype="multipart/form-data">
                                 <?php
                                     $connexion = OpenConnexion();
                                     $query = "SELECT pId FROM product ORDER BY pId";
                                     $result = mysqli_query($connexion, $query);
                                 ?>
                                 <div class="input__box">
                                     <h4>Choisissez le produit à modifier </h4>
                                     <div class="wrapper">
                                         <select name="" id="up_id" class="form-control" onfocus="this.size=5;" onblur="this.size=1;"  onchange="update_product(this.value);">
                                             <option selected>-</option>
                                             <?php
                                             if ($result->num_rows > 0) {
                                                 while($row = mysqli_fetch_row($result))
                                                     print'<option value="' . $row[0] . '">' . $row[0] . '</option>';
                                             }
                                                 CloseConnexion($connexion);
                                             ?>
                                         </select>
                                     </div>
                                 </div>
                                 <?php
                                     $id = $_GET['id'];
                                     $sub_dir = "product-".$id."";
                                     $connexion = OpenConnexion();
                                     $query = "SELECT
                                                    p.pName,
                                                    p.pPPrice,
                                                    p.pAPrice,
                                                    p.sexe,
                                                    p.pImageName,
                                                    pi.p_img1,
                                                    pi.p_img2,
                                                    pi.p_img3,
                                                    pi.p_img4
                                                FROM product as p LEFT JOIN product_images pi on pi.pImageName = p.pImageName
                                                WHERE p.pId ='$id'";
                                     $result = mysqli_query($connexion, $query);
                                     $row = mysqli_fetch_row($result);
                                     if($sub_dir != "product-"){
                                 ?>

                                 <div class="input__box">
                                     <h5>Nom de Produit (*)</h5>
                                     <input type="text" name="uproduct_name" id="uproduct_name" value="<?php echo $row[0]?>" required>
                                 </div>
                                 <div class="input__box">
                                     <h5>Prix précédent (*)</h5>
                                     <input type="text" name="up_price" id="up_price" value="<?php echo $row[1]?>" required>
                                 </div>
                                 <div class="input__box">
                                     <h5>prix actuel (*)</h5>
                                     <input type="text" name="ua_price" id="ua_price" value="<?php echo $row[2]?>"required>
                                 </div>
                                 <div class="input__box">
                                     <h5>Sélectionnez le sexe (*)</h5>
                                     <select name="usexe" id="usexe" class="custom-select">
                                         <option>-</option>
                                         <?php
                                             if($row[3] == "Homme"){
                                                print'<option value="'.$row[3].'" selected>'.$row[3].'</option>';
                                                print'<option value="Femme">Femme</option>';
                                             }else{
                                                 print'<option value="Homme">Homme</option>';
                                                 print'<option value="'.$row[3].'" selected>'.$row[3].'</option>';
                                             }
                                         ?>
                                     </select>
                                 </div>
                                 <br><br>
                                 <h4>Representation des images de produit:</h4>
                                 <span>L'image index:</span><br>
                                 <div class="image-preview"><img id="pic" src="products/<?php echo $sub_dir."/".$row[4];?>" alt="image index"/></div><br>
                                 Les images complémentaires:<br>
                                 <div class="gallery">
                                     <img src="products/<?php echo $sub_dir."/".$row[5];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[6];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[7];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[8];?>">
                                 </div><br>
                                 <input class="valid_btn" type="submit" id="u_submit" name="u_submit" value="Valider">
                                 <?php } CloseConnexion($connexion);?>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="single_review_content tab-pane fade" id="delete" role="tabpanel">
                     <div class="content">
                         <div class="classs__review__inner">
                             <form action="" method="post" enctype="multipart/form-data">
                                 <?php
                                 $connexion = OpenConnexion();
                                 $query = "SELECT pId FROM product ORDER BY pId";
                                 $result = mysqli_query($connexion, $query);
                                 ?>
                                 <div class="input__box">
                                     <h4>Choisissez le produit à supprimer </h4>
                                     <div class="wrapper">
                                         <select name="" id="sup_id" class="form-control" onfocus="this.size=5;" onblur="this.size=1;"  onchange="delete_product(this.value);">
                                             <option selected>-</option>
                                             <?php
                                             if ($result->num_rows > 0) {
                                                 while($row = mysqli_fetch_row($result))
                                                     print'<option value="' . $row[0] . '">' . $row[0] . '</option>';
                                             }
                                             CloseConnexion($connexion);
                                             ?>
                                         </select>
                                     </div>
                                 </div>
                                 <?php
                                 $id = $_GET['id'];
                                 $sub_dir = "product-".$id."";
                                 $connexion = OpenConnexion();
                                 $query = "SELECT
                                                    p.pName,
                                                    p.pPPrice,
                                                    p.pAPrice,
                                                    p.sexe,
                                                    p.pImageName,
                                                    pi.p_img1,
                                                    pi.p_img2,
                                                    pi.p_img3,
                                                    pi.p_img4
                                                FROM product as p LEFT JOIN product_images pi on pi.pImageName = p.pImageName
                                                WHERE p.pId ='$id'";
                                 $result = mysqli_query($connexion, $query);
                                 $row = mysqli_fetch_row($result);

                                 if($sub_dir != "product-"){?>
                                 <div class="input__box"><h5>Nom de Produit : <?php print $row[0];?></h5></div>
                                 <div class="input__box"><h5>Prix Précédent : $<?php echo $row[1];?></h5></div>
                                 <div class="input__box"><h5>Prix Actuel : $<?php echo $row[2];?></h5></div>
                                 <div class="input__box"><h5>Ce Produit Orienté pour : <?php echo $row[3];?></h5></div>
                                 <br><br>
                                 <h4>Representation des Images de Produit:</h4>
                                 <span>L'image index:</span><br>
                                 <div class="image-preview"><img id="pic" src="products/<?php echo $sub_dir."/".$row[4];?>" alt="image index"/></div><br>
                                 Les Images Complémentaires:<br>
                                 <div class="gallery">
                                     <img src="products/<?php echo $sub_dir."/".$row[5];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[6];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[7];?>">
                                     <img src="products/<?php echo $sub_dir."/".$row[8];?>">
                                 </div><br>
                                 <input class="valid_btn" type="submit" name="d_submit" id="d_submit" value="Supprimer">
                                 <?php }?>
                             </form>
                         </div>
                     </div>
                 </div>
                 <?php CloseConnexion($connexion);?>
                     </div>
                 </div>
             </div>
         </div>
     </div><br><br>
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
                             <li><i class="ti-location-pin"> 60-49 Road 11378 New York</i></li>
                             <li><i class="ti-mobile"> +65 11.188.888</i></li>
                             <li><i class="ti-email"> hellocolorlib@gmail.com</i></li>
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


     <!-- Success Modal HTML -->
     <div id="s_Modal" class="modal fade">
         <div class="modal-dialog modal-confirm">
             <div class="modal-content">
                 <div class="modal-header">
                     <div class="icon-box">
                         <i class="material-icons">&#xE876;</i>
                     </div>
                     <h4 class="modal-title">Awesome!</h4>
                 </div>
                 <div class="modal-body">
                     <p class="text-center">Le Produit a été Ajouté Avec Succès.</p>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                 </div>
             </div>
         </div>
     </div>

     <!-- error Modal HTML -->
     <div id="e_Modal" class="modal fade">
         <div class="modal-dialog modal-confirm-e">
             <div class="modal-content">
                 <div class="modal-header">
                     <div class="icon-box">
                         <i class="material-icons">&#xE5CD;</i>
                     </div>
                     <h4 class="modal-title">Pardon!</h4>
                 </div>
                 <div class="modal-body">
                     <p class="text-center">Les Champs Nécessaires Sont Vides.</p>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
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
     <script src="js/manipul.js"></script>

</body>
</html>