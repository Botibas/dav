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
                
                <form method="post" action="?page=orders&HID='.$house['HID'].'&action=sendOrderRequest">
                    <div id="bookingRow" class="row">
                        <div id="dateContainer" class="col-5">
                            <p id="startDate">Ankunft: <input type="text"  id="AnkunftDate" required></p>
                            <p id="endDate">Abreise: <input type="text"  id="AbreiseDate" required></p>
                        </div>

                        <div id="anzahlContainer" class="col-5">
                            <p >Personenanzahl: <br><input type="number" required></p>
                        </div>
                    </div>

                    <input type="submit" class="loginBtn standardBtn" value="Anfrage absenden">
                </form>
            </div>

        </body>';
        if(isset($_GET["action"])){
            if($_GET["action"]=="requestSend"){
                $result .= ' 
                <div id="titleRow" class="row">
                    <div id="titleContainer" class="container">
                        <p class="houseHeading">Anfrage abgesendet</p>
                    </div>
                </div>
                
                <div id="bookingRow" class="row">
                     
                </div>';
    
            }
        }
        

        $result .= ' <script>
            $( function() {
                $( "#AnkunftDate" ).datepicker();
            } );

            $( function() {
                $( "#AbreiseDate" ).datepicker();
            } );

        </script>';
        
        return $result;
	}			
?>