<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Message</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="menu">
    <p class="menu-titulo">Message Board</p>
    <div>
        <a href="PostMessage.php">Post Message</a>
        <a href="MessageBoard.php">My Messages</a>
        <a href="logout.php">Logout</a>
    </div>
    <p class="menu-usuario">Logged in as: <strong><?= htmlspecialchars($userEmail) ?></strong></p>
</div>

<div class="contenido">
    <div class="caja">
        <h1>Post a Message</h1>

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

        <form action="PostMessage.php" method="POST">
            <div class="fila">
                <div class="campo">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject"
                           value="<?= htmlspecialchars($formData['subject'] ?? '') ?>" required>
                </div>

                <div class="campo">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name"
                           value="<?= htmlspecialchars($formData['name'] ?? '') ?>" required>
                </div>
            </div>

            <div class="campo">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" required><?= htmlspecialchars($formData['message'] ?? '') ?></textarea>
            </div>

            <div class="botones">
                <a href="MessageBoard.php" class="btn btn-gris">Cancel</a>
                <button type="submit" name="submit" class="btn btn-azul">Post Message</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
