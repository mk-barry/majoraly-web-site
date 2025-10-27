<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("<p>Votre panier est vide.</p><a href='../menu.php'>Retour au menu</a>");
}

$nom = trim($_POST['nom'] ?? '');
$email = trim($_POST['email'] ?? '');
$telephone = trim($_POST['telephone'] ?? '');
$adresse = trim($_POST['adresse'] ?? '');
$moyen_paiement = trim($_POST['moyen_paiement'] ?? '');

if ($nom === '' || $email === '' || $telephone === '' || $adresse === '' || $moyen_paiement === '') {
    die("<p>Veuillez remplir tous les champs.</p><a href='checkout.php'>Retour</a>");
}

try {
    $pdo->beginTransaction();

    // 1️⃣ Enregistrer le client
    $stmt = $pdo->prepare("INSERT INTO client (nom, email, telephone, adresse) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $email, $telephone, $adresse]);
    $id_client = $pdo->lastInsertId();

    // 2️⃣ Calcul du total
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        if (isset($item['prix'], $item['q'])) {
            $total += $item['prix'] * $item['q'];
        }
    }

    // 3️⃣ Générer le numéro de commande unique
    $dateDuJour = date('Ymd');
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM commande WHERE DATE(date_commande) = CURDATE()");
    $stmt->execute();
    $countToday = $stmt->fetchColumn() + 1;
    $num_commande = sprintf("CMD-%s-%04d", $dateDuJour, $countToday);

    // 4️⃣ Enregistrer la commande avec le moyen de paiement
    $stmt = $pdo->prepare("INSERT INTO commande (id_client, num_commande, total, moyen_paiement, date_commande)
                           VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$id_client, $num_commande, $total, $moyen_paiement]);
    $id_commande = $pdo->lastInsertId();

    // 5️⃣ Enregistrer les détails de commande
    $stmt = $pdo->prepare("INSERT INTO commande_details (id_commande, id_menu, quantite, prix_unitaire)
                           VALUES (?, ?, ?, ?)");
    foreach ($_SESSION['cart'] as $id_menu => $item) {
        if (isset($item['prix'], $item['q'])) {
            $stmt->execute([$id_commande, $id_menu, $item['q'], $item['prix']]);
        }
    }

    $pdo->commit();
    $commande_details = $_SESSION['cart'];
    unset($_SESSION['cart']);

} catch (Exception $e) {
    $pdo->rollBack();
    die("Erreur lors de la commande : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="stylesheet" href="../css/checkout.css">
    <title>Commande validée</title>
</head>
<body>
    <div class="confirmation-container">
        <h2>Commande validée</h2>
        <p>Merci <strong><?= htmlspecialchars($nom) ?></strong> !</p>
        <p>Votre commande <strong><?= htmlspecialchars($num_commande) ?></strong> a été enregistrée avec succès.</p>
        <p><strong>Moyen de paiement :</strong> <?= htmlspecialchars($moyen_paiement) ?></p>
        <p><strong>Total :</strong> <?= number_format($total, 2, ',', ' ') ?> XAF</p>
        <a href="../index.php" class="btn-back">Retourner à l'accueil</a>
    </div>
</body>
</html>