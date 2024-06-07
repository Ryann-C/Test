<?php
require_once 'includes/login.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form action="index.php" method="post">
        <h2>Connexion</h2>
        <?php if (isset($error_message)) { echo '<p style="color:red;">' . $error_message . '</p>'; } ?>
        <label for="user">Nom d'utilisateur :</label>
        <input type="text" id="user" name="user" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
