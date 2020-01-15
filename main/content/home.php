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
                <div class="map">Hier die Map </div>
            </div>'; 
                           
        $result .= '
        </body>';
        

        return $result;
    }
?>