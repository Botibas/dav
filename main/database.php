<?php

    require_once 'database_helper.php';
    $dbConnection = false;

    function get_dbConnection(){
        global $dbConnection;
        $hostname="localhost";
        $username="db_schulprj_user";
        $password="20fj%iQ7";
        $db="db_schulprj";

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
    function db_test(){
	    $dbConnection = get_dbConnection();

        $sql = '';
        $result = mysqli_query($dbConnection, $sql);
        
	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchHouseNameByHIDArray($result);
    }
    //-------------------Gibt den Namen eines Hauses anhand der HID zurück
    function db_getHouseFromHID($HID){
	    $dbConnection = get_dbConnection();

        $sql = 'SELECT * From Q1_Dav_Houses WHERE HID='.$HID;
        $result = mysqli_query($dbConnection, $sql);
        
	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchHouseFromHIDArray($result);
    }
    
    
    function db_getHouseNameByHID($HID){
	    $dbConnection = get_dbConnection();

        $sql = 'SELECT houseName From Q1_Dav_Houses WHERE HID='.$HID;
        $result = mysqli_query($dbConnection, $sql);

	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchHouseNameByHIDArray($result);
    }



   
?>