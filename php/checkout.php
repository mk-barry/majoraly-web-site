<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
  <link rel="manifest" href="../favicon/site.webmanifest">
  <link rel="stylesheet" href="../css/checkout.css">
  <title>Validation de commande</title>
</head>
<?php
session_start();
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("<p>Votre panier est vide.</p><br><br><a href='menu.php'> Retour au menu</a>");
}
?>

<body>
    <div class="checkout-container">
        <h2>Validation de votre commande</h2>
        <form action="process_order.php" method="POST" class="checkout-form">
            <div class="form-group">
                <label for="nom">Nom complet :</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse email :</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse de livraison :</label>
                <textarea id="adresse" name="adresse" required></textarea>
            </div>

            <div class="form-group">
                <label for="moyen_paiement">Moyen de paiement :</label>
                <select name="moyen_paiement" id="moyen_paiement" required>
                    <option value="">-- Sélectionnez un moyen --</option>
                    <option value="carte">Carte bancaire</option>
                    <option value="mobile">Mobile Money</option>
                    <option value="cash">Paiement à la livraison</option>
                </select>
            </div>

            <button type="submit" class="btn-validate">Valider la commande</button>
        </form>
    </div>
</body>
</html>