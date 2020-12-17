    <?php
    include_once('connection.php');

 function securiteChampDeFormulaire($var)
 {
     $var = trim($var);
     $var = stripslashes($var);
     $var = htmlspecialchars($var);
     return $var;
 }


  if (isset($_POST['envoyer'])) {

    // securiser nos variables
      $email =  securiteChampDeFormulaire($_POST['email']);
      $mdp =   securiteChampDeFormulaire($_POST['motDePasse']);


      // renvoie un message si tous les champs ne sont pas rempli
      if (!empty($email) and !empty($mdp)) {

        // verifie si lutilisateur existe bien
          $requser = $con->prepare("SELECT * FROM user_admin WHERE email = ? AND mot_de_passe = ?");
          $requser->execute(array($email, $mdp));
          $champ = $requser->fetch();
          // verifie si lutilisateur existe bien
          if ($champ['email'] == $emailconnect) {
              $userinfo = $requser->fetch();
              $_SESSION['id'] = $userinfo['id'];
              $_SESSION['nomPrenom'] = $userinfo['nomPrenom'];
              $_SESSION['email'] = $userinfo['email'];

              header("Location: admin.php" . $_SESSION['id']);
          } else {
              $erreur = "adresse mail ou mot de passe errone";
          }
      } else {
          $erreur = "tous les champs doivents etres completes";
      }
  }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/7cb0e7c261.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="d-flex align-items-center" style="height:300px;width:300px;background-color:red;">
            <br>
                <form action="connexionadmin.php" method="post" class="" style="text-align:center">
                    <h1>Se COnnecter</h1>
                    <label>EMAIL</label><br>
                        <input type="email" name="email" id="email"><br>
                    
                    <label>Mot De Passe</label><br>
                        <input type="password" name="motDePasse" id="motDePasse"><br><br>
                            
                    <input type="submit" value="envoyer" name="envoyer">
                </form>
            </div>    
        </div>        
    </div>
</body>
</html>