<?php
    function db_fetchHouseFromHIDArray($dbResult) {
        $result = array();

        while ($row = $dbResult->fetch_array()){
            $result['HID'] = $row['HID'];
            $result['houseName'] = $row['houseName'];
            $result['location'] = $row['location'];
            $result['maxAnzahl'] = $row['maxAnzahl'];
            $result['descriptionText'] = $row['descriptionText'];
			$result['adress'] = $row['adress'];
        }
        return $result;
    }    

  
?>