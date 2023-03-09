<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Match a venir</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
  <body>

    <!-- Menu -->
    <div class="menu">
      <nav>
          <ul>
            <img src="C:\Users\ninag\OneDrive\Documents\GitHub\PeloteBasquePHP\assets\logo.jpg" alt="Logo de l'entreprise" class="logo">
            <li><a href="matchAVenir.php">Matchs</a></li>
            <li><a href="joueurs.php">Joueurs</a></li>
            <li><a href="statistiques.php">Statistiques</a></li>
            <li><a href="monCompte.php">Mon compte</a></li>
          </ul>
      </nav>
    </div>
  <?php
  $server = "127.0.0.1";
  $login = "xxcuejbn_admin";
  $mdp = "KcLFHU9MV9nh3hX";
  $db = "xxcuejbn_cesta";

  try {
      $bdco = new PDO("mysql:host=$server;dbname=$db",$login,$mdp);
      $bdco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      echo 'Erreur de connexion : ' . $e->getMessage();
  }
?>
  </head>

<body>
  <div class="match">
    <div class="Listes_matchs">
      <div class="Prochains_matchs">
        <h2>Liste des prochains matchs</h2>
        <table>
            <tr>
              <th>Date</th>
              <th>Heure</th>
              <th>Team 1</th>
              <th>Team 2</th>
            </tr>
           
      </table>
    </div>
  
      <div class="Matchs_passes">
        <h2>Liste des anciens matchs</h2>
        <table>
          <tr>
              <th>Date</th>
              <th>Heure</th>
              <th>Team 1</th>
              <th>Team 2</th>
          </tr>
          <?php
            
            //Query the database to get the past matches
            $query = "SELECT date_match, team1, team2 FROM matches WHERE date_match < CURDATE() ORDER BY date_match DESC";
            $result = $bdco->prepare($query);
            $result->execute();
            
            //Loop through the result set and display the matches in the table -->
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) :
              //while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                echo '<tr>';
                  echo '<td>'.$row['date'].'</td>';
                  echo '<td>'.$row['team1'].'</td>';
                  echo '<td>'.$row['team2'].'</td>';
                echo '</tr>';
            endwhile;
          ?>
        </table>
      </div>           
    </div>
  
    <!-- Partie milieu : notes -->
    <div class="notes">
      <form action="submit_rating.php" method="post">
        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
        <label for="rating">Donner une note pour le dernier match effectué :</label>
        <fieldset class="rating">
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">1 étoile</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">2 étoiles</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">3 étoiles</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">4 étoiles</label>
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">5 étoiles</label>
        </fieldset>
        <input type="submit" value="Valider">
      </form>
  
      <?php 

        //Retrieve the data from the form
        $item_id = $_POST['item_id'];
        $user_id = $_SESSION['user_id']; //assuming you have a user_id in a session
        $rating = $_POST['rating'];

        //Insert the rating into the database
        $query = "INSERT INTO ratings (item_id, user_id, rating) VALUES ('$item_id', '$user_id', '$rating')";
        $result = $bdco->prepare($query);
        $result->execute();
      ?>

    </div>
    
  
    <!-- Partie droite : prochain match -->
    <p>Ajouter une date : </p>
    <p>Ajouter informations match (date, heure, lieu, équipe adverse : </p>
    <p>Ajouter deux titulaires : </p> <!-- ne proposer que des joueurs actifs, ne pas pouvoir valider tant que le nbr de joueurs pas atteint et informations modifiables-->
    <p>Ajouter un remplaçant : </p>
    <p>Ajouter une note : </p>
  
  
  </div>
  
  </body>
</html>
