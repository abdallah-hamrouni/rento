<?php
// Connexion à la base de données (remplacez les valeurs par celles de votre base de données)
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "rent";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des valeurs du formulaire de connexion
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête de vérification des informations de connexion
    $sql = "SELECT * FROM signup WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user) {
        header('Location: index.php');
        // Faites ici ce que vous souhaitez faire après une connexion réussie, par exemple, enregistrer les informations de l'utilisateur dans une session.
    } else {
        echo "E-mail ou mot de passe incorrect";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la connexion : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn = null;
?>
