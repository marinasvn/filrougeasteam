<?php

// se connecter à la base de données ici
    require 'DBconnection.php';

// get content from form
    $title = $_POST['title'];
    $text = $_POST['text'];
    $img = $_FILES['file']['name'];
    $categorie = $_POST['categories'];

// get post id
    $getPostId = $_POST['id_post'];

// get user id
    $getUserId = $dbc->prepare('SELECT id_user');
        session_start();
        $user_id = $_SESSION['id_user'];

// insert it in database

    $req = $dbc->prepare("UPDATE post SET title = '".$title."', text = '".$text."', img = '".$img."', date = Curdate(), categorie = '".$categorie."' WHERE id_post = '".$getPostId."' AND user_id = '".$user_id."'");
    
    $req->execute();



header('location: ../admin.php?pageCharger=./include/connected');




?>