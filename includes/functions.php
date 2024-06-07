<?php
function getCandidatId($conn, $nom, $prenom) {
    $sql = "SELECT id FROM candidat WHERE nom = ? AND prenom = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nom, $prenom);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["id"];
    } else {
        return null;
    }
}
?>
