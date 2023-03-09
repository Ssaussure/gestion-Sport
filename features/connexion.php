<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
  <body>
  <div id="connexion">
    <!-- zone de connexion -->
    
    <form action="verification.php" method="POST">
      <h1>Connexion</h1>
      
      <label><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

      <label><b>Mot de passe</b></label>
      <input type="password" placeholder="Entrer le mot de passe" name="password" required>

      <input type="submit" id='submit' value='LOGIN' >
      
      <!-- A modifier ! -->
      <?php
        if(isset($_GET['erreur'])){
          $err = $_GET['erreur'];
          if($err==1 || $err==2)
          echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
      ?>
      
    </form>
  </div>
 </body>
</html>