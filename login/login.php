<?php
session_start();
$conn = new mysqli("localhost", "root", "", "database");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, rol FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($wachtwoord, $result['wachtwoord'])) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['rol'] = $result['rol'];

        if ($result['rol'] === 'beheerder') {
            header("Location: admin.php");
        } else {
            header("Location: dashboard.php");
        }
    } else {
        echo "Ongeldige login";
    }
}
?>
