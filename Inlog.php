<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == "aidencolindna@gmail.com" && $_POST['password'] == "geheim") {
            $_SESSION['username'] = "aidencolindna@gmail.com";
            header("location: Back-end.php");
            exit();
        } else {
            echo "<script>alert('Ongeldige inloggegevens!');</script>";
        }
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
        <input type="email" name="username" class="styling-form" placeholder="Email" required>
        <input type="password" name="password" class="styling-form" placeholder="Wachtwoord" required>
        <div class="Send">
            <button type="submit" class="styling-form">Send</button>
        </div>
    </form>
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

</html>
