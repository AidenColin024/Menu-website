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

// Zoekterm ophalen van het formulier (indien aanwezig)
$searchTerm = '';
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
}

// SQL-query aanpassen op basis van zoekterm
if (!empty($searchTerm)) {
    $stmt = $conn->prepare("SELECT * FROM Menu WHERE naam LIKE :searchTerm");
    $stmt->execute([':searchTerm' => '%' . $searchTerm . '%']);
} else {
    $stmt = $conn->query("SELECT * FROM Menu");
}

// Resultaten ophalen
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="Chappies.css?v=<?php echo time(); ?>">
</head>
<body>

<header>
    <div class="logo">
        <a href="Index.php">
            <img src="images/pngtree-food-logo-png-image_8239850.png" alt="Chappies Logo">
        </a>
        <span>Chappies</span>
    </div>
    <nav>
        <ul>
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="Uitlog.php">Uitloggen</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Menu</h1>
    <p>Zoek naar producten op het menu:</p>

    <!-- Zoekbalk bovenaan de pagina -->
    <form method="POST">
        <input type="text" name="search" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Zoek naar een product" class="styling-form">
        <button type="submit" class="styling-form">Zoeken</button>
    </form>

    <!-- Productenlijst -->
    <h3>Bestaande producten</h3>
    <table class="styling-table">
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
        </tr>
        <?php if (!empty($producten)): ?>
            <?php foreach ($producten as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['naam']) ?></td>
                    <td>€<?= htmlspecialchars($product['prijs']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Geen producten gevonden</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>

