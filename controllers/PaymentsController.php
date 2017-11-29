<?php
/**
 * Created by PhpStorm.
 * User: khanh
 * Date: 11/29/2017
 * Time: 12:23 PM
 */
use Product\Product;
use Cart\Cart;
use DB\Query as query;

class PaymentsController
{
    private $error_payment = false;

    public function show_payment(){
        require_once('views/payments/payment.php');
    }

    public function payment()
    {
        $this->checkPayment();
        if($this->error_payment == true){
            $this->show_payment();
        }
        else {
            if ($_POST['select_payment'] == 'deliver'){
                $this->resetCart();
                echo "<script>alert(\"Đặt hàng thành công\");</script>";
                $this->returnToHomePage();
            }

            if ($_POST['select_payment'] == 'card'){
                $this->show_card_payment();
            }
        }
    }

    public function show_card_payment(){
        require_once('views/payments/card_payment.php');
    }

    public function card_payment(){
        $this->checkCardPayment();
        if($this->error_payment == true){
            $this->show_card_payment();
        }else{
            $this->resetCart();
            echo "<script>alert(\"Đặt hàng thành công\");</script>";
            $this->returnToHomePage();
        }
    }

    // Private function region
    private function checkPayment(){
        if(isset($_SESSION['user_name'])) {
            $this->checkUserPayment();
        } else {
            $this->checkGuestPayment();
        }
    }

    private function checkUserPayment(){
        if($_POST['telephone'] == "" || $_POST['address'] == "")
        {
            $this->error_payment = true;
            echo "<div align='center'><font color='red'><h4>Please fill all field</h4></font></div><br>";
        }

        if(strlen($_POST['telephone']) < 10)
        {
            $this->error_payment = true;
            echo "<div align='center'><font color='red'><h4>Wrong phone number</h4></font></div><br>";
        }
    }

    private function checkGuestPayment(){
        if( $_POST['first'] == "" || $_POST['last'] == "" || $_POST['email'] == "" ||$_POST['telephone'] == "" || $_POST['address'] == "")
        {
            $this->error_payment = true;
            echo "<div align='center'><font color='red'><h4>Please fill all field</h4></font></div><br>";
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->error_payment = true;
            echo "<div align='center'><font color='red'><h4>Invalid email</h4></font></div><br>";
        }

        if(strlen($_POST['telephone']) < 10)
        {
            $this->error_payment = true;
            echo "<div align='center'><font color='red'><h4>Phone number cannot < 10 digits</h4></font></div><br>";
        }

    }

    private function checkCardPayment(){
        if($_POST['card_ID'] == "" || $_POST['bank'] == "")
        {
            $this->error_payment = true;
            echo "<div align='center'><font color='red'><h4>Please fill all field</h4></font></div><br>";
        }

        if(strlen($_POST['card_ID']) != 10)
        {
            $this->error_payment = true;
            echo "<div align='center'><font color='red'><h4>Wrong card ID (ID must be 10 character)</h4></font></div><br>";
        }
    }

    private function returnToHomePage(){
        $products = Product::getAllProduct();
        require_once('views/pages/home.php');
        require_once('views/products/index_home.php');
    }

    private function resetCart(){
        Cart::resetCart();
    }
}