<?php

    // connect to database

    require './DBconnection.php';


    // get the categorie id
    $id_cat = $_GET['id_cat'];


    // insert it in database

    $req = $dbc->prepare('DELETE FROM categorie WHERE id_categorie = '.$id_cat.' ');
    
    $req->execute();



header('location: ../admin.php?pageCharger=./include/connected');







?>