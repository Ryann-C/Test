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
        $sql = "INSERT INTO reponses_bloc3 (reponse) VALUES (?)";
        
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
    header('Location:../public/fin.php');
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
    <title>Test - Réponse Bloc 3</title>
    <link rel ='stylesheet' href="../reponse3.css">
</head>
<body>
    <form id="form" action="reponse3.php" method="post">
        <div class="chrono-container">
            <div id="chrono"></div>
        </div>
        <div class="box">
            <div class="container">
                <h2><b>Veuillez cocher les images correspondant aux images visualisés :</b></h2>
                <div class="checkbox-container">
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="img1"><img src="../Images/Test1.png" alt="Image1"></label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="img2"><img src="../Images/Test2.png" alt="Image2"></label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="img3"><img src="../Images/Test3.png" alt="Image3"></label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="img4"><img src="../Images/Test4.png" alt="Image4"></label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="img5"><img src="../Images/Test5.png" alt="Image5"></label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="img6"><img src="../Images/Test6.png" alt="Image6"></label>
                    <label class="checkbox-label"><input type="checkbox" name="reponse[]" value="img7"><img src="../Images/Test7.png" alt="Image7"></label>
                </div>
                <button type="submit">Suivant</button>
            </div>
        </div>
    </form>
    <script src='../javascript/reponse3.js'></script>
</body>
</html>