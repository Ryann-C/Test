<?php
require_once '../includes/identifiant_handler.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nom/Prénom - Test</title>
    <link rel="stylesheet" href="../identifiant.css">
</head>
<body>
    <div class="box">
        <h1>Quel est votre nom et votre prénom ?</h1>
        <form action="identifiant.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <button type="submit">Commencer</button>
        </form>
    </div>
</body>
</html>
