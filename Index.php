<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Restaurant", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chappies</title>
    <link rel="stylesheet" href="Chappies.css">
</head>

<body>
<header><!--Logo is button naar homepagina-->
    <div class="logo">
        <a href="Index.html">
            <img src="images/pngtree-food-logo-png-image_8239850.png"
                 alt="Chappies Logo">
        </a>
        <span>Chappies</span>
    </div>
    <nav>
        <ul>
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="Inlog.php">Inloggen</a></li>
        </ul>
    </nav>
</header>
<section class="hero">
    <div class="image-container">
        <img src="images/downloaden.jpg" alt="Eten 1">
        <img src="images/R.jpg" alt="Eten 2">
        <div class="overlay-text">
            <h1>Het beste eten voor de laagste prijs!!</h1>
            <h2>Alleen bij Chappies.</h2>
        </div>
    </div>
    <!--Socials en copyright tekst voor fullen van de pagina-->
    <footer>
        <div class="socials">
            <div>Onze socials →</div>
            <a href="https://www.instagram.com" target="_blank">
                <img src="images/OIP (2).jpg" alt="Instagram">
                <a href="https://www.facebook.com/yourusername" target="_blank">
                    <img src="images/OIP.jpg" alt="Facebook">
        </div>
        <div>2025 Chappies Enterprise. Alle rechten voorbehouden</div>
    </footer>
</body>

</html>