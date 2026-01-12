<?php
$conn = new mysqli("localhost", "root", "", "database");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = 'gebruiker'; // standaard rol

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, rol) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $naam, $email, $wachtwoord, $rol);
    $stmt->execute();

    header("Location: login.php");
}
?>
