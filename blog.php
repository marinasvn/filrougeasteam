<?php
    // connection à la bd
    require './admin/traitement/DBconnection.php';
?>
<!DOCTYPE html>
<html lang="fr">
<html>
<head>
  <meta charset="utf-8">
  <title> blog </title>
  <!-- <link rel="stylesheet" type="text/css" href="assets1/css/style.css"> -->
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="icon" type="image/png" href="assets/images/favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css"/>
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/blog.css">
<link rel="stylesheet" href="assets/css/hover.css">

</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-12">
      <p>
        <!-- Header -->
        <?php
          include './header.php';
        ?>
      </p>
    </div>
  </div>

  <div class="row" id="first-row">
    <div class="card mb-3" id="first-card-bgcolor">
      <img class="card-img-top" src="assets/images/bannerlandascape.jpg" alt="Card image cap">
      <div class="card-body">
        <h2 class="card-title">Quelques conseils avant de vous rendre au Repair Café</h2>
        <p class="card-text">
          <ul>
           <li> Vérifiez avant tout que votre objet n'est plus sous garantie; </li>
           <li> renez avec vous tous les accessoires de l'objet à réparer;</li>
           <li> Si vous identifiez une pièce défectueuse, essayez d'en trouver une de remplacement car nous n'avons pas de stock</li>
           <li> En arrivant, vous devrez vous inscrire à l'accueil et recevoir une fiche d'inscription et un numéro de passage.</li>
           <p> <a href="#"> +infos </a> </p>
          </ul>
        </p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>

<div class="row mt-3 mb-1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12" id="filtres">
                  <a id="filter-All" class="active">Tout</a>
                  <a id="filter-Couture">Couture</a>
                  <a id="filter-Info">Informatique</a>
                  <a id="filter-Electro">Electronique</a>
                  <a id="filter-Bois">Bois</a>
                  <a id="filter-Velo">Vélo-mécanique</a>
                  <a id="filter-Divers">Divers</a>
    </div>
</div>

<div class="row" id="second-row">

    <?php
        $req = $dbc->query('SELECT * FROM post INNER JOIN user ON user.id_user = post.user_id');

        foreach ($req as $post) {
            
            echo "<div class='col-lg-4 col-md-4 col-sm-12 col-12 All "; 

                $req = $dbc->query('SELECT name FROM categorie INNER JOIN post_categorie ON post_categorie.id_categorie = categorie.id_categorie INNER JOIN post ON post.id_post = post_categorie.id_post WHERE post.id_post = '.$post['id_post'].'');

                foreach ($req as $cat) {
                        echo $cat['name']." ";
                }

            echo "'>";
            echo "<div class='card'><img class='card-img-top' src='./assets/images/".$post['img']."' /><div class='card-body'><h1 class='card-title1'>".$post['title']."</h1><p class='card-text'>".$post['text']."</p><p class='card-text'><small>";
            $req = $dbc->query('SELECT name FROM categorie INNER JOIN post_categorie ON post_categorie.id_categorie = categorie.id_categorie INNER JOIN post ON post.id_post = post_categorie.id_post WHERE post.id_post = '.$post['id_post'].'');
            foreach ($req as $cat) {
                        echo $cat['name']." ";
                }
            echo"</small></p></div></div></div>";
        }

    ?>    

   
    </div>
    
    <div class="row" id="last-row">
      <div class="col-lg-12 col-12 col-md-12 col-sm-12">
        <?php
        include './footer.php';
        ?>
      </div>
    </div>

 </div>


  <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/filtre.js"></script>
    <script>
    $(document).ready(function() {
      $("#q1").click(function() {
          $( "#r1" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q2").click(function() {
          $( "#r2" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q3").click(function() {
          $( "#r3" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q4").click(function() {
          $( "#r4" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q5").click(function() {
          $( "#r5" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q6").click(function() {
          $( "#r6" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q7").click(function() {
          $( "#r7" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q8").click(function() {
          $( "#r8" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q9").click(function() {
          $( "#r9" ).toggle( "blind", 500 );
        });
    });
    $(document).ready(function() {
      $("#q10").click(function() {
          $( "#r10" ).toggle( "blind", 500 );
        });
    });
    </script>
    <script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>
</body>
</html>
