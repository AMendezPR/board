<?php
session_start();

// If POST, load the handler internally
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    require_once __DIR__ . '/../src/Handlers/PostMessageHandler.php';
    exit;
}

// Redirect to login if not authenticated
if (empty($_SESSION['access_token'])) {
    header("Location: login.php");
    exit;
}

$errors    = $_SESSION['form_errors']  ?? [];
$success   = $_SESSION['form_success'] ?? '';
$formData  = $_SESSION['form_data']    ?? [];
$userEmail = $_SESSION['user_email']   ?? '';
unset($_SESSION['form_errors'], $_SESSION['form_success'], $_SESSION['form_data']);

// la vista (html) esta separada en src/Views
require __DIR__ . '/../src/Views/post-message.view.php';
