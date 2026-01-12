<?php
$conn = new mysqli("localhost", "root", "", "netfish");

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
     <div class="logo">
<img src="../mainpage/logonetfish.png">

 

</div>
    <nav>
        <a href="../mainpage/home.php" class="btn">Video’s</a>
        <a href="" class="btn">Beheer</a>
        <a href="register.php" class="btn">Inloggen</a>
    </nav>
</header>

<main class="login-container">
    <form action="login.php" method="POST" class="login-form">
            <label>
            Naam:
            <input type="text" name="username" required>
        </label>

        <label>
            Gebruikersnaam:
            <input type="text" name="username" required>
        </label>

        <label>
            E-mail:
            <input type="email" name="email" required>

        <label>
            Wachtwoord:
            <input type="password" name="password" required>
        </label>

          <label>
            Wachtwoord ter controle:
            <input type="password" name="password" required>
        </label>

        <button type="submit">registreer</button>
    </form>
</main>

</body>
</html>
