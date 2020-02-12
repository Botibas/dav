<?php
	function page_getOrders(){
		
		if(isset($_GET["HID"])){
            $HID=$_GET["HID"];
            $house = db_getHouseFromHID($HID);
        }
		
		  $result = "";

        $result .= '
        <body>';

            $result .= '
            <div id="wrappingContainer" class="container">

                <div id="titleRow" class="row">
                    <div id="titleContainer" class="container">
                        <p class="houseHeading"> <img src="./images/home.svg" id="headerIcon">'.$house['houseName'].'</p>
                    </div>
                </div>
			<div id="OrderContainer" class="container">

                <div id="bookingInformationsRow" class="row">
                    <div id="startDatepicker" class="col-4">
                        <p class="houseHeading"> <img src="./images/home.svg" id="headerIcon">'.$house['houseName'].'</p>
                    </div>
					 <div id="endDatepicker" class="col-4">
                        <p class="houseHeading"> <img src="./images/home.svg" id="headerIcon">'.$house['houseName'].'</p>
                    </div>
                </div>		
				
	
	</body>
?>