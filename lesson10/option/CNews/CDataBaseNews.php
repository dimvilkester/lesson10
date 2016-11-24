<?php
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
        $sql = "SELECT `id`, `title`, `text`, `author`, `date_added`
                     FROM `news`
                     ORDER BY `id`
                     DESC";
                       
        $result = $this->db->prepare($sql);
        $result->execute(); 
        $selectNews = $result->fetchAll();

        foreach($selectNews as $rows) 
        { 
            $outPut[] = new CNews($rows['title'], $rows['text'], $rows['author']); 
        } 
        return $outPut; 
    }

    public function insertNews($obj) 
    { 
        
        $title = $obj->getTitle(); 
        $text = $obj->getText();
        $author = $obj->getAuthor();
         
        $sql = "INSERT INTO `news` (`title`, `text`, `author`)
                VALUES ('".$title."', '".$text."', '".$author."')";

        $result = $this->db->prepare($sql);
        $insertNews = $result->execute();

        if($insertNews === TRUE) { 
            return TRUE;
        } else {
            return FALSE; 
        }
    }

    public function updateNews($id, $obj) 
    { 
        $sql = "UPDATE `news` 
                SET `title`='" . $title . "', `text` = '" . $text . "', `author` = '" . $author . "'
                WHERE `id`='" . $id . "'";

        $result = $this->db->prepare($sql);
        $updateNews = $result->execute();

        if ($updateNews === TRUE) { 
            return TRUE;
        } else {
            return FALSE; 
        }
    } 
    
    public function selectNewsId($id) 
    { 
        $sql = "SELECT `id`, `title`, `text`, `author`, `date_added`
                FROM `news`
                WHERE id='".$id."'";
                           
        $result= $this->db->prepare($sql);
        $result->execute(); 
        $selectNewsId= $result->fetchAll();

        foreach($selectNewsId as $rows) 
        { 
            $outPut[] = new CNews($rows['title'], $rows['text'], $rows['author']); 
        } 
        return $outPut;
    }
}