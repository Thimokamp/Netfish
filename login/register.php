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
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Netfish - Inloggen</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<header class="navbar">
    <div class="logo">🐟 NETFISH</div>
    <nav>
        <a href="videos.html" class="btn">Video’s</a>
        <a href="beheer.html" class="btn">Beheer</a>
        <a href="login.html" class="btn">Inloggen</a>
    </nav>
</header>

<main class="login-container">
    <form action="login-verwerken.html" method="POST" class="login-form">
        <label>
            Gebruikersnaam:
            <input type="text" name="username" required>
        </label>

        <label>
            Wachtwoord:
            <input type="password" name="password" required>
        </label>

        <button type="submit">LOGIN</button>
    </form>
</main>

</body>
</html>
