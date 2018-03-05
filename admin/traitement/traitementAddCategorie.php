<?php

// se connecter à la base de données ici
    require 'DBconnection.php';

// get content from form
    $newCat = $_POST['categorie'];

// insert it in database

    $req = $dbc->prepare('INSERT INTO categorie(id_categorie, name) VALUES(NULL, :name)');
    
        $req->execute(array(
            'name' => $newCat
        ));

header('location: ../admin.php?pageCharger=./include/connected');



?>