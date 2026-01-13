<?php
session_start();
$conn = new mysqli("localhost", "root", "", "netfish"); //connect met db

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST['password']; 

    $stmt = $conn->prepare("SELECT id, password, is_admin FROM user WHERE email = ?"); //gebruiker info uit db
    $stmt->bind_param("s", $email);
    $stmt->execute(); //zoekt gebruiker op basis van email
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($wachtwoord, $result['wachtwoord'])) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['rol'] = $result['rol'];

        if ($result['rol'] === 'beheerder') {
            header("Location: overzicht.php");
        } else {
            header("Location: dashboard.php"); 
        }
    } else {
        echo "Ongeldige login";
    }
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
        <a href="videos.html" class="btn">Video’s</a>
        <a href="" class="btn">Beheer</a>
        <a href="register.php" class="btn">registreren</a>
    </nav>
</header>

<main class="login-container">
    <form action="login.php" method="POST" class="login-form">
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