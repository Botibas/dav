<?php
    function db_fetchHouseFromHIDArray($dbResult) {
        $result = array();

        while ($row = $dbResult->fetch_array()){
            $result['HID'] = $row['HID'];
            $result['houseName'] = $row['houseName'];
            $result['location'] = $row['location'];
            $result['maxAnzahl'] = $row['maxAnzahl'];
            $result['descriptionText'] = $row['descriptionText'];
        }
        return $result;
    }    

    function db_fetchHouseNameByHIDArray($dbResult) {
        $result = array();
        $row = $dbResult->fetch_array();
        $result = $row['houseName'];
        return $result;
    }
?>