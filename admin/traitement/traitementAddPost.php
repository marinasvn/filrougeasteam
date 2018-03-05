<?php

// se connecter à la base de données ici
    require 'DBconnection.php';

// get content from form
    $title = $_POST['title'];
    $text = $_POST['text'];
    $img = $_FILES['file']['name'];
    $categorie = $_POST['categories'];

// get user id
    $getUserId = $dbc->prepare('SELECT id_user');
        session_start();
        $user_id = $_SESSION['id_user'];

// insert it in database

    $req = $dbc->prepare('INSERT INTO post(id_post, title, text, img, date, categorie, user_id) VALUES(NULL, :title, :text, :img, Curdate(), :categorie, :user_id)');
    
        $req->execute(array(
            'title' => $title,
            'text' => $text,
            'img' => $img,
            'categorie' => $categorie,
            'user_id' => $user_id
        ));

header('location: ../admin.php?pageCharger=./include/connected');



?>