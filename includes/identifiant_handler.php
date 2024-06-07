<?php
require_once 'session.php';
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom']) && isset($_POST['prenom'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        try {
            $query = $bdd->prepare('INSERT INTO candidat (nom, prenom) VALUES (:nom, :prenom)');
            $query->execute(array('nom' => $nom, 'prenom' => $prenom));
            header('Location: ../question/question.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>
