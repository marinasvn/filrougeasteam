<div id="menu">
     Bonjour <?php echo $_SESSION['prenom'] ?>
            <form action="./traitement/traitementDeconnection.php">
                <input type="submit" name="submit" value="se deconnecter">
            </form> 
</div>