<?php
include('../controller/produitC.php');

$produitC=new produitC();
$listeProduit=$produitC->afficherProduit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CyberGym | Store</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>

    <!-- header -->
    <?php
    include('header.php');
    ?>
    <!--//header-->
    <section class="about py-md-5 py-5">
        <div class="container-fluid">
            <div class="feature-grids row px-3">
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"><span class="fa fa-truck" aria-hidden="true"></span>
                        </div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">FREE SHIPPING</h3>
                            <p>On all order over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row bottom-gd2">
                        <div class="icon-gd col-md-3 text-center"><span class="fa fa-bullhorn"
                                aria-hidden="true"></span></div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">FREE RETURN</h3>
                            <p>On 1st exchange in 30 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"> <span class="fa fa-gift" aria-hidden="true"></span>
                        </div>

                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">MEMBER DISCOUNT</h3>
                            <p>Save up to $25%</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"> <span class="fa fa-usd" aria-hidden="true"></span>
                        </div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">PREMIUM SUPPORT</h3>
                            <p>Support 24 hours per day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner -->
    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-3">
            <div class="row">
                <!-- search -->
                <div class="side-bar col-lg-4">
                    <div class="search-bar w3layouts-newsletter">
                        <h3 class="sear-head">Search Here..</h3>
                        <form action="" method="post" class="d-flex">
                            <input type="search" placeholder="Product name..." name="search" class="form-control"
                                required="">
                            </form>
                    </div>
                </div>     
                <!-- product right -->
                <div class="left-ads-display col-lg-8">
                    <div class="row">
                        <div class=" product-men row">
                            <?PHP
                        foreach($listeProduit as $prod){
                        ?>
                            <div class="col-md-4 product-shoe-info col shoe text-center">
                                <div class="men-thumb-item">
                                    <img src="../img/store/<?PHP echo $prod['image']; ?>" class="img-fluid" alt="">
                                </div>
                                <div class="item-info-product">
                                    <h3>
                                        <a href="shop-single.html">
                                            <?PHP echo $prod['name']; ?>
                                        </a>
                                    </h3>
                                    <h5>
                                        <?PHP echo $prod['description']; ?>
                                    </h5>
                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money">$
                                                <?PHP echo $prod['price']; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money">Quantity :
                                                <?PHP echo $prod['quantity']; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="stars">
                                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                        <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <?PHP
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
    <!-- footer -->
    <?php
    include('footer.php');
    ?>
    <!-- //footer -->
</body>

</html>