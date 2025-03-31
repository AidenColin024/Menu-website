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
    <title>Back-end</title>
    <link rel="stylesheet" href="Chappies.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="Index.php">
                <img src="C:\Users\aiden\OneDrive - ROC Nijmegen\Webapplicatie\images\pngtree-food-logo-png-image_8239850.png"
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
    <div class="container">
        <h1>Dashboard</h1>
        <p>Beheer hier bestellingen en producten.</p>
        <div class="menu">
            <div class="menu-item" onclick="showContent('bestellingen')">
                <h2>Bestellingen</h2>
            </div>
            <div class="menu-item" onclick="showContent('producten')">
                <h2>Producten</h2>
            </div>
            <div class="menu-item" onclick="showContent('instellingen')">
                <h2>Instellingen</h2>
            </div>
        </div>
        
        <div id="bestellingen" class="content active">
            <h2>Bestellingen</h2>
            <p>Hier komen de bestellingen te staan.</p>
        </div>
        
        <div id="producten" class="content">
            <h2>Producten</h2>
            <p>Hier kun je producten beheren.</p>
            <input type="text" placeholder="Voeg product toe">
            <input type="number" placeholder="Voeg een prijs toe">
            <textarea placeholder="Voeg een beschrijving toe"></textarea>
            <input type="submit" value="Voeg toe">
        </div>
        
        <div id="instellingen" class="content">
            <h2>Instellingen</h2>
            <p>Hier kun je instellingen aanpassen.</p>
            <button>Site offline zetten</button>
        </div>
    </div>
</body>

<script>
    function showContent(id) {
        document.querySelectorAll('.content').forEach(el => el.classList.remove('active'));
        document.getElementById(id).classList.add('active');
    }
</script>
</html>