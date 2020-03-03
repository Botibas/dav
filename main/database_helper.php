<?php

    

    function db_fetchHousesArray($dbResult) {
        $result = array();
        $i=0;
        while ($row = $dbResult->fetch_array()){
            $result[$i]['HID'] = $row['HID'];
            $result[$i]['houseName'] = $row['houseName'];
            $result[$i]['coordinateX'] = $row['coordinateX'];
            $result[$i]['coordinateY'] = $row['coordinateY'];
            $result[$i]['adress'] = $row['adress'];
            $result[$i]['maxAnzahl'] = $row['maxAnzahl'];
            $result[$i]['descriptionText'] = $row['descriptionText'];
            
            $i++;
        }
        return $result;
    }

    function db_fetchHouseFromHIDArray($dbResult) {
        $result = array();

        while ($row = $dbResult->fetch_array()){
            $result['HID'] = $row['HID'];
            $result['houseName'] = $row['houseName'];
            $result['coordinateX'] = $row['coordinateX'];
            $result['adress'] = $row['adress'];
            $result['coordinateY'] = $row['coordinateY'];
            $result['maxAnzahl'] = $row['maxAnzahl'];
            $result['descriptionText'] = $row['descriptionText'];
        }
        return $result;
    } 
    
    function db_fetchImgFromHouseArray($dbResult) {
        $result = array();
        $row = $dbResult->fetch_array();
        $result = $row['IMGPaths'];
        return $result;
    }    

?>