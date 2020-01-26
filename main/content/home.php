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
                zoom:[4],
                style: "mapbox://styles/tobiv/ck5tyx1rj0svu1ipbh74lh7bs"
            });
        </script>';
        

        return $result;
    }
?>