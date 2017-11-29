<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2017
 * Time: 11:56 AM
 */

namespace DB;

class Query extends Database
{
    private $resource_id;
    private $record_set;
    private $result;

    function __construct($sql){
        global $DB_SETTINGS;
        $this->record_set = Array();
        $this->resource_id = parent::__construct($DB_SETTINGS);
        $this->query($sql);
    }

    public function query($sql) {
        $this->result = mysqli_query($this->connection, $sql);
        if(!$this->resource_id){
            echo (mysqli_errno($this->connection));
            return null;
        }
        return $this;
    }

    public function fetch() {
        $record_set = Array();
        while($row = mysqli_fetch_assoc($this->result)) {
            $record_set[] = $row;
        }
        return $record_set;
    }

    public function getNumRow() {
        return mysqli_num_rows($this->result);
    }

    public function escapeString($string) {
        return mysqli_real_escape_string($this->connection, $string);
    }
}