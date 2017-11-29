<?php
//namespace Controller;
use Product\Product;
use Sort\iSort;
use Sort\MultiAlphaSort;
use Sort\MultiNumberSort;

class ProductsController
{
    //Show all products
    public function index()
    {
        $products = Product::getAllProduct();
        require_once('views/products/index.php');
    }
    //Show all type
    public function indexType()
    {
        $types = Product::getAllType();
        require_once('views/products/category.php');
    }
    //search with keyword
    public function search() {
        if (isset($_GET['keyword']))
        {
            $keyword = $_GET['keyword'];
        }

        if (!empty($keyword))
        {
            $products = Product::getProductBy($keyword);
            $products = Product::sortProducts($products, new MultiAlphaSort('product_name','ascending'));

            require_once('views/products/index.php');
        }
    }
    public function showByType() {
        if (isset($_GET['type']))
        {
            $type = $_GET['type'];
            $products = Product::getProductsByType($type);
            $products = Product::sortProducts($products, new MultiAlphaSort('product_name','ascending'));

            require_once('views/products/index.php');
        }
    }

    public function show() {
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];

            $product = Product::getProductByID($id)[0];
            if (!empty($product))
                require_once('views/products/show.php');
        }
    }
}