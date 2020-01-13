<?php

    require_once 'database_helper.php';
    $dbConnection = false;

    function get_dbConnection(){
        global $dbConnection;
        $hostname="localhost";
        $username="db_schulprj_user";
        $password="20fj%iQ7";
        $db=" DB_SchulPrj";

        if ($dbConnection == false) {
            $dbConnection = new mysqli($hostname, $username, $password, $db);// or die("Connect failed: %s\n". $dbConnection -> error);
            if ($dbConnection->connect_error) {
                die("Connection failed: " . $dbConnection->connect_error);
            }
        }
    
        mysqli_set_charset($dbConnection, 'utf8');
        
        return $dbConnection;


    }

    //-------------------Schließt Verbindung zur DB
    function close_dbConnection($dbConnection){
	    $dbConnection -> close();
    }

    //-------------------Beispiel funktion
    function db_getGIDByUID($UID){
	    $dbConnection = get_dbConnection();

	    $sql = '';

	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }
    }



   
?>