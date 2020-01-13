<?php
  function page_getHeader(){
    if(isset($_GET["page"]))
      $page = $_GET["page"];		//Get current Page
    else
        $page = "login";
        
    $result = "";
    $result .= '<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js">
    <script src="scripts/api.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>';
  

    $result .= '<link rel="icon" type="image/png" href="images/dav.png">';
    $result .= '<title>DAV</title>';
    $result .= '<link rel="stylesheet" type="text/css" href="css/content.css">';
    
    $result .= "</head>";
    return $result;
  }
?>