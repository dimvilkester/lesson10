<?php

class CSharedDataBaseNews extends CDataBaseNews 
{
    public function selectSharedNews()
	{
        $sql = "SELECT `id`, `title`, `text`, `author`, `date_added` , `website`
                     FROM `new_news`
                     ORDER BY `id`
                     DESC";
                       
        $result = $this->db->prepare($sql);
        $result->execute(); 
        $selectSharedNews = $result->fetchAll();

        foreach($selectSharedNews as $rows) 
        { 
            $outPut[] = new CSharedNews($rows['title'], $rows['text'], $rows['author'], $rows['website']); 
        } 
        return $outPut; 
    }

    public function insertSharedNews($obj) 
    { 
        
        $title = $obj->getTitle(); 
        $text = $obj->getText();
        $author = $obj->getAuthor();
		$website = $obj->getWebsite();
         
        $sql = "INSERT INTO `news` (`title`, `text`, `author`, `website`)
                VALUES ('".$title."', '".$text."', '".$author."', '".$website."')";

        $result = $this->db->prepare($sql);
        $insertSharedNews = $result->execute();

        if($insertSharedNews === TRUE) { 
            return TRUE;
        } else {
            return FALSE; 
        }
    }

    public function updateSharedNews($id, $obj) 
    { 
        $sql = "UPDATE `news` 
                SET `title`='" . $title . "', `text` = '" . $text . "', `author` = '" . $author . "', `website` = '".$website."'
                WHERE `id`='" . $id . "'";

        $result = $this->db->prepare($sql);
        $updateSharedNews = $result->execute();

        if ($updateSharedNews === TRUE) { 
            return TRUE;
        } else {
            return FALSE; 
        }
    } 
    
    public function selectSharedNewsId($id) 
    { 
        $sql = "SELECT `id`, `title`, `text`, `author`, `date_added`, `website`
                FROM `news`
                WHERE id='".$id."'";
                           
        $result= $this->db->prepare($sql);
        $result->execute(); 
        $selectSharedNewsId= $result->fetchAll();

        foreach($selectSharedNewsId as $rows) 
        { 
            $outPut[] = new CSharedNews($rows['title'], $rows['text'], $rows['author'], $rows['website']); 
        } 
        return $outPut;
    }	
}