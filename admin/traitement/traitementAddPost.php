<?php

// se connecter à la base de données ici
    require 'DBconnection.php';

// get content from form
    $title = $_POST['title'];
    $text = $_POST['text'];
    $img = $_FILES['file']['name'];

    $categorie = $_POST['categorie'];



// get user id
    $getUserId = $dbc->prepare('SELECT id_user');
        session_start();
        $user_id = $_SESSION['id_user'];

// insert it in database


$req = $dbc->prepare('INSERT INTO post(id_post, title, text, img, date, user_id) VALUES(NULL, :title, :text, :img, Curdate(), :user_id)');
    
        $req->execute(array(
            'title' => $title,
            'text' => $text,
            'img' => $img,
            'user_id' => $user_id
        ));

$req->closeCursor();

$thisPostId = $dbc->lastInsertId();

$insertcategories = $dbc->prepare('INSERT INTO post_categorie(id_post, id_categorie) VALUES(:id_post, :id_categorie)');

foreach ($categorie as $cat) {
    
    $insertcategories->execute(array(
            'id_post' => $thisPostId,
            'id_categorie' => $cat
        ));
}

header('location: ../admin.php?pageCharger=./include/connected');



?>