<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2017
 * Time: 4:52 PM
 */
use Product\Product;

class PagesController {
    //Show home
    public function home() {
        $products = Product::getAllProduct();

        require_once('views/pages/home.php');
        require_once('views/products/index_home.php');
    }
    //Show error
    public function error() {
        require_once('views/pages/error.php');
    }

    //Show about
    public function about() {
        require_once('views/pages/about.php');
    }
}