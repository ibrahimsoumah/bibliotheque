<?php
 include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/7cb0e7c261.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
          <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

</head>
<body>

<header style="width:100%;background-color:rgb(173, 63, 63)">
        
        <nav class="navbar navbar-expand-md ">
          <span class="h3"style="font-family: 'Secular One', sans-serif;color:white;">      <img src="livre.png" height="110px" whith="100px" style="padding:10px;"><i>Jardin des Livres</i></span>
        
        <div class="container d-flex justify-content-end">  
         
        <!-- <div class="collapse navbar-collapse" id="navbarsExample04"> -->
           
                <div class="d-flex justify-content-end col-12" style="float:left;margin-left:20px;"> 
                 <a href="admin.php" class="btn btn-success" title="aller a l'acceuil"> <i class="fa fa-home" aria-hidden="true"></i><span > ACCEUIL </span> </a>    
                <a href="deconnexion.php" class="btn btn-danger" title="se deconnecter"> <i class="fa fa-sign-out" aria-hidden="true"></i> <span > DECONNEXION </span> </a>
                </div>
            </div>
          </div>
        </nav>    
       
</header>    

      <br>
      <br>

    <form action="ajouter.php" method="post" class="form-group">
       
    <div class="container">
           <div class="row">
           <div class="col-lg-3">
                 <label class="agrandir">Niveau de classe</label><br>
                 <input type="text" name="niveauDeClasse" id="niveauDeClasse"><br>
            </div>
                 
            <div class="col-lg-3">
                 <label class="agrandir">Genre</label><br>
                 <input type="text" name="genre" id="genre"><br>
            </div>     

            <div class="col-lg-3">
                 <label class="agrandir">catégorie complémentaire</label><br>
                 <input type="text" name="categorieComplementaire" id="categorieComplementaire"><br>
            </div> 
            
            <div class="col-lg-3">
                <label class="agrandir">Auteur, illustrateur</label><br>
                <input type="text" name="auteur" id="auteur"><br>
            </div>    
    </div>
      <br>
      <br> 
       
    <div class="container">
           <div class="row">
           <div class="col-lg-3">
                 <label class="agrandir">Titre</label><br>
                 <input type="text" name="titre" id="titre"><br>
            </div>
                 
            <div class="col-lg-3">
                <label class="agrandir">Editeur</label><br>
                <input type="text" name="editeur" id="editeur"><br>
            </div>     

            <div class="col-lg-3">
                 <label class="agrandir">Mot clé 1</label><br>
                 <input type="text" name="motCle1" id="motCle1"><br>
            </div> 
            
            <div class="col-lg-3">
                 <label class="agrandir">Mot clé 2</label><br>
                 <input type="text" name="motCle2" id="motCle2"><br>
            </div>    
    </div>
       
      <br>
      <br>

    <div class="container">
           <div class="row">
           <div class="col-lg-4">
                <label class="agrandir">Mot clé 3</label><br>
                <input type="text" name="motCle3" id="motCle3"><br>
            </div>
                 
            <div class="col-lg-4">
                <label class="agrandir">Mot clé 4</label><br>
                <input type="text" name="motCle4" id="motCle4"><br>
            </div>     

            <div class="col-lg-4">
                 <label class="agrandir">Mot clé 5</label><br>
                 <input type="text" name="motCle5" id="motCle5"><br>
            </div>    
    </div>
        <br>
              <input type="submit" value="enregistrer" name="enregistrer" class="btn btn-warning">

        
</div>
            
    </form>

    <?php
   
function securiteChampDeFormulaire($var)
{
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

  if (isset($_POST['enregistrer'])) {
      $niveauDeClasse = securiteChampDeFormulaire($_POST['niveauDeClasse']);
      $genre = securiteChampDeFormulaire($_POST['genre']);
      $categorieComplementaire = securiteChampDeFormulaire($_POST['categorieComplementaire']);
      $auteur = securiteChampDeFormulaire($_POST['auteur']);
      $titre = securiteChampDeFormulaire($_POST['titre']);
      $editeur = securiteChampDeFormulaire($_POST['editeur']);
      $motCle1 = securiteChampDeFormulaire($_POST['motCle1']);
      $motCle2 = securiteChampDeFormulaire($_POST['motCle2']);
      $motCle3 = securiteChampDeFormulaire($_POST['motCle3']);
      $motCle4 = securiteChampDeFormulaire($_POST['motCle4']);
      $motCle5 = securiteChampDeFormulaire($_POST['motCle5']);



      $sql = "INSERT INTO livres (niveau_de_classe , genre , categorie_additionnelle , auteur , titre , editeur , motcle1 , motcle2 , motcle3 , motcle4 , motcle5)
  VALUES ('$niveauDeClasse', '$genre', '$categorieComplementaire ', '$auteur', '$titre', '$editeur','$motCle1','$motCle2','$motCle3','$motCle4','$motCle5')";

     

      if (mysqli_query($con, $sql)) {
          echo '<script language="Javascript">';
          echo 'document.location.replace("admin.php")';
          echo ' </script>';

          echo "";
      } else {
          echo "";
      }
  } else {
      echo "";
  }

  mysqli_close($con);

    ?>
</body>
</html>