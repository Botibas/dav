<?php
	require_once "content/home.php";
	require_once "./database.php";
	

    function page_getContent(){		//Get Content from Pages
        if(isset($_GET["page"]))
		    $page = $_GET["page"];		//Get current Page
        else
            $page = "login";
		
		switch ($page) {
			case 'home':
				return page_getHome();
				break;
		}


	}
	

?>