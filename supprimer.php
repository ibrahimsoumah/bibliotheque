<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer livre</title>
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


    <form action="supprimer.php" method="post">
         <label> entrer l'id du livre que vous vouler supprimer</label><br>
            <input type="text" name="id" id="id"><br>
            
        <input type="submit" value="supprimer" name="supprimer">
    </form>
    <?php
    if (isset($_POST['supprimer'])) {
        $id = $_POST['id'];
        $query = "DELETE  FROM livres  WHERE id ='$id'";
        $result = mysqli_query($con, $query);
        
        header("location: admin.php");
        if (!$result) {
            die("Failed");
        }
    }
    ?>
</body>
</html>