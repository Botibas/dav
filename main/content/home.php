<?php
    function page_getHome(){
               
        $result = "";

        $result .= '
        <body>';

            $result .= '
            <div class="parent">
                <div class="header">
                        <div class="logIn">
                            Einloggen
                        </div>

                        <div class="menu">
                            Menü <img src="./images/dropdown.svg">
                        </div>
                </div>
                <div class="davLogo"><img style="width:280px;" src="./images/davLogo.png"></div>

                <div class="mapbox">
                    <div id="map" style="width: 100%; height: 100%; margin-top:50px"></div>
                </div>
            </div>'; 
                           
        $result .= '
        </body>
        <script>

            mapboxgl.accessToken = "pk.eyJ1IjoidG9iaXYiLCJhIjoiY2s1bWFoMTZ4MHV6YTNrcWtuMnJxcW9ocCJ9.b7Gy3DK4Y_JKXEttx8zj_Q";
          
            var map = new mapboxgl.Map({
              container: "map",
              center: [11.524937, 51.065097],
              zoom:[5],
              style: "mapbox://styles/tobiv/ck5tyx1rj0svu1ipbh74lh7bs"
            });

            var geojson = {
                type: "FeatureCollection",
                features: [';
                    $house = db_getHouses();
                    foreach($house as $h){
                        $result .= '{type: "Feature", geometry: {type: "Point",coordinates: ['.$h['coordinateX'].','.$h['coordinateY'].']},
                        properties: {title: "'.$h['houseName'].'",description: "<b>Adresse</b>: '.$h['adress'].'",HID: "'.$h['HID'].'"}},';
                    }
    $result .= ']
            };

            

            geojson.features.forEach(function(marker) {
                // create a HTML element for each feature
                var el = document.createElement("div");
                el.className = "markerGeoJson";
                
                // make a marker for each feature and add to the map
                new mapboxgl.Marker(el)
                  .setLngLat(marker.geometry.coordinates)
                  .addTo(map);

                new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
                  .setHTML("<h4>" + marker.properties.title + "</h4><p>" + marker.properties.description + "</p> <br> <a'." href=?page=detailedHouse&HID=".'" + marker.properties.HID + ">mehr..</a>"))
                .addTo(map);
            });

        </script>';
        

        return $result;
    }
?>