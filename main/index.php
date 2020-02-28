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
            //$house = db_fetchHouseFromHIDArray($HID);
            $UID = db_getUIDFromHID($HID);
            $user = db_getAllFromUserByUID($UID);
    
            $subject = 'Anfrage für die'.$house['houseName'];
            $message = '
            <p style="font-size:30px; text-align:center;color:black;">Anfrage von '.$extTrainerForename.' '.$extTrainerLastname.' Trainer in Iiigel zu werden</p>
            <div style="margin-left:30%">
                <a href="" style="background-color: red;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Anfrage ablehnen</a>
                <a href="" style="background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Anfrage annehmen</a>
            </div>';
            $head = 'Content-Type: text/html';
        
            mail($user['eMail'], $subject, $message, $head);
    
            header('Location: ?page=order&action=requestSend');
        }
    }
   

    $result = "<html>";
        $result .= page_getHeader();
        $result .= page_getContent();
    $result .= "</html>";
    echo $result;
?>