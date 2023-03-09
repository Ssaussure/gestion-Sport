<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joueurs</title>
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

    <!-- Partie gauche : liste des joueurs -->
    <div class="liste joueurs">
        <ul>
            <li><a href="#">Joueur</a></li>
            <li><a href="#">Joueur</a></li>
            <li><a href="#">Joueur</a></li>
            <li><a href="#">Joueur</a></li>
        </ul>
    </div>  
    
    <!--Partie milieu-->
    <div class="infos joueurs">
        <p>photo joueur</p>
        <p>Infos joueur : </p>
        <ul>
            <p>Nom : </p>
            <p>Prénom : </p>
            <p>Numero de licence : </p>
            <p>Taille? : </p>
            <p>Poids? : </p>
            <p>Date de naissance : </p>
            <p>Nombre matchs gagnés : </p>
            <p>Nombre matchs perdus : </p>
        </ul>
    </div>

    <!--Partie droite-->
    <div class="stats joueurs">
        <p>stats joueurs : </p>
        <p>matchs passés : </p>
        <p>note perso : (blessures, points forts,etc)</p>
    </div>

    <a href="ajouterJoueur.php">
      <button>Ajouter un joueur</button>
    </a>

  </body>
</html>
