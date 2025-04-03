<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";
$dbname = "Restaurant";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}

// Producten ophalen uit de database
$stmt = $conn->query("SELECT * FROM Menu");
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="Chappies.css">
</head>

<body>
<header>
    <div class="logo">
        <a href="Index.php">
            <img src="images/pngtree-food-logo-png-image_8239850.png" alt="Chappies Logo">
        </a>
        <span>Chappies</span>
    </div>
    <h1>Ons Menu</h1>
    <nav>
        <ul>
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="Inlog.php">Inloggen</a></li>
        </ul>
    </nav>
</header>

<!-- Dynamisch menu -->
<div class="menu">
    <div class="menu-item" onclick="toggleMenu('menu-lijst')">
        <img src="images/fg-burgers-icon-01.jpg" alt="Menu">
        <h2>Bekijk Menu</h2>
    </div>
</div>

<div class="menu-content" id="menu-lijst">
    <?php if (!empty($producten)): ?>
        <ul>
            <?php foreach ($producten as $product): ?>
                <li>
                    <strong><?= htmlspecialchars($product['naam']) ?></strong> -
                    €<?= number_format($product['prijs'], 2, ',', '.') ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Er staan momenteel geen producten op het menu.</p>
    <?php endif; ?>
</div>

<footer>
    <div class="socials">
        <div>Onze socials →</div>
        <img src="images/OIP (2).jpg" alt="Instagram">
        <img src="images/OIP.jpg" alt="Facebook">
    </div>
    <div>2025 Chappies Enterprise. Alle rechten voorbehouden</div>
</footer>
</body>

<script>
    function toggleMenu(id) {
        document.getElementById(id).classList.toggle('active');
    }
</script>
</html>
