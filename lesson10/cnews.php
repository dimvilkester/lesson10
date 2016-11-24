<?php

class CNews extends CDataBase implements News, NewsNew 
{
	
    public function __construct() {
        parent::__construct();
    }
		  
    public function newsList() {
		$newsList = "SELECT `id`, `title`, `text`, `author`, `date_added`
					 FROM `news`
					 ORDER BY `id`
					 DESC";
					   
		$result = $this->db->prepare($newsList);
		$result->execute();
		
		return $result;
    }
	
	public function newsInsert() {
		if (isset($_POST['add'])) {
			 
			$title = strip_tags(trim($_POST["title"]));
			$text = strip_tags(trim($_POST["text"]));
			$author = strip_tags(trim($_POST["author"]));

			if (isset($title) && isset($text) && isset($author)) {
					
				$newsInsert = "INSERT INTO `news` (`title`, `text`, `author`)
							   VALUES ('".$title."', '".$text."', '".$author."')";
									   
				$result = $this->db->prepare($newsInsert);
				$result->execute();
				
				//return $result;
			}
			header('Location: add.php');
		 }
	}
	
	public function newsSelectId() {
		if ($id = intval($_GET["id"])) {
			
			$newsSelectId = "SELECT `id`, `title`, `text`, `author`, `date_added`
						     FROM `news`
						     WHERE id='".$id."'";
						   
			$result = $this->db->prepare($newsSelectId);
			$result->execute();
			$newsSelectIdAssoc = $result->fetch(PDO::FETCH_ASSOC);
			
			return $newsSelectIdAssoc;
		}
    }
	
	public function newsUpdateId() {
		if (isset($_POST["save"])) {
			
			$id = intval($_GET["id"]);
			$title = strip_tags(trim($_POST["title"]));
			$text = strip_tags(trim($_POST["text"]));
			$author = strip_tags(trim($_POST["author"]));

			if ($id > 0 && ! empty($title) && ! empty($text) && ! empty($author)) {
				
				$newsUpdate = "UPDATE `news` 
							   SET `title`='" . $title . "', `text` = '" . $text . "', `author` = '" . $author . "'
							   WHERE `id`='" . $id . "'";
				
				$qNewsUpdate = $this->db->prepare($newsUpdate);

				$qNewsUpdate->execute();
				
				//return $qNewsUpdate;
			}
			header('Location: index.php');
		}
	}	
	
	public function newsDelete() {
		if ($id = intval($_GET["id"])) {

			$newsDelete = "DELETE FROM `news` 
						   WHERE `id` = '". $id ."'";

			$qNewsDelete = $this->db->prepare($newsDelete);
			$qNewsDelete->execute();
		}
		header('Location: index.php');
	}

	public function newsDone() 
	{
		//
	}
}