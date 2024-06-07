<?php
require_once 'session.php';
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user']) && isset($_POST['password'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE nom_utilisateur = :user');
        $query->execute(array('user' => $user));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['mot_de_passe'])) {
                header('Location: public/identifiant.php');
                exit();
            } else {
                $error_message = "Mot de passe incorrect.";
            }
        } else {
            $error_message = "Nom d'utilisateur incorrect.";
        }
    } else {
        $error_message = "Veuillez remplir tous les champs.";
    }
}
?>
