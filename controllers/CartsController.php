<?php
/**
 * Created by PhpStorm.
 * User: khanh
 * Date: 11/27/2017
 * Time: 10:09 PM
 */
use Product\Product;
use Cart\Cart;
use DB\Query as query;

class CartsController
{
    //Hien thi Cart
    public function show() {
        require_once('views/cart/cart.php');
    }

    public function addToCart()
    {
        $item_id = $_GET['item'];
        $Item = Product::getProductByID($item_id);

        if (!empty($Item)) {
            Cart::addToCart($Item[0], 1);

            require_once('views/cart/cart.php');
        }
    }

    public function removeFromCart(){
        $item_id = $_GET['item'];
        $Item = Product::getProductByID($item_id);
        Cart::removeFromCart($Item[0],1);

        require_once('views/cart/cart.php');
    }

}