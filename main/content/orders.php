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
            <div id="wrappingContainer" class="container">';
                if(isset($_GET["action"])){
                    if($_GET["action"]=="requestSend"){
                        $result .= ' 
                        <div id="titleRow" class="row">
                            <div id="titleContainer" class="container">
                                <p class="houseHeading">Anfrage abgesendet</p>
                            </div>
                        </div>

                        <div id="bookingRow" class="row">
                            Ihre Anfrage zur Buchung des Hauses '.$house['houseName'].' wurde an den Hausbesitzer geschickt
                        </div>

                        </div>';
                    
                    }

                    if($_GET["action"]=="requestAccepted"){

                        $startDate = $_GET["startDate"];
                        $endDate = $_GET["endDate"];
                        $anzahl = $_GET["anzahl"];
                        $email = $_GET["email"];

                        $subject = 'Anfrage für die '.$house['houseName'];
                        $message = '
                        <p style="font-size:30px; text-align:center;color:black;">Informationen zu ihrer Buchungsanfrage</p>
                        <div style="margin-left:30%">
                            Ihre Buchungsanfrage wurde von dem Hausbesitzer angenommen. Weitere Informationen zu Zahlung usw. erhalten sie in kürze per Email
                        </div>';
                        $head = 'Content-Type: text/html';

                        mail($email, $subject, $message, $head);//Mail senden an den der Buchen wollte

                        db_createOrder($startDate, $endDate, $anzahl, $email); //Eintrag in DB
                        $result .= ' 
                        <div id="titleRow" class="row">
                            <div id="titleContainer" class="container">
                                <p class="houseHeading">Sie haben die Anfrage angenommen</p>
                            </div>
                        </div>

                        <div id="bookingRow" class="row">
                            Sie haben die Anfrage zur Buchung des Hauses '.$house['houseName'].' angenommen.
                        </div>

                        </div>';

                    
                    }

                    if($_GET["action"]=="requestRejected"){

                        $startDate = $_GET["startDate"];
                        $endDate = $_GET["endDate"];
                        $anzahl = $_GET["anzahl"];
                        $email = $_GET["email"];

                        $subject = 'Anfrage für die '.$house['houseName'];
                        $message = '
                        <p style="font-size:30px; text-align:center;color:black;">Information zu ihrer Buchungsanfrage</p>
                        <div style="margin-left:30%">
                            <p>Ihre Buchungsanfrage wurde von dem Hausbesitzer abgelehnt.</p>
                        </div>';
                        $head = 'Content-Type: text/html';

                        mail($email, $subject, $message, $head);//Mail senden an den der Buchen wollte

                        $result .= ' 
                        <div id="titleRow" class="row">
                            <div id="titleContainer" class="container">
                                <p class="houseHeading">Sie haben die Anfrage abgelehnt.</p>
                            </div>
                        </div>

                        <div id="bookingRow" class="row">
                            Sie haben die Anfrage zur Buchung des Hauses '.$house['houseName'].' abgelehnt.
                        </div>

                        </div>';

                    
                    }

                }else{
                    $result .= '
                    <div id="titleRow" class="row">
                        <div id="titleContainer" class="container">
                            <p class="houseHeading"> <img src="./images/home.svg" id="headerIcon">'.$house['houseName'].'</p>
                        </div>
                    </div>
                
                    <form method="post" action="?page=orders&HID='.$house['HID'].'&action=sendOrderRequest">
                        <div id="bookingRow" class="row">
                            <div id="dateContainer" class="col-5">
                                <p id="startDate">Ankunft: <input type="text"  name="startDate"  id="AnkunftDate" required></p>
                                <p id="endDate">Abreise: <input type="text"   name="endDate" id="AbreiseDate" required></p>
                            </div>

                            <div id="anzahlContainer" style="display:flex;" class="col-4">
                                <p style="margin-right:30px;">Personenanzahl: <br><input type="number"  name="anzahl" required></p>
                                <p >Email: <br><input type="text"  name="email" required></p>
                            </div>
                        </div>

                        <input type="submit" class="loginBtn standardBtn" value="Anfrage absenden">
                    </form>';
                    
                }
    $result .= '
            </div>

        </body>';
        
        

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