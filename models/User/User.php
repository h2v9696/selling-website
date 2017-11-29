<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2017
 * Time: 8:25 PM
 */
use DB\Query as query;

class User
{
    private $user_name;
    private $password;
    private $first_name;
    private $last_name;
    private $email;
    private $result;

    public function __construct($user_name, $pwd, $first = null, $last = null, $email = null)
    {
        $this->user_name = $user_name;
        $this->password = $pwd;
        $this->first_name = $first;
        $this->last_name = $last;
        $this->email = $email;
    }

    //Kiem tra user_name co ton tai khong
    public function checkUsername()
    {
        $result = new query("SELECT * FROM users WHERE user_name = '$this->user_name'");
        $number_result = $result->getNumRow();
        if($number_result < 1){
            return false;
        }
        else return true;
    }

    //Kiem tra mat khau khi login
    public function checkPassword()
    {
        $result = new query("SELECT * FROM users WHERE user_name = '$this->user_name'");

        if($rows = $result->fetch())
        {
            //De-hasing the password
            $hashedPwdCheck = password_verify($this->password, $rows[0]['password']);
            if ($hashedPwdCheck == false) {
                return false;
            }
        }
        return true;
    }

    public function login()
    {
        if ($this->checkUsername() && $this->checkPassword()) {
            // Log in the user here
            $_SESSION['user_name'] = $this->user_name;
            return true;
        } else {
            return false;

        }
    }
    //Kiem tra username co ton tai khong
    public function checkExistedUser()
    {
        $result = new query("SELECT * FROM users WHERE user_name = '$this->user_name' OR email = '$this->email'");

        $number_result = $result->getNumRow();
        if($number_result > 0){
            return false;
        }
        else return true;
    }
    //Them tai khoan moi
    public function create()
    {
        // Hashing the password
        $hashedPwd = password_hash($this->password, PASSWORD_DEFAULT);
        //Loai bo ki tu dac biet de dung trong cau truy van SQL

        // Insert the user into the database
        new query("INSERT INTO users (user_name, password, fisrt_name, last_name, email) 
                        VALUES ('$this->user_name', '$hashedPwd', '$this->first_name','$this->last_name', '$this->email');");

    }
}