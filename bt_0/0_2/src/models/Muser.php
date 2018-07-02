<?php
namespace App\models;

use App\library\Database;

class Muser extends Database
{

    private $_username;

    private $_password;

    private $_level;

    protected $_table = "users";

    public function __construct() {
        $this->connect();
    }

    /**
     *
     * @return mixed
     */
    public function getUsername() {
        return $this->_username;
    }

    /**
     *
     * @return mixed
     */
    public function getPassword() {
        return $this->_password;
    }

    /**
     *
     * @return mixed
     */
    public function getLevel() {
        return $this->_level;
    }

    /**
     *
     * @param mixed $_username
     */
    public function setUsername($_username) {
        $this->_username = $_username;
    }

    /**
     *
     * @param mixed $_password
     */
    public function setPassword($_password) {
        $this->_password = $_password;
    }

    /**
     *
     * @param mixed $_level
     */
    public function setLevel($_level) {
        $this->_level = $_level;
    }


    public function listAllAccount() {
        $sql = "select * from " . $this->_table . " order by id desc";
        $this->query($sql);
        return $this->fetchAll();
    }

    
    
    public function insertUser() {
        for($i = 1; $i <= 100000; $i++) {
            $sql = "INSERT INTO " . $this->_table . "(`username`, `password`, `level`) 
            values('Hello " . $i . "', '" . md5($i) . "', '" . rand(1, 2) . "')";
            $this->query($sql);
        }
    }
    
} 
