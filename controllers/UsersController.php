<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2017
 * Time: 10:08 PM
 */

require_once('models/User/User.php');

use DB\Database;

class UsersController
{
    //Hien thi form signup
    public function create()
    {
        require_once('views/users/signup.php');
    }
    //kiem tra signup
    public function signup() {
        if (isset($_POST['signup'])){
            $conn = Database::getInstance()->connection;
            $first = mysqli_real_escape_string($conn, $_POST['first']);
            $last = mysqli_real_escape_string($conn, $_POST['last']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
            $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

            // Error handlers
            // Check for empty fields
            if(empty($first) || empty($last) || empty($email) || empty($user_name) || empty($pwd)){
                echo '<p align="center"><font color="red">The field cannot empty</font></p>';
            }
            else{
                // Check if input characters are valid
                if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last) ){
                    echo '<p align="center"><font color="red">Valid character</font></p>';
                }
                else
                {
                    // Check if email is valid
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        echo '<p align="center"><font color="red">Invalid Email format</font></p>';
                    }
                    else
                    {
                        if(strlen($pwd) < 6){
                            echo '<p align="center"><font color="red">Password too short (at least 6 characters)</font></p>';
                        }
                        else
                        {
                            $user = new User($user_name, $pwd, $first, $last, $email);
                            if($user->checkExistedUser())
                            {
                                $user->create();
                                echo '<p align="center"><font color="green">Signup Success</font></p>';
                                echo '<meta http-equiv="refresh" content="0.5;url=http://localhost/final">';
                                $user->login();
                            } else {
                                echo '<p align="center"><font color="red">Username or email already used</font></p>';
                            }
                        }
                    }
                }
            }
        }
    }
    //Hien thi form login
    public function show_login() {
        require_once('views/users/login.php');
    }
    //Dang nhap user
    public function login()
    {
        if(isset($_POST['login']))
        {
            $conn = Database::getInstance()->connection;
            $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
            $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

            $user = new User($user_name, $pwd);
            if ($user->login()) {
                echo '<p align="center"><font color="green">Login Success! Welcome to Selling Website</font></p>';
                echo '<meta http-equiv="refresh" content="0.5;url=http://localhost/final">';
            } else {
                $_SESSION['Login_Error'] = 1;
            }
        }
    }
    //Dang xuat
    public function logout()
    {
        // unset all variables inside browser
        session_unset();
        session_destroy();
        echo '<p align="center"><font color="green">Logout Success</font></p>';
        echo '<meta http-equiv="refresh" content="0.5;url=http://localhost/final">';
        exit();
    }
}