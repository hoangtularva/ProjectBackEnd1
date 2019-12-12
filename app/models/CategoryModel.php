<?php
    class CategoryModel extends Db{
        public function getCategoryList(){
            $sql = parent::$connection->prepare('SELECT * FROM category');
            return parent::select($sql);
        }
        public function getNameCategory($id){
            $sql = parent::$connection->prepare('SELECT * FROM category inner join product_category on product_category.product_id WHERE product_category.product_id=?');
            $sql->bind_param('i', $id);            
            return parent::select($sql)[0];
        }
    }
?>