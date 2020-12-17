<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="fr ,en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard Admin</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
          <script src="https://kit.fontawesome.com/7cb0e7c261.js" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="style.css">
          <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
</head>
<body>
<header style="width:100%;background-color:rgb(173, 63, 63)">
        
        <nav class="navbar navbar-expand-md ">
          <span class="h3"style="font-family: 'Secular One', sans-serif;color:white;">      <img src="livre.png" height="110px" whith="100px" style="padding:10px;"><i><a href="admin.php" style="color:white;">Jardin des Livres</a></i></span>
        
        <div class="container d-flex justify-content-end">  
         
        <!-- <div class="collapse navbar-collapse" id="navbarsExample04"> -->
           
                <div class="d-flex justify-content-end col-12" style="float:left;margin-left:20px;"> 
                    <a href="deconnexion.php" class="btn btn-danger" title="se deconnecter"> <i class="fa fa-sign-out" aria-hidden="true"></i> <span > DECONNEXION </span> </a>
                </div>
            </div>
          </div>
        </nav>    
       
</header>    

                  <!-- barre de recherche -->
            <br>
            <br>
             <form action="admin.php" method="POST">
              <label style="margin-left:15px;" class="h4"> <b><u>recherche</u> : </b></label>
              <input type="search" name="recherche" id="recherche" style="whidth:100px;border-radius:10px;"  placeholder="Search">
              <input type="submit" value="rechercher" name="rechercher" class="btn btn-secondary">

                <?php
                $conn = new PDO("mysql:host=localhost;dbname=bibliotheque",'root','');
if(isset($_POST['rechercher'])){
  $recherche = $_POST['recherche'];
  $sth = $conn->prepare( "SELECT * FROM `livres` WHERE motcle1 ='$recherche' OR motcle2  ='$recherche' OR motcle3  ='$recherche' OR motcle4  ='$recherche' OR motcle5  ='$recherche'  ");
  // $sth->setFetchMode(PDO:: FETCH_OBJ);
  $sth->execute();

  if(true){
    ?>
    <br><br><br>
  <table class="table table-responsive table-bordered  "  >
       <thead>
        <tr class ="bg-dark text-light">

          <th style="margin:15px;">titre de l'oeuvre   </th>
          <th style="margin:15px;">auteur de l'oeuvre   </th>
      </tr>
      </thead>
      <?php 
     
      // var_dump($row);
      $row = $sth->fetchAll(PDO:: FETCH_OBJ);
      foreach($row as $livre){
      ?>   
      <tbody>
      <tr>
          <td style="margin-left:15px;">   <?php echo $livre->titre;?></td>
          <td style="margin-left:15px;">   <?php echo $livre->auteur;?></td>
      </tr>
      </tbody>
      <?php }?>
      
    </table> 
    <?php
  }else{
    echo"<br>";
    echo"<span style=\"margin-left:15px;font-size:20px;\"><b>aucun resultat pour <span style=\"color:red;\"> $recherche </b></span></span>";
  }
}
?>
            <!-- barre de recherche -->





                                      <!-- bouton actions admin -->
               <!-- <center> -->  
          <div class="collapse navbar-collapse navbar navbar-expand-lg   d-flex justify-content-end ">    
                <a href="ajouter.php" class="btn btn-success" title="ajouter un livre"> <i class="fa fa-plus" aria-hidden="true"></i> <span > AJOUTER </span></a>
        
                <a href="modifier.php"class="btn btn-warning" title="modifier les informations d'un livre"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span > MODIFIER </span> </a>
        
                <a href="supprimer.php"class="btn btn-primary" title="supprimer un livre"> <i class="far fa-trash-alt"></i> <span> SUPPRIMER </span> </a>
          </div>
              <!-- </center> -->



  <!-- affichage des elements de la table -->      
        <div >
          <?php

          $result = mysqli_query($con, "SELECT * FROM livres LIMIT 89");

          echo "
    <table class=\"table table-responsive table-bordered  \"  >
        <tr class =\"bg-dark text-light\">
            <th>id</th>
            <th>Niveau de classe</th>
            <th>Genre</th>
            <th>catégorie complémentaire</th>
            <th>Auteur, illustrateur</th>
            <th>Titre</th>
            <th>Editeur</th>
            <th>Mot clé 1</th>
            <th>Mot clé 2</th>
            <th>Mot clé 3</th>
            <th>Mot clé 4</th>
            <th>Mot clé 5</th>

        </tr>";

        while ($row = mysqli_fetch_array($result)) {
            // echo "<tr >";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['niveau_de_classe'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['categorie_additionnelle'] . "</td>";
            echo "<td>" . $row['auteur'] . "</td>";
            echo "<td>" . $row['titre'] . "</td>";
            echo "<td>" . $row['editeur'] . "</td>";
            echo "<td>" . $row['motcle1'] . "</td>";
            echo "<td>" . $row['motcle2'] . "</td>";
            echo "<td>" . $row['motcle3'] . "</td>";
            echo "<td>" . $row['motcle4'] . "</td>";
            echo "<td style=\"margin:20px\">" . $row['motcle5'] . "</td>";
            echo "</tr>";
        }
          echo "</table>";
          ?>
        </div>
      </div>
    </div>
</body>
</html>