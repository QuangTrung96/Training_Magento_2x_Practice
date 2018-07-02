<?php

namespace App\library;

class Database
{
    private $_hostname = 'localhost';
    private $_userhost = 'root';
    private $_passhost = '';
    private $_dbname = 'Test_Index';
    protected $_table;
    private $_conn;
    private $_result;

    public function connect() {
        try {
            $this->_conn = new \PDO("mysql:host=$this->_hostname;dbname=$this->_dbname", $this->_userhost, $this->_passhost, array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            ));
            $this->_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }

    public function disconnect() {
        if ($this->_conn) {
            $this->_conn = null;
        }
    }

    public function query($sql) {
        $this->_result = $this->_conn->query($sql);
    }
    

    public function num_rows() {
    
        if ($this->_result) {
            $row = $this->_result->rowCount();
        } else {
            $row = 0;
        }
        return $row;
    }

    public function fetch() {
    
        if ($this->_result) {
            $row = $this->_result->fetch(\PDO::FETCH_ASSOC);
        } else {
            $row = 0;
        }
        return $row;
    }

    public function fetchAll() {
        if ($this->_result) {
            $data = $this->_result->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $data = 0;
        }
        return $data;
    }

}
