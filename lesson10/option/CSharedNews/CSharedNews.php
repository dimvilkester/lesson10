<?php

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