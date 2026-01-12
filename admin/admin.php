<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: login.php");
    exit;
}
?>

<h1>Beheerder dashboard</h1>
