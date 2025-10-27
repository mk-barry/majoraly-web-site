<?php
// Simple reservation handler: validate and store in a reservations table (optional)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../reservation.php');
    exit;
}
$nom = trim($_POST['nom'] ?? '');
$telephone = trim($_POST['telephone'] ?? '');
$datetime = $_POST['datetime'] ?? '';
$couvert = (int)($_POST['couvert'] ?? 1);
$remarques = trim($_POST['remarques'] ?? '');

// Basic validation
if ($nom === '' || $telephone === '' || $datetime === '') {
    die('Veuillez remplir tous les champs requis.');
}

// Try to save to DB if table exists, otherwise just show confirmation.
require_once __DIR__ . '/config.php';
try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('
        INSERT INTO reservations (nom, telephone, datetime_reservation, couvert, remarques, date_creation)
        VALUES (?, ?, ?, ?, ?, NOW())
    ');
    $stmt->execute([$nom, $telephone, $datetime, $couvert, $remarques]);
    $saved = true;
} catch (Exception $e) {
    $saved = false;
    // If DB/table not present, ignore and continue to confirmation page.
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/site.webmanifest">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Réservation enregistrée</title>
</head>
<body>
  <main class="container">
    <h1>Réservation reçue</h1>
    <p>Merci <?php echo htmlspecialchars($nom); ?>, votre réservation pour <?php echo (int)$couvert; ?> personne(s) le <?php echo htmlspecialchars($datetime); ?> a bien été reçue.</p>
    <?php if (!$saved): ?>
      <p>Remarque: la réservation n'a pas pu être enregistrée en base (table `reservations` manquante). Vous pouvez créer la table à partir du fichier SQL fourni.</p>
    <?php endif; ?>
    <p><a href="../index.php" class="btn-back">Retourner à l'accueil</a></p>
  </main>
</body>
</html>
