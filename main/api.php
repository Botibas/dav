<?php
    require_once "./phpqrcode/qrlib.php";
    require_once "database.php"; //Einbindung der Datenbank
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }



?>