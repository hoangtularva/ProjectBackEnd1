<?php
class ProductModel extends Db
{
    // Lấy tát cả sản phẩm
    public function getProductList($perPage, $page)
    {
        $start = ($page - 1) * $perPage;
        // Bước 2: Tạo câu query
        $sql = parent::$connection->prepare("SELECT * FROM product LIMIT $start, $perPage");
        return parent::select($sql);
    }

    // Lấy tổng sản phảm
    public function getTotalProduct()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(product_id) FROM product");
        return parent::select($sql)[0]['COUNT(product_id)'];
    }

    //Lấy sp theo ID
    public function getProductByID($id)
    {
        $sql = parent::$connection->prepare('SELECT * FROM product WHERE product_id=?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    //Láy sp theo danh mục
    public function getProductByCategory($catId)
    {
        $sql = parent::$connection->prepare('SELECT * FROM product INNER JOIN product_category ON product.product_id = product_category.product_id WHERE product_category.category_id = ?');
        $sql->bind_param('i', $catId);
        return parent::select($sql);
    }

    //Láy sp theo từ khóa
    public function searchProduct($keyword)
    {
        $search = "%{$keyword}%";
        $sql = parent::$connection->prepare('SELECT * FROM product WHERE product_name LIKE ?');
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }

    //Tạo thêm sản phẩm
    public function addProduct($productName, $productPrice, $productDescription, $productImage)
    {
        $sql = parent::$connection->prepare('INSERT INTO `product` (`product_name`,
         `product_price`, `product_description`, `product_image`) VALUES (?, ?, ?, ?)');
        $sql->bind_param('sdss', $productName, $productPrice, $productDescription, $productImage);

        //Thực thi câu truy vấn
        return $sql->execute();
    }

    //Sửa thông tin sản phẩm
    public function updateProduct($productName, $productPrice, $productDescription, $productImage, $productId)
    {
        $sql = parent::$connection->prepare('UPDATE `product` SET `product_name` = ?, `product_price` = ?, `product_description` = ?, `product_image` = ? WHERE `product`.`product_id` = ?');
        $sql->bind_param('sdssi', $productName, $productPrice, $productDescription, $productImage, $productId);

        //Thực thi câu truy vấn
        return $sql->execute();
    }

    //Xóa sản phầm
    public function deleteProduct($proId)
    {
        $sql = parent::$connection->prepare('DELETE FROM `product` WHERE `product`.`product_id` = ?');
        $sql->bind_param('i', $proId);
        //Thực thi câu truy vấn
        return $sql->execute();
    }
}
