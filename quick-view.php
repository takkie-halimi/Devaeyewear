<!--  Copyright (C) 2021 Halimi Takkie Eddine  <takkie8halimi@gmail.com> -->
<?php

/* headers */
require_once('php/connexion.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Product View</title>
    <link rel="icon" href="images/logo/logo.ico"/>
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="hamburger-box button mobile-toggle"></div>

    <!-- Quick View Modal -->
    <div class="container">
        <div class="product-details">
            <!-- Product Details Left -->
            <?php
            if(isset($_GET['id'])) $id = $_GET['id'];
            $sub_dir = "product-".$id."";
            $connexion = OpenConnexion();
            $query = ("SELECT
                           p.pname,
                           p.pAPrice,
                           p.pPPrice,
                           p.sexe,
                           p.pImageName,
                           pi.p_img1,
                           pi.p_img2,
                           pi.p_img3,
                           pi.p_img4
                       FROM product AS p LEFT JOIN product_images pi ON pi.pImageName = p.pImageName
                       WHERE p.pId ='$id'");

            $result = mysqli_query($connexion,$query);
            $row = mysqli_fetch_row($result);
            ?>
            <div class="product-details-left">
                <div class="product-details-images slider-navigation-2">
                    <a href="products/<?php echo $sub_dir."/".$row[4];?>">
                        <img src="products/<?php echo $sub_dir."/".$row[4];?>" alt="product image">
                    </a>
                    <a href="products/<?php echo $sub_dir."/".$row[5];?>">
                        <img src="/products/<?php echo $sub_dir."/".$row[5];?>" alt="product image">
                    </a>
                    <a href="products/<?php echo $sub_dir."/".$row[6];?>">
                        <img src="products/<?php echo $sub_dir."/".$row[6];?>" alt="product image">
                    </a>
                    <a href="products/<?php echo $sub_dir."/".$row[7];?>">
                        <img src="products/<?php echo $sub_dir."/".$row[7];?>" alt="product image">
                    </a>
                    <a href="products/<?php echo $sub_dir."/".$row[8];?>">
                        <img src="products/<?php echo $sub_dir."/".$row[8];?>" alt="product image">
                    </a>
                </div>
                <div class="product-details-thumbs slider-navigation-2">
                    <img src="products/<?php echo $sub_dir."/".$row[4];?>" alt="product image thumb">
                    <img src="products/<?php echo $sub_dir."/".$row[5];?>" alt="product image thumb">
                    <img src="products/<?php echo $sub_dir."/".$row[6];?>" alt="product image thumb">
                    <img src="products/<?php echo $sub_dir."/".$row[7];?>" alt="product image thumb">
                    <img src="products/<?php echo $sub_dir."/".$row[8];?>" alt="product image thumb">
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
                                $<?php echo $row[1];?>
                                <span>$<?php echo $row[2];?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-details-size">
                    <span>Size :</span>
                    <ul>
                        <li class="checked"><span>S</span></li>
                        <li><span>M</span></li>
                        <li><span>L</span></li>
                        <li><span>XL</span></li>
                        <li><span>XXL</span></li>
                    </ul>
                </div>
                <div class="product-details-categories">
                    <span>Categories :</span>
                    <ul>
                        <li><a href="shop.html">All</a></li>
                        <li><a href="shop.html"><?php echo $row[3];?></a></li>
                    </ul>
                </div>
                <div class="product-details-socialshare">
                    <span>Share :</span>
                    <ul>
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="product-details-quantity">
                    <a href="#" class="add-to-cart-button">
                        <span>Acheter Maintenant</span>
                    </a>
                </div>
            </div>
            <!--// Product Details Right -->
            <button class="close-quickview-modal"><i class="fa fa-close"></i></button>
        </div>
    </div>
    <?php CloseConnexion($connexion); ?>

    <!-- Scripts section
    ------------------------------------------- //-->
    <!-- Scripts for Product Quickview -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <!-- ------------------------------------------- -->
    <!-- Nav bar backround -->
</body>
</html>
