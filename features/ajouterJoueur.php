<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ajouter un joueur</title>
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
            if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            $position = $_POST['position'];
            $team = $_POST['team'];

            // Insertion des données dans la base de données
            $query = "INSERT INTO players (name, age, position, team) VALUES ('$name', '$age', '$position', '$team')";
            mysqli_query($connection, $query);

            // Redirection vers la page des joueurs
            header("Location: players.php");
            }
        ?>
        <div class="ajoutJoueur">
            <form action="add_player.php" method="post" enctype="multipart/form-data">
            <br>
            <!-- Ajout photo joueur -->
            <label for="photo">Photo :</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <br>
            <input type="submit" value="Ajouter" name="submit">
            <br>
            <!-- Champs de formulaire -->
            <label for="licence">Numéro de licence :</label>
            <input type="number" id="licence" name="licence" required>
            <br>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            <br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
            <br>
            <label for="age">Âge :</label>
            <input type="number" id="age" name="age" required>
            <br>
            <label for="poids">Poids :</label>
            <input type="number" id="poids" name="poids" required>
            <br>
            <label for="taille">Taille :</label>
            <input type="number" id="taille" name="taille" required>
            <br>
            <label for="poste">Poste :</label>
            <select id="poste" name="poste" required>
                <option value="defender">Défenseur</option>
                <option value="forward">Attaquant</option>
            </select>
            <br>
            <div class="AnnulerOuValider">
                <a href="joueurs.php">
                    <button>Annuler</button>
                </a>
                <input type="submit" value="Ajouter" name="submit">
                
            </div>
               
            </form>
        </div>
    </body>
</html>