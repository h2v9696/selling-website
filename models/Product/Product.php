<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2017
 * Time: 2:13 PM
 */

namespace Product;

use DB\Query as query;
use Sort\iSort;
use Sort\MultiAlphaSort;
class Product
{
    public $product_id;
    public $product_name;
    public $product_detail;
    public $image;
    public $price;

    function __construct($product_id, $product_name, $product_detail, $image, $price)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_detail = $product_detail;
        $this->image = $image;
        $this->price = $price;
    }

    static function getAllProduct()
    {
        $req = new query('SELECT * FROM product');
        return $req->fetch();
    }

    static function getProductBy($name)
    {
        $req = new query("SELECT * FROM product WHERE product_name LIKE '%$name%'");
        return $req->fetch();
    }

    static function getProductByID($id)
    {
        $req = new query("SELECT * FROM product WHERE product_id LIKE '%$id%'");
        return $req->fetch();
    }

    static function getProductsByType($type) {
        $req = new query("SELECT product_id, product_name, product_detail, image, price FROM product as p NATURAL JOIN product_type as pt NATURAL JOIN type as t WHERE type_name LIKE '%$type%'");
        return $req->fetch();
    }

    static function sortProducts($products, iSort $type) {
        return $type->sort($products);
    }

    static function getAllType()
    {
        $req = new query('SELECT * FROM type');
        return $req->fetch();
    }

}