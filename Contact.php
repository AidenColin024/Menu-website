<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Restaurant", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}

// Formulierverwerking na indienen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verkrijg de formuliergegevens
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    $datum = date("Y-m-d H:i:s"); // Datum en tijd toevoegen

    // Zorg ervoor dat de velden niet leeg zijn
    if (!empty($email) && !empty($bericht)) {
        try {
            // Bereid de SQL-query voor en voer deze uit
            $stmt = $conn->prepare("INSERT INTO Vragen (email, bericht) VALUES (:email, :bericht)");
            $stmt->execute([
                ':email' => $email,
                ':bericht' => $bericht,
                ':datum' => $datum
            ]);
        } catch (PDOException $e) {
            echo "Fout bij het verzenden van de vraag: " . $e->getMessage();
        }
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
    <form class="pagina">
        <form method="POST" action="Back-end.php" class="pagina">
            <h2>Heeft u een vraag?</h2>
            <p>Stel uw vraag hieronder en wij antwoorden hem zo snel mogelijk!</p>
            <input type="email" class="styling-form" placeholder="Uw email" required>
            <textarea class="message" placeholder="Uw vraag" rows="6" required></textarea>
            <div class="Send">
                <button type="submit" class="styling-form">Send</button>
            </div>
        </form>
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