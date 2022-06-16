<?php
namespace wcoding\batch16\finalproject\Model;

class Manager {
    protected $_connection;


    const DNAME = "batch16project";
    const HOST = "localhost";
    const LOGIN = "root";
    const PWD = "";

    protected $_user_id;

    protected function __construct() {
        $this-> _connection = new \PDO('mysql:host=' .self::HOST. ';dbname='.self::DNAME.';charset=utf8', self::LOGIN, self::PWD);
    }

    public function getUserId() {
        return $this->_user_id;
    }

    public function setUserId($userId) {
        $this->_user_id = $userId;
    }
}