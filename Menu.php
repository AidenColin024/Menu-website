<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Restaurant", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
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
                <img src="images/pngtree-food-logo-png-image_8239850.png"
                    alt="Chappies Logo">
            </a>
            <span>Chappies</span>
        </div>
        <h1>Ons Menu</h1>
        <nav>
            <ul>
                <li><a href="Menu.html">Menu</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li><a href="Inlog.php">Inloggen</a></li>
            </ul>
        </nav>
    </header>
    <!--Menu waar je clickt op de foto en het menu van verschijnt-->
        <div class="menu">
            <div class="menu-item" onclick="toggleMenu('snacks')">
                <img src="images/fg-burgers-icon-01.jpg" alt="Snacks">
                <h2>Snacks</h2>
            </div>
            <div class="menu-item" onclick="toggleMenu('friet')">
                <img src="images/fg-fries-icon-01.jpg" alt="Friet">
                <h2>Friet</h2>
            </div>
            <div class="menu-item" onclick="toggleMenu('drinken')">
                <img src="images/fg-drinks-icon-01.jpg" alt="Drinken">
                <h2>Drinken</h2>
            </div>
        </div>

        <div class="menu-content" id="snacks">
            <p>Frikandel $2,00.</p>
            <p>Kroket $2,00.</p>
            <p>Bamischrijf $1,50.</p>
            <p>Bitterballen 6 stuks $3,50.</p>
            <p>Kaassouflé $1,75.</p>
        </div>

        <div class="menu-content" id="friet">
            <p>Friet $1.50.</p>
            <p>Friet met: mayo/kethup/curry/saté $2,50.</p>
            <p>Friet stoofvlees $3,50.</p>
        </div>

        <div class="menu-content" id="drinken">
            <p>Cola $1,50.</p>
            <p>Fanta $1,50.</p>
            <p>Sprite $ 1,50.</p>
            <p>Spa blauw/rood $1,50.</p>
        </div>
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