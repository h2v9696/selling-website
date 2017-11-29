<?php

require_once __DIR__.'/vendor/autoload.php';
use Product\Product;
require_once('config.php');
function call($controller, $action) {
    // require the file that matches the controller name
    //echo 'controllers/' . ucwords($controller) . 'Controller.php';
    require_once('controllers/' . ucwords($controller) . 'Controller.php');
    // create a new instance of the needed controller
    switch($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'products':
            // we need the model to query the database later in the controller
            $controller = new ProductsController();
            break;
        case 'users':
            require_once('models/User/User.php');
            $controller = new UsersController();
            break;
        case 'carts':
            $controller = new CartsController();
            break;
        case 'payments':
            $controller = new PaymentsController();
            break;
    }
    // call the action
    $controller->{ $action }();
}

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array(
    'pages' => ['home', 'error', 'about'],
    'products' => ['index', 'show', 'showByType', 'indexType', 'show'],
    'users' => ['create', 'signup', 'login', 'logout', 'show_login'],
    'carts' => ['show','addToCart','removeFromCart'],
    'payments' => ['show_payment','payment','show_card_payment','card_payment']
);
if(!empty($_POST['index']) && !empty($_POST['order']))
{
    //Handle sort search products
    include_once 'views/products/sort_products.php';
} else
if (isset($_POST['signup']))
{
    //Handle signup
    call('users','signup');
    include_once 'views/users/signup.php';

} else
if (isset($_POST['pay']))
{
    call('payments','payment');
} else
if (isset($_POST['card_buy']))
{
    call('payments','card_payment');
} else

// If have keyword, call search
if (isset($_GET['keyword']))
{
    call('products','search');
} else
    //Handle login logout
if (isset($_POST['login']))
{

    call('users','login');
    include_once 'views/users/login.php';


} else
if (isset($_POST['logout']))
{
    call('users','logout');
}
else {
    // check that the requested controller and action are both allowed
    // if someone tries to access something else he will be redirected to the error action of the pages controller
    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            call($controller, $action);
        } else {
            call('pages', 'error');
        }
    } else {
        call('pages', 'error');
    }
}


