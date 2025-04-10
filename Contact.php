<?php
// Databaseverbinding
$host = "mysql_db";
$dbname = "Restaurant";
$username = "root"; // Pas aan naar jouw databasegebruikersnaam
$password = "rootpassword"; // Pas aan naar jouw databasewachtwoord

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}

// Formulier verwerken
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['naam']) && isset($_POST['bericht'])) {
        $naam = $_POST['naam'];
        $bericht = $_POST['bericht'];

        // Gegevens opslaan in de database
        $stmt = $conn->prepare("INSERT INTO Vragen (Naam, Bericht) VALUES (:naam, :bericht)");
        $stmt->execute([':naam' => $naam, ':bericht' => $bericht]);

        echo "Bedankt voor je vraag!";
    } else {
        echo "Vul alstublieft alle velden in.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="Inlog.php">Inloggen</a></li>
        </ul>
    </nav>
</header>
<!--Contact formulier gepakt van portfolio/pinkgoose opdracht-->
<div class="contact">
    <form class="pagina" method="POST" action="Contact.php">
        <h2>Heeft u een vraag?</h2>
        <p>Stel uw vraag hieronder en wij antwoorden hem zo snel mogelijk!</p>
        <input type="text" name="naam" class="styling-form" placeholder="Uw naam" required>
        <textarea name="bericht" class="message" placeholder="Uw vraag" rows="6" required></textarea>
        <div class="Send">
            <button type="submit" class="styling-form">Verzenden</button>
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