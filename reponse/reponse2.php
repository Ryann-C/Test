<?php
include '../includes/db.php';
include '../includes/functions.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si des réponses ont été sélectionnées
    if (isset($_POST["reponse"]) && !empty($_POST["reponse"])) {
        // Récupérer les réponses sélectionnées
        $reponses = $_POST["reponse"];
        
        // Préparer la requête d'insertion
        $sql = "INSERT INTO reponses_bloc2 (reponse) VALUES (?)";
        
        // Préparer l'instruction SQL
        $stmt = $conn->prepare($sql);
        
        // Liaison des paramètres et exécution de la requête pour chaque réponse
        foreach ($reponses as $reponse) {
            $stmt->bind_param("s", $reponse);
            $stmt->execute();
        }
        
        // Fermer la déclaration
        $stmt->close();
        
        echo "Les réponses ont été enregistrées avec succès.";
    } else {
        echo "Veuillez sélectionner au moins une réponse.";
    }
    header('Location:../question/question3.php');
    exit();
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test - Réponse Bloc 2</title>
    <link rel="stylesheet" href="../reponse2.css">
</head>
<body>
    <form id="form" action="reponse2.php" method="post">
        <div class="chrono-container">
            <div id="chrono"></div>
        </div>
        <div class="box">
            <div class="container">
                <h2>Veuillez cocher les réponses :</h2>
                <div class="checkbox-container">
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Achat">Achat</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Télévision">Télévision</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Jouer">Jouer</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Clavier">Clavier</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Baisse">Baisse</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Répondeur">Répondeur</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Imprimante">Imprimante</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Ecrivain">Ecrivain</label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="Dossier">Dossier</label>
                </div>
                <button type="submit">Suivant</button>
            </div>
        </div>
    </form>
    <script src="../javascript/reponse2.js"></script>
</body>
</html>
