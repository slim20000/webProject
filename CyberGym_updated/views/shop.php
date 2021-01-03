<?php
include('../controller/produitC.php');
include('../controller/categoryC.php');

$produitC=new produitC();
$listeProduit=$produitC->afficherProduit();

$categoryC=new categoryC();
$listeCategory=$categoryC->afficherCategory();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CyberGym | Store</title>
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
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/all.min.css">
    <link rel="stylesheet" href="style/css/style.css" type="text/css" media="all" />
    <link href="style/css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet">
</head>

<body>
    <?php
    include('header.php');
    ?>
    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-3">
            <div class="row">
                    <div class="search-bar w3layouts-newsletter">
                        <h3 class="sear-head">Search Here..</h3>
                        <?php
                        $pdo_conn = new PDO( 'mysql:host=localhost;dbname=cybergym', 'root', '' );
                        $search_keyword = '';
                        if(!empty($_POST['search']['keyword'])) 
                        {
                            $search_keyword = $_POST['search']['keyword'];
                        }

                        $sql = 'SELECT * FROM products WHERE name LIKE :keyword ORDER BY id ASC ';
                        $query = $sql;
                        $pdo_statement = $pdo_conn->prepare($query);
                        $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
                        $pdo_statement->execute();
                        $listeProduit = $pdo_statement->fetchAll();
                        ?>
                        <form action="" method="post" class="d-flex">
                            <input type="text" placeholder="Product name..." name="search[keyword]"
                                value="<?php echo $search_keyword; ?>" class="form-control" required="">
                            <button class="btn">
                                <span class="fa fa-search" aria-hidden="true"></span>
                            </button>
                        </form>
                        <div class="left-side">
                            <br>
                            <br>
                            <h3 class="sear-head">Price</h3>
                            <ul class="w3layouts-box-list">
                                <li>
                                    <input type="checkbox" class="checked"
                                        onclick='window.location.assign("sortPriceDESC.php")' />
                                    <span class="span">Price Descending</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked"
                                        onclick='window.location.assign("sortPriceASC.php")' />
                                    <span class="span">Price Ascending</span>
                                </li>
                            </ul>
                        </div>
                        <div class="customer-rev left-side my-4">
                            <h3 class="sear-head">Customer Review</h3>
                            <ul class="w3layouts-box-list">
                                <li>
                                    <?PHP
                                        foreach($listeCategory as $category){
                                    ?>
                                    <form method="POST" action="productCategory.php">
                                        <span class="<?php echo $category['icon']?>" aria-hidden="true"></span>
                                        <input type="submit" class="btn" name="Show Events"
                                            value="<?PHP echo $category['categoryName']; ?>">
                                        <input type="hidden" value=<?php echo $category['categoryName']?>
                                            name="category">
                                    </form>
                                    <?PHP
                                        }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                <div class="left-ads-display col-lg-8">
                    <div class="row">

                        <?PHP
                            if(!empty($listeProduit)) {
                            foreach($listeProduit as $prod){
                            ?>
                        <div class="col-md-4 product-shoe-info col shoe text-center">
                            <div class="men-thumb-item">
                                <img src="img/store/<?PHP echo $prod['image']; ?>" class="img-fluid" alt="">
                            </div>
                            <div class="item-info-product">
                                <h3>
                                    <a href="shop-single.php?id=<?PHP echo $prod['id']; ?>">
                                        <?PHP echo $prod['name']; ?>
                                    </a>
                                </h3>
                                <div class="product_price">
                                    <div class="grid-price">
                                        <span class="money">
                                            <?PHP echo $prod['price']; ?> Dt
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
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('footer.php');
    ?>
</body>

</html>