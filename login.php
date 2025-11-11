<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="nav">
        <div class="navelem1"><a href="http://index" target="_blank" rel="noopener noreferrer">Index</a></div>
        <div class="navelem2">Üdv, kedves <?php echo isset($_SESSION['username']) && !empty($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Vendég';?> </div>
        <div class="navelem3"><a href="http://login" target="_blank" rel="noopener noreferrer">Login</a></div>
    </div>
    
    <div class="main">
        <h2>Bejelentkezés</h2>
        
        <form method="POST" action="">
            <label for="username">Felhasználónév:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit"<?php if ($isLoggedIn) echo 'disabled'; ?>>Belépés</button>
        </form>
        
        <?php if ($isLoggedIn): ?>
            <p style="color: green;">Már be vagy jelentkezve mint <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>.</p>
            <form method="POST" action="logout.php">
                <button type="submit">Kijelentkezés</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
