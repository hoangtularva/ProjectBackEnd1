<?php
session_start();

require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require_once './app/models/' . $className . '.php';
});


$productModels = new ProductModel();
$perPage = 5;
$page = 1;

if (isset($_GET['page']))
{
    $page = $_GET['page'];
}


$totalRow = $productModels->getTotalProduct();
$productList = $productModels->getProductList($perPage,$page);    

$pagination = new Pagination();

$notification = "";
if (isset($_POST["productId"])) {
     if ($productModels->deleteProduct($_POST["productId"]))
     {
        $notification = "Deleted Successfully!";
     }
     else 
     {
        $notification = "Deleted Failed!";
     }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="60" > 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
    <title>Manage products</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/managestyles.css">
    <script>
    //Xác nhận xóa:
    function deleteConfirm() {
        return confirm("Do you want to delete ?");
    }
    </script>
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
        <a href="managemember.php" style="color:red;" class="btn btn-primary">Manage Members</a>
        <div class="view">
            <a href="addproduct.php" class="btn btn-primary left">Add product</a>
            <table class="table">
                <tr class="title">
                    <td>Product name</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
                <?php
                foreach ($productList as $item) {
                ?>
                <tr class="detail">
                    <td class="name"><?php echo $item['product_name']; ?></td>
                    <td>
                        <!-- Update -->
                        <a href="updateproduct.php?id=<?php echo $item['product_id']; ?>" class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <!-- Delete -->
                        <form action="manageproduct.php" method="post">
                            <input type="hidden" name="productId" value="<?php echo $item['product_id']; ?>">
                            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm();">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
            <?php
            echo $pagination->createPageLinks('manageproduct.php', $totalRow, $perPage, $page);
            ?>
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
