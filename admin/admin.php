<?php
    require './traitement/DBconnection.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
  <div class="adminContainer">
     <?php
        if(isset($_GET['pageCharger'])){

            $nompageCharger=htmlentities($_GET['pageCharger']);
            include './'.$nompageCharger.'.php';	
        }
         else {
            include './include/startpage.php';
         }

     ?> 
  </div>
   
   <script src="./jquery-3.3.1.min.js"></script>
   <script src="./script.js"></script>
</body>
</html>