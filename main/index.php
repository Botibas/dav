<?php
    require_once "database.php";
    require_once "header.php";
    require_once "content/content.php";
    //require_once "api.php";
   

    if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    if(isset($_GET["action"])){
        if($_GET["action"] == "sendOrderRequest"){
            $HID = $_GET["HID"];
            $house = db_getHouseFromHID($HID);
            //$house = db_fetchHouseFromHIDArray($HID);
            $UID = db_getUIDFromHID($HID);
            $user = db_getAllFromUser($UID);

            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            $anzahl = $_POST["anzahl"];
            $email = $_POST["email"];
    
            $subject = 'Anfrage für die '.$house['houseName'];
            $message = '
            <p style="font-size:30px; text-align:center;color:black;">Anfrage zu einer Buchung</p>
            <div style="margin-left:30%">
                <a href="http://schulprj.de/dav/index.php?page=orders&HID='.$house['HID'].'&startDate='.$startDate.'&endDate='.$endDate.'&anzahl='.$anzahl.'&email='.$email.'&action=requestRejected" style="background-color: red;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Anfrage ablehnen</a>
                <a href="http://schulprj.de/dav/index.php?page=orders&HID='.$house['HID'].'&startDate='.$startDate.'&endDate='.$endDate.'&anzahl='.$anzahl.'&email='.$email.'&action=requestAccepted" style="background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Anfrage annehmen</a>
            </div>';
            $head = 'Content-Type: text/html';
        
            mail($user['eMail'], $subject, $message, $head);//Buchungsanfrage wird per Mail an Hausbesitzer geschickt
    
            header('Location: ?page=orders&HID='.$house['HID'].'&action=requestSend');
        }
    }
   

    $result = "<html>";
        $result .= page_getHeader();
        $result .= page_getContent();
    $result .= "</html>";
    echo $result;
?>