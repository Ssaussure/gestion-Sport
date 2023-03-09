<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    session_start();

    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=mydb', 'username', 'password');

    // Check if user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();
    ?>
        <h1>Welcome, <?php echo $user['username']; ?>!</h1>
<table>
  <tr>
    <th>Name:</th>
    <td><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td><?php echo $user['email']; ?></td>
  </tr>
  <tr>
    <th>Address:</th>
    <td><?php echo $user['address']; ?></td>
  </tr>
  <tr>
    <th>Password:</th>
    <td>*********</td>
  </tr>
</table>
<div style="text-align: center; margin-top: 20px;">
  <a href='edit_account.php'>Edit account</a>
  <a href='#' onclick='confirmDelete()'>Delete account</a>
  <a href='logout.php'>Log out</a>
</div>
<?php
 } else {
     // Redirect to login page
     header('Location: login.php');
 }
 ?>
<script>
  function confirmDelete() {
    if (confirm("Are you sure you want to delete your account?")) {
      window.location.href = 'delete_account.php';
    }
  }
</script>

</body>
</html>
```