<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="pagina-login">

<div class="login-contenedor">
    <div class="login-caja">
        <span class="marca">Message Board</span>
        <h1>Sign in</h1>
        <p class="subtitulo">Log in with your email and password.</p>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="exito"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                       value="<?= htmlspecialchars($oldEmail) ?>" required>
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <div class="password">
                    <input type="password" id="password" name="password" required>
                    <button type="button" class="btn btn-gris" id="ver-password">Show</button>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-azul btn-completo">Login</button>
        </form>
    </div>
</div>

<script src="assets/js/login.js"></script>
</body>
</html>
