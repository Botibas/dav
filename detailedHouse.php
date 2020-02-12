<?php
    function page_getDetailedHouse(){
             
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

                <div id="imageRow" class="row">
                    <div id="slider" class="col-8">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="./images/testHuette.jpg" alt="First slide">
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/testHuette.jpg" alt="Second slide">
                                </div>

                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/testHuette.jpg" alt="Third slide">
                                </div>
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                    </div>

                    <div id="smallMap" class="col-4">
                        <div id="map" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>

                <div id="descriptionRow" class="row">
                    <div id="descriptionTextContainer" class="col-8">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">adress</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <p class="descriptionText">'.$house['descriptionText'].'</p>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<p class="descriptionText">'.$house['adress'].'</p>
							</div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                        </div>
                    </div>

                    <div id="houseCalender" class="col-4">
                        calender
                    </div>
                </div>

            </div>';
            
                           
        $result .= '
        </body>
        <script>
            mapboxgl.accessToken = "pk.eyJ1IjoidG9iaXYiLCJhIjoiY2s1bWFoMTZ4MHV6YTNrcWtuMnJxcW9ocCJ9.b7Gy3DK4Y_JKXEttx8zj_Q";
            var map = new mapboxgl.Map({
                container: "map",
                center: [11.524937, 51.065097],
                zoom:[4],
                style: "mapbox://styles/tobiv/ck5tyx1rj0svu1ipbh74lh7bs"
            });
        </script>';
        

        return $result;
    }
?>