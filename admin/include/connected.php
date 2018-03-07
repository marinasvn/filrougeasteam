<div id="left">
   <div id="functions">
       
   
    <?php
             include './include/nav-connected.php';
    ?> 
    <br/>
    <form action="./traitement/traitementAddPost.php" method="post" enctype="multipart/form-data">
       <h2>Add a new post</h2>
        <input type="text" name="title" placeholder="title"><br/><br/>
        <textarea name="text" placeholder="text of post"></textarea><br/><br/>
        <input type="file" name="file"><br/><br/>
        
        <h3>Categories</h3>
        <?php
           $req = $dbc->query('SELECT * FROM categorie');
                foreach ($req as $cat) {
                    echo "<input type='checkbox' name='categorie[]' value='".$cat['id_categorie']."'>".$cat['name']."<br/>";
                }
        ?>
        <br/>
        <input type="submit" name="submit" value="Add post">
    </form>
    
    <br/><br/>
    <form action="./traitement/traitementAddCategorie.php" method="post">
        <h2>Add a new categorie</h2>
        <input type="text" name="categorie" placeholder="categorie"><br/>
        <input type="submit" name="submit" value="Add">
    </form>
    
    <div id="modifyCat">
       <h2>Modify ou delete a categorie</h2>
        <?php
           $req = $dbc->query('SELECT * FROM categorie');
                foreach ($req as $cat) {
                    echo $cat['name']."<br/>";
                }
        ?>
    </div>
    </div>
</div>


<div id="right">
    <?php
        // get user id
        $getUserId = $dbc->prepare('SELECT id_user');

        $user_id = $_SESSION['id_user'];
    
        $req = $dbc->query('SELECT * FROM post INNER JOIN user ON user.id_user = post.user_id WHERE user.id_user = '.$user_id.'');
        
        foreach ($req as $post) {
           echo "<div class='article'><article><img src='../assets/images/".$post['img']."' /><h2>".$post['title']."</h2><p class='text'>".$post['text']."</p><p class='categorie'>";
            
            $req = $dbc->query('SELECT name FROM categorie INNER JOIN post_categorie ON post_categorie.id_categorie = categorie.id_categorie INNER JOIN post ON post.id_post = post_categorie.id_post WHERE post.id_post = '.$post['id_post'].'');
            foreach ($req as $cat) {
                    echo $cat['name']." ";
                }
            
            
            echo "</p><p class='date'>".$post['date']."</p><p class='auteur'>".$post['prenom']." ".$post['nom']."</p></article><a class='edit'><i class='fas fa-pencil-alt'></i> EDIT THIS POST </a><form method='post' action='./traitement/traitementDeletePost.php?id_post=".$post['id_post']."'><input type='submit' name='submit' value=' ' class='deleteButton' /><a class='delete'><i class='fas fa-trash'></i> DELETE THIS POST </a></form><article class='hidden'><form method='post' action='./traitement/traitementUpdatePost.php' enctype='multipart/form-data'><input type='text' name='title' value='".$post['title']."'><br/><textarea name='text' />".$post['text']."</textarea><br/><input type='file' name='file' /><br/><br/><h3>Categories</h3>";
            
            
               $req = $dbc->query('SELECT name FROM categorie');
                foreach ($req as $cat) {
                    echo "<input type='checkbox' value='".$cat['name']."'>".$cat['name']."<br/>";
                }
            
            
            echo "<br/><br/>
            <input type='text' class='hidden' name='id_post' value='".$post['id_post']."'><input type='submit' name='submit' value='update' /></form></article></div>";
        }
    ?>
</div>