<?php
// se connecter à la base de données ici
    require 'DBconnection.php';
// Hachage du mot de passe
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $passConfirm = $_POST['password-confirm'];
        
  if ($passConfirm == $_POST['password']) {
      
        // Insertion
        $req = $dbc->prepare('INSERT INTO user(id_user, prenom, nom, email, password) VALUES(NULL, :prenom, :nom, :email, :pass)');
    
        $req->execute(array(
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'pass' => $pass_hache
        ));
  }  
  else {
      /*header('location: inscription.php');*/
      echo "Le password doit etre identique";
  }

header('location: ../admin.php');

?>