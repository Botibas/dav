<?php

    require_once 'database_helper.php';
    $dbConnection = false;

    function get_dbConnection(){
        global $dbConnection;
        $hostname="localhost";
        $username="db_schulprj_user";
        $password="20fj%iQ7";
        $db="DB_SchulPrj";

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

        $sql = 'SELECT * From Q1_DAV_Houses WHERE HID='.$HID;
        $result = mysqli_query($dbConnection, $sql);
        
	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchHouseFromHIDArray($result);
    }

    function db_getImgFromHouse($HID){
	    $dbConnection = get_dbConnection();

        $sql = 'SELECT IMGPaths From Q1_DAV_HouseIMGPaths WHERE HID='.$HID;
        $result = mysqli_query($dbConnection, $sql);
        
	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchImgFromHouseArray($result);
    }
    
    function db_getHouses(){
	    $dbConnection = get_dbConnection();

        $sql = 'SELECT * From Q1_DAV_Houses';
        $result = mysqli_query($dbConnection, $sql);
        
	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchHousesArray($result);
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

    function db_getUIDFromHID($HID){
	    $dbConnection = get_dbConnection();

        $sql = 'SELECT UID From Q1_DAV_V_Houses_Users WHERE HID='.$HID;
        $result = mysqli_query($dbConnection, $sql);

	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchUIDFromHIDArray($result);
    }

    function db_getAllFromUser($UID){
	    $dbConnection = get_dbConnection();

        $sql = 'SELECT * From Q1_DAV_Users WHERE UID='.$UID;
        $result = mysqli_query($dbConnection, $sql);

	    if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
           return false;
        }

        return db_fetchAllFromUserArray($result);
    }

    //---------------------------------Orders

    function db_createOrder($startDate, $endDate, $personNumber, $email){
        $dbConnection = get_dbConnection();
        
        $sql = 'INSERT INTO Q1_DAV_Orders(startDay,endDay,personenAnzahl,email)
                VALUES("'.$startDate.'", "'.$endDate.'", '.$personNumber.', "'.$email.'")';
        if (!$dbResult = $dbConnection->query($sql)) {
            echo $dbConnection->error;
            return false;
        }
    }







   
?>