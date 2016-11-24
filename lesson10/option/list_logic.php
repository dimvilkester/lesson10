<?php

interface DataBaseNews 
{ 
	// абстрактная функция
}

interface DataBaseNewsNew 
{ 
    // еще одна абстрактная функция 
}

class CNews 
{ 
    private $title; 
    private $text;
    private $author;
     
    public function __construct($title, $text, $author) 
    { 
        $this->title = $title; 
        $this->text = $text;
        $this->author = $author; 
    } 
     
    public function getTitle() 
    { 
        return $this->title; 
    }

    public function getText() 
    { 
        return $this->text; 
    }

    public function getAuthor() 
    { 
        return $this->author; 
    } 
}

class CDataBaseNews implements DataBaseNews, DataBaseNewsNew
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

    public function selectNews() {
		//
    }

    public function insertNews($obj) 
    { 
		//
    }

    public function updateNews($id, $obj) 
    { 
		//
    } 
    
    public function selectNewsId($id) 
    { 
		//
    }
}


/* Наследование */


class CSharedNews extends CNews
{ 
    private $website; 

    public function __construct($title, $text, $author, $website) 
    { 
        parent:: __construct($title, $text, $author);
		$this->website = $website; 
    } 
     
    public function getWebsite() 
    { 
        return $this->website; 
    }
}

class CSharedDataBaseNews extends CDataBaseNews 
{
    public function selectSharedNews() 
	{
		// 
    }

    public function insertSharedNews($obj) 
    { 
		//
    }

    public function updateSharedNews($id, $obj) 
    { 
		//
    } 
    
    public function selectSharedNewsId($id) 
    {
		//
    }	
}