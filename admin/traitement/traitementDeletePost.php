<?php

// se connecter à la base de données ici
    require 'DBconnection.php';

// get content from form
    $post = $_GET['id_post'];

// insert it in database

    $req = $dbc->prepare('DELETE FROM post WHERE id_post = '.$post.' ');
    
    $req->execute();

header('location: ../admin.php?pageCharger=./include/connected');



?>