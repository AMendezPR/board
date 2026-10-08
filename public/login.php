<?php
session_start();

// If POST, load the handler internally (not via browser URL)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');
    $_SESSION['old_email'] = $email; // para no volver a escribir el email si hay error
    require_once __DIR__ . '/../src/Handlers/LoginHandler.php';
    exit;
}

// Redirect if already logged in
if (!empty($_SESSION['access_token'])) {
    header("Location: PostMessage.php");
    exit;
}

$errors   = $_SESSION['form_errors']  ?? [];
$success  = $_SESSION['form_success'] ?? '';
$oldEmail = $_SESSION['old_email']    ?? '';
unset($_SESSION['form_errors'], $_SESSION['form_success'], $_SESSION['old_email']);

// la vista (html) esta separada en src/Views
require __DIR__ . '/../src/Views/login.view.php';
