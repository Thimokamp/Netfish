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
        <a href="login.html" class="btn">Inloggen</a>
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