<?php
/**
 * Created by PhpStorm.
 * User: khanh
 * Date: 11/22/2017
 * Time: 7:58 PM
 */
namespace Cart;
use DB\Query as query;
use Product\Product;
use Psr\Log\NullLogger;

class Cart
{
    static public function checkExistInCart( $product)
    {
        //if nothing in cart
        if ($_SESSION['Cart']['CountItem'] == 0) return -1;

        //if have something in cart, check it
        for($i = 0; $i < $_SESSION['Cart']['CountItem'];$i++)
        {
            if(!isset($_SESSION['Cart']['List'][$i]['Product_ID'])) {
                return -1;
            }
            else if($_SESSION['Cart']['List'][$i]['Product_ID'] == $product['product_id'])
            {
                return $i;
            }
        }
        return -1;
    }

    static public function addToCart($product, $quanlity)
    {
        // check if item have in cart or not
        $isInCart = Cart::checkExistInCart($product);
        if($isInCart < 0) {
            // if it not been in cart, add it to cart
            $_SESSION['Cart']['List'][$_SESSION['Cart']['CountItem']] = array(
                'Product_ID' => $product['product_id'],
                'Product_name' => $product['product_name'],
                'Product_img' => $product['image'],
                'Product_price' => $product['price'],
                'Quanlity' => $quanlity
            );
            $_SESSION['Cart']['CountItem'] = 1 + (isset($_SESSION['Cart']['CountItem']) ? $_SESSION['Cart']['CountItem'] : 0);
        }
        else
        {
            // if it had been in cart, only update quanlity
            $_SESSION['Cart']['List'][$isInCart]['Quanlity'] += $quanlity;
        }
    }

    static public function removeFromCart($product, $quanlity)
    {
        for($i = 0; $i < $_SESSION['Cart']['CountItem'];$i++)
        {
            if(isset($_SESSION['Cart']['List'][$i])) {
                if ($_SESSION['Cart']['List'][$i]['Product_ID'] == $product['product_id']) {
                    // remove $quanlity of $product in cart
                    $_SESSION['Cart']['List'][$i]['Quanlity'] -= $quanlity;

                    // if $quanlity < 0, remove it from cart
                    if ($_SESSION['Cart']['List'][$i]['Quanlity'] <= 0) {
                        unset($_SESSION['Cart']['List'][$i]);
                        $_SESSION['Cart']['CountItem']--;
                    }
                }
            }
        }
    }
    //Tra ve cac item trong Cart
    static public function showItemList()
    {
        return $_SESSION['Cart']['List'];
    }
    //Reset Cart ve ban dau
    static public function resetCart(){
        unset($_SESSION['Cart']['List']);
        $_SESSION['Cart']['CountItem'] = 0;
    }

}