<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: Inlog.php');
    exit();
}

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

// Product toevoegen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "toevoegen") {
            // Verwijder de beschrijving, want deze is niet aanwezig in de database
            $stmt = $conn->prepare("INSERT INTO Menu (naam, prijs) VALUES (:naam, :prijs)");
            $stmt->execute([
                ':naam' => $_POST['naam'],
                ':prijs' => $_POST['prijs']
            ]);
        } elseif ($_POST['action'] == "verwijderen") {
            $stmt = $conn->prepare("DELETE FROM Menu WHERE id = :id");
            $stmt->execute([':id' => $_POST['id']]);
        } elseif ($_POST['action'] == "updaten") {
            // Verwijder de beschrijving uit de update query
            $stmt = $conn->prepare("UPDATE Menu SET naam = :naam, prijs = :prijs WHERE id = :id");
            $stmt->execute([
                ':id' => $_POST['id'],
                ':naam' => $_POST['naam'],
                ':prijs' => $_POST['prijs']
            ]);
        }
    }
}

// Producten ophalen
$stmt = $conn->query("SELECT * FROM Menu");
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Dashboard</h1>
    <p>Beheer hier bestellingen en producten.</p>
    <div class="menu">
        <div class="menu-item" onclick="showContent('bestellingen')">
            <h2>Bestellingen</h2>
        </div>
        <div class="menu-item" onclick="showContent('producten')">
            <h2>Producten</h2>
        </div>
    </div>

    <div id="bestellingen" class="content active">
        <h2>Bestellingen</h2>
        <p>Hier komen de bestellingen te staan.</p>
    </div>

    <div id="producten" class="content">
        <h2>Productbeheer</h2>

        <!-- Product toevoegen -->
        <form method="POST" class="pagina">
            <input type="hidden" name="action" value="toevoegen">
            <input type="text" name="naam" class="styling-form" placeholder="Productnaam" required>
            <input type="number" name="prijs" class="styling-form" placeholder="Prijs (€)" step="0.01" required>
            <div class="Send">
                <button type="submit" class="styling-form">Product toevoegen</button>
            </div>
        </form>

        <!-- Productlijst -->
        <h3>Bestaande producten</h3>
        <table class="styling-table">
            <tr>
                <th>Naam</th>
                <th>Prijs</th>
                <th>Acties</th>
            </tr>
            <?php foreach ($producten as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['naam']) ?></td>
                    <td>€<?= htmlspecialchars($product['prijs']) ?></td>
                    <td>
                        <button class="styling-form" onclick="editProduct(<?= $product['id'] ?>, '<?= addslashes($product['naam']) ?>', <?= $product['prijs'] ?>)">Bewerken</button>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="verwijderen">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button type="submit" class="styling-form">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Update formulier (verborgen totdat je een product bewerkt) -->
        <div id="editForm" class="pagina" style="display:none;">
            <h3>Product bewerken</h3>
            <form method="POST">
                <input type="hidden" name="action" value="updaten">
                <input type="hidden" id="editId" name="id">
                <input type="text" id="editNaam" name="naam" class="styling-form" required>
                <input type="number" id="editPrijs" name="prijs" class="styling-form" step="0.01" required>
                <div class="Send">
                    <button type="submit" class="styling-form">Wijzigingen opslaan</button>
                    <button type="button" class="styling-form" onclick="cancelEdit()">Annuleren</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showContent(id) {
        document.querySelectorAll('.content').forEach(el => el.classList.remove('active'));
        document.getElementById(id).classList.add('active');
    }

    function editProduct(id, naam, prijs) {
        document.getElementById("editId").value = id;
        document.getElementById("editNaam").value = naam;
        document.getElementById("editPrijs").value = prijs;
        document.getElementById("editForm").style.display = "block";
    }

    function cancelEdit() {
        document.getElementById("editForm").style.display = "none";
    }
</script>

</body>
</html>


