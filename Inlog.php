<?php
session_start();

$host = "mysql_db";
$dbname = "Restaurant";
$username = "root";
$password = "rootpassword";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruiker = $_POST['Gebruiker'];
    $wachtwoord = $_POST['Wachtwoord'];

    $stmt = $conn->prepare("SELECT * FROM Gebruikers WHERE Gebruiker = :Gebruiker AND Wachtwoord = :Wachtwoord");
    $stmt->execute([
        ':Gebruiker' => $gebruiker,
        ':Wachtwoord' => $wachtwoord
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['username'] = $user['Gebruiker'];
        header("Location: Back-end.php");
        exit();
    } else {
        echo "Ongeldige gebruikersnaam of wachtwoord.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
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
    <nav>
        <ul>
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="Inlog.html">Inloggen</a></li>
        </ul>
    </nav>
</header>
<div class="contact">
    <form class="pagina" method="POST">
        <h2>Inloggen</h2>
        <p>Werkt u bij ons of bent u de eigenaar? Log dan hier in.</p>
        <input type="text" name="Gebruiker" class="styling-form" placeholder="Gebruiker" required>
        <input type="password" name="Wachtwoord" class="styling-form" placeholder="Wachtwoord" required>
        <div class="Send">
            <button type="submit" class="styling-form">Inloggen</button>
        </div>
    </form>
</div>

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
