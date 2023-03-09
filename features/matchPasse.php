<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Match passe</title>
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
    
    <!-- Partie gauche : liste des matchs -->
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

    <!-- Partie milieu : match passé -->
    <div class="note match">
        <p>Note du match : (étoiles) </p> <!--Ajouter/modifier/supprimer-->
        <p>Score du match : </p> 
        <p>Note : </p>
        <p>Joueurs titulaires : </p>
        <p>Joueur remplaçant : </p>
        <p>Informations match (date, lieu, etc)</p>
    </div>
  

  </body>
</html>
