<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistiques</title>
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

    <!-- Partie gauche : liste des matchs 
    <div class="liste matchs">
        <div class="à venir">
            <ul>
                <li><a href="#">Date match</a></li>
                <li><a href="#">Date match</a></li>
                <li><a href="#">Date match</a></li>
                <li><a href="#">Date match</a></li>
              </ul>
        </div>

        <div class="passé">
            <ul>
                <li><a href="#">Date match</a></li>
                <li><a href="#">Date match</a></li>
                <li><a href="#">Date match</a></li>
                <li><a href="#">Date match</a></li>
              </ul>
        </div> 
    </div>
    -->

    <?php
      // Connexion à la base de données
      $connection = mysqli_connect("host", "username", "password", "database");
      // Récupération de l'ID du match
      $match_id = $_GET['id'];
      // Requête pour récupérer les informations du match
      $query = "SELECT * FROM matches WHERE id = '$match_id'";
      $result = mysqli_query($connection, $query);
      $match = mysqli_fetch_assoc($result);
      // Requête pour récupérer les statistiques des joueurs
      $query = "SELECT player_id, SUM(points_scored) as points_scored, SUM(faults) as faults FROM stats WHERE match_id = '$match_id' GROUP BY player_id";
      $result = mysqli_query($connection, $query);
    ?>

    <h1>Statistiques des matchs</h1>
    <table>
      <tr>
        <th>Date</th>
        <th>Nom de l'équipe 1</th>
        <th>Score</th>
        <th>Nom de l'équipe 2</th>
      </tr>
      <tr>
        <td><?php echo $match['team1']; ?></td>
        <td><?php echo $match['score']; ?></td>
        <td><?php echo $match['team2']; ?></td>
      </tr>
    </table>

    <h1>Statistiques des joueurs</h1>
    <table>
      <tr>
        <th>Nom du joueur</th>
        <th>Points marqués</th>
        <th>Fautes</th>
        <th>Nombre de sélections consécutives</th>
        <th>Nombre de matchs gagnés</th>
        <th>Nombre de matchs perdus</th>
      </tr>
      <?php while($stats = mysqli_fetch_assoc($result)) {
        // Récupération de l'ID du joueur
        $player_id = $_GET['id'];
        // Requête pour récupérer les statistiques du joueur
        $query = "SELECT player_id, SUM(points_scored) as points_scored, SUM(faults) as faults FROM stats WHERE player_id = '$player_id' GROUP BY player_id";
        $result = mysqli_query($connection, $query);
        $stats = mysqli_fetch_assoc($result);
        // Requête pour compter le nombre de matchs gagnés
        $query = "SELECT COUNT(*) as wins FROM stats WHERE player_id = '$player_id' AND match_result = 'win'";
        $result = mysqli_query($connection, $query);
        $wins = mysqli_fetch_assoc($result)['wins'];
        // Requête pour compter le nombre de matchs perdus
        $query = "SELECT COUNT(*) as losses FROM stats WHERE player_id = '$player_id' AND match_result = 'loss'";
        $result = mysqli_query($connection, $query);
        $losses = mysqli_fetch_assoc($result)['losses'];
      ?>
      <tr>
        <td><?php echo $player['name']; ?></td>
        <td><?php echo $stats['points_scored']; ?></td>
        <td><?php echo $stats['faults']; ?></td>
        <td><?php echo $stats['selectionConsecutives']; ?></td>
        <td><?php echo $wins; ?></td>
        <td><?php echo $losses; ?></td>
      </tr>
      <?php } ?>
    </table>


    

  </body>
</html>
