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

// get post id OK
    $getPostId = $_POST['id_post'];

// update the post in post table (without categories)

$req = $dbc->prepare("UPDATE post SET title = '".$title."', text = '".$text."', img = '".$img."', date = Curdate() WHERE id_post = '".$getPostId."' AND user_id = '".$user_id."'");
    
    $req->execute();
    $req->closeCursor();    

// delete from post_categorie id's

$reqDel = $dbc->prepare('DELETE FROM post_categorie WHERE id_post = '.$getPostId.'');

$reqDel->execute();
$reqDel->closeCursor(); 


// select id's of categories

foreach ($categorie as $cat) {
    $sql = "SELECT id_categorie FROM categorie WHERE name = :name";
    $statement = $dbc->prepare($sql);
    $statement->execute( array('name' => $cat) );
    $id_cat = $statement->fetchColumn();
    
    $insertcategories = $dbc->prepare('INSERT INTO post_categorie(id_post, id_categorie) VALUES(:id_post, :id_categorie)');
        
        $insertcategories->execute(array(
                'id_post' => $getPostId,
                'id_categorie' => $id_cat
            ));

}

header('location: ../admin.php?pageCharger=./include/connected');

?>