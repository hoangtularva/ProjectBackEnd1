<?php
session_start();
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require_once './app/models/' . $className . '.php';
});

$pName = "";
$pPrice = 0;
$pDescription = "";
$pImage = "";

$notification = "";

//Lấy product theo id
$id = "";

$urlID = "";

//Update Product:
if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $urlID = "?id=$id";

    $productModels = new ProductModel();
    $item = $productModels->getProductByID($id);

    $pName = $item[0]["product_name"];
    $pPrice = $item[0]["product_price"];
    $pDescription = $item[0]["product_description"];
    $pImage = $item[0]["product_image"];
}

//Kiểm tra 0 rỗng
if (!empty($_POST["productName"]) && !empty($_POST["productPrice"]) && !empty($_POST
    ["productDescription"]) && !empty($_FILES["productImage"]["name"])) {

    $path = './public/images/' . basename($_FILES["productImage"]["name"]);

    $pName = $_POST["productName"];
    $pPrice = $_POST["productPrice"];
    $pDescription = $_POST["productDescription"];
    $pImage = $_FILES["productImage"]["name"];

    $productModels = new ProductModel();

    if (is_uploaded_file($_FILES['productImage']['tmp_name']) &&
        move_uploaded_file($_FILES['productImage']['tmp_name'], $path)) {
        //Update product:
        if (isset($_GET["id"])) {
            if ($productModels->updateProduct($pName, $pPrice, $pDescription, $pImage, $id, $path)) {
                $notification = "Updated Successfully!";
            } else {
                $notification = "Updated Failed!";
            }
        } else {
            $pImage = $_POST["oldproducImage"];
            if ($productModels->updateProduct($pName, $pPrice, $pDescription, $pImage, $id, $path)) {
                $notification = "Updated Successfully!";
            } else {
                $notification = "Updated Failed!";
            }
        }
    }

}
$productModels = new ProductModel();
$perPage = 3;
$page = 1;

if (isset($_GET['page']))
{
    $page = $_GET['page'];
}

$totalRow = $productModels->getTotalProduct();
$productList = $productModels->getProductList($perPage,$page);    
$pagination=new Pagination();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
    <title>Admin(update product)</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/managestyles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/addstyles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/updatestyles.css">
</head>

<body>
    <?php
    if (isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] == true)
    {
    ?>
    <div class="container">
        <div class="heading">
            <div class="row">
                <div class="col-md-4 left">
                    <a href="<?php echo BASE_URL; ?>/index.php">
                        <img src="<?php echo BASE_URL; ?>/public/images/logo.png" alt="logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="col-md-4 right">
                    <button type="button" class="btn btn-primary">
                        <a href="logoutadmin.php" style="color:red;">Log out</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="content" style="text-align:center;">
            <h4>Easy to use</h4>
        </div>
        <!-- Dùng post vì có nhiều thông tin, và upload hình ảnh phải dùng post -->
        <div class="update">
            <a href="manageproduct.php" class="btn btn-primary right">Manage product</a>
            <form action="updateproduct.php<?php echo $urlID; ?>" method="post" enctype="multipart/form-data">
                <br>
                <table class="table">
                    <tr class="title">
                        <td style="width:20em;">Name</td>
                        <td style="width:10em;">Price</td>
                        <td style="width:30em;">Description</td>
                        <td>Image</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="productName" id="productName" value="<?php echo $pName; ?>">
                        </td>
                        <td style="width:10em;">
                            <input type="text" name="productPrice" id="productPrice" value="<?php echo $pPrice; ?>">
                        </td>
                        <td>
                            <textarea name="productDescription"
                                id="productDescription"><?php echo $pDescription; ?></textarea>
                        </td>
                        <td>
                            <input type="hidden" name="oldproducImage" value="<?php echo $pImage; ?>">
                            <input type="file" name="productImage" id="productImage">
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary">GO</button>
                <p><?php echo $notification; ?></p>
            </form>
        </div>
        <hr>
        <table class="table">
            <tr class="title">
                <td>Product name</td>
                <td>Product price</td>
                <td>Product description</td>
                <td>Product image</td>
            </tr>
            <?php
                foreach ($productList as $item) {
            ?>
            <tr class="detail">
                <td class="name"><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['product_price']; ?></td>
                <td><?php echo $item['product_description']; ?></td>
                <td><img src="<?php echo BASE_URL; ?>/public/images/<?php echo $item["product_image"]; ?>"
                        class="img-fluid" alt=""></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            echo $pagination->createPageLinks('addproduct.php', $totalRow, $perPage, $page);
        ?>
    </div>
    <div class="support">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p><i class="far fa-hdd fa-3x"></i></p>
                    <h3>Free Shipping</h3>
                    <p>One thing we are confident will make anyone happy is our free delivery policy.</p>
                    <br>
                    <p><a class="read" href="#">Read more</a></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-headphones fa-3x"></i></p>
                    <h3>Support Online</h3>
                    <p>Besides selling complicated drones we also provide lessons on how to fly them…</p>
                    <br>
                    <p><a class="read" href="#">Contact us</a></p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="<?php echo BASE_URL; ?>/public/images/footer_logo02.png" alt="MOOX" class="img-fluid">
                </div>
                <div class="col-md-3">
                    <p class="content-1">
                        &copy; 2019 Moox. All Right Reserved.
                        <a class="content-4" href="#"> Privacy Policy.</a>
                    </p>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
                    <a href="#"><i class="fab fa-cc-visa fa-2x"></i></a>
                    <a href="#"><i class="fab fa-cc-mastercard fa-2x"></i></a>
                    <a href="#"><i class="fab fa-cc-amex fa-2x"></i></a>
                    <a href="#"><i class="fab fa-cc-paypal fa-2x"></i></a>
                    <a href="#"><i class="fab fa-cc-discover fa-2x"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <?php
    }
    else {
        //echo "Vui long dang nhap!!";
        header("location:loginadmin.php");
    }
    ?>
</body>

</html>