<?php

class CDataBase
{ 
    private $host   = 'localhost';
    private $dbname = 'dushinov';
    private $user   = 'dushinov';
    private $pass   = 'neto0622';
 
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    public $db;
 
 
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host='. $this->host .';dbname='. $this->dbname,
                                    $this->user,
                                    $this->pass,
                                    $this->options
                                );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}