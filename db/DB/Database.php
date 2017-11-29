<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2017
 * Time: 11:05 AM
 */

namespace DB;


class Database
{
    protected $host;
    protected $database;
    protected $username;
    protected $password;
    public $connection = NULL;

    function __construct($settings = array()) {
        $this->host        = $settings['host'];
        $this->database 	= $settings['database'];
        $this->username 	= $settings['username'];
        $this->password 	= $settings['password'];
        /**
         * if connection already created just return resource_id
         * else create new one
         */
        if(is_null($this->connection)) {
            $this->getConnection();
        }
        return $this->connection;
    }

    function __destruct() {
        @mysqli_close($this->connection);
    }
    // Singleton partern
    private static $instance = NULl;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            global $DB_SETTINGS;
            self::$instance = new Database($DB_SETTINGS);
        }
        return self::$instance;
    }

    public function getConnection(){
        /**
         * Native php function to create db_connection
         */
        $this->connection = @mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if(!$this->connection) {
            die("Unable to create connection, Server might be too busy or check your credentials!");
        }

        return $this;
    }
}