<?php
$conn = new mysqli("localhost", "root", "", "netfish");

if ($conn->connect_error) {
    die("Database fout: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm) {
        die("Wachtwoorden komen niet overeen");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $rol = 'gebruiker';

    $stmt = $conn->prepare(
        "INSERT INTO user (username, email, password, )
         VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $rol);
    $stmt->execute();

    header("Location: login.php");
    exit;
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
        <a href="wachtwoordvergeten.php" class="btn">WW Vergeten</a>
    </nav>
</header>

<main class="login-container">
   <form action="register.php" method="POST" class="login-form">

    <label>
        Gebruikersnaam:
        <input type="text" name="username" required>
    </label>

    <label>
        E-mail:
        <input type="email" name="email" required>
    </label>

    <label>
        Wachtwoord:
        <input type="password" name="password" required>
    </label>

    <label>
        Wachtwoord herhalen:
        <input type="password" name="password_confirm" required>
    </label>

    <button type="submit">REGISTREREN</button>
</form>

</main>

</body>
</html>
