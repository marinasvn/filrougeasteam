<div id="left">
    <?php
             include './include/nav-connected.php';
    ?> 
    <br/>
    <form action="./traitement/traitementAddPost.php" method="post" enctype="multipart/form-data">
       <h2>Add a new post</h2>
        <input type="text" name="title" placeholder="title"><br/>
        <textarea name="text" placeholder="text of post"></textarea><br/>
        <input type="file" name="file"><br/><br/>
        
        <select name="categories">
        <?php
           $req = $dbc->query('SELECT name FROM categorie');
            foreach ($req as $cat) {
                echo "<option value='".$cat['name']."'>".$cat['name']."</option>";
            }
        ?>
        </select><br/>
        <input type="submit" name="submit" value="Add post">
    </form>
    
    <br/><br/>
    <form action="./traitement/traitementAddCategorie.php" method="post">
        <h2>Add a new categorie</h2>
        <input type="text" name="categorie" placeholder="categorie"><br/>
        <input type="submit" name="submit" value="Add">
    </form>

</div>


<div id="right">
    <?php
        $req = $dbc->query('SELECT * FROM post INNER JOIN user ON post.user_id = user.id_user');
        
        foreach ($req as $post) {
           echo "<div class='article'><article><img src='./img/".$post['img']."' /><h2>".$post['title']."</h2><p class='text'>".$post['text']."</p><p class='categorie'>".$post['categorie']."</p><p class='date'>".$post['date']."</p><p class='auteur'>".$post['prenom']." ".$post['nom']."</p><a class='edit'><i class='fas fa-pencil-alt'></i> EDIT THIS POST</a></article><article class='hidden'><input type='text' name='title' value='".$post['title']."'><br/><textarea name='text'>".$post['text']."</textarea><br/><input type='file' name='file'><br/><br/><select name='categories'>";
            
            
               $req = $dbc->query('SELECT name FROM categorie');
                foreach ($req as $cat) {
                    echo "<option value='".$cat['name']."'>".$cat['name']."</option>";
                }
            
            
            echo "</select><br/><br/>
            <form action='./traitement/traitementAddCategorie.php' method='post'>
                <input type='submit' name='submit' value='Update'>
            </form></article></div>";
        }
    ?>
</div>