<?php

// connexion a la base de donnees
$con = new PDO("mysql:host=localhost;dbname=bibliotheque",'root','');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotheque</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/7cb0e7c261.js" crossorigin="anonymous"></script> </script>
   <script type = "text / javascript" src = "script.js" > </script>
   <link rel="stylesheet" href="style.css">
          <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

 

</head>
<body>
  <form  method="POST">
   <input type="text" name="recherche" id="recherche" placeholder="recherche....">
   <input type="submit" value="rechercher" name="rechercher">
  </form>
<?php
if(isset($_POST['rechercher'])){
  $recherche = $_POST['recherche'];
  $sth = $con->prepare( "SELECT * FROM `livres` WHERE motcle1   ='$recherche' ");
  $sth->setFetchMode(PDO:: FETCH_OBJ);
  $sth->execute();

  if($row = $sth->fetch()){
    ?>
    <br><br><br>
 <?php while ($row = $sth->fetch()){?>   
    <table>
      <tr>
          <th style="margin:15px;">titre de l'oeuvre   </th>
          <th style="margin:15px;">auteur de l'oeuvre   </th>
      </tr>
      <tr>
      
          <td style="margin-left:15px;">   <?php echo $row->titre;?></td>
          <td style="margin-left:15px;">   <?php echo $row->auteur;?></td><br>
      <?php }?>
      </tr>
    </table> 
    <?php
  }else{
    echo"sa nexiste pas";
  }
}
?>
</body>
</html>
