<?php
// Connexion à la base de données (remplacez les valeurs par celles de votre base de données)
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "rent";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des valeurs du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête d'insertion des données dans la base de données
    $sql = "INSERT INTO signup (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    echo "Enregistrement réussi";
} catch (PDOException $e) {
    echo "Erreur lors de l'enregistrement : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn = null;
?>
