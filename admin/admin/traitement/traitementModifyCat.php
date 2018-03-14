<?php
    // connect to database

    require './DBconnection.php';


    // get the categorie name

    $catModif = $_POST['newCat'];
    $id_cat = $_GET['id_cat'];


    // insert it in database

    $req = $dbc->prepare("UPDATE categorie SET name = '".$catModif."' WHERE id_categorie = '".$id_cat."'");
    
    $req->execute();



header('location: ../admin.php?pageCharger=./include/connected');









?>