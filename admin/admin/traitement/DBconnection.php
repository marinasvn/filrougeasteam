<?php
    
    try {
        $dbc = new PDO('mysql:host=localhost;dbname=filrougeasteam', 'root','');
    }

    catch (PDOExeption $e) {
        print "Erreur: ".$e->getMessage()."<br/>";
        die();
    }

?>