<?php
    require_once "database.php";
    require_once "header.php";
    require_once "content/content.php";
    //require_once "api.php";
   

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    

    $result = "<html>";
        $result .= page_getHeader();
        $result .= page_getContent();
    $result .= "</html>";
    echo $result;
?>