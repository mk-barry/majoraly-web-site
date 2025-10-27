<?php
session_start();
require_once __DIR__ . '/php/config.php';
require_once __DIR__ . '/php/db.php';

// build list of IDs in cart
$cart = $_SESSION['cart'] ?? [];
$ids = array_keys($cart);
$items = [];
if (count($ids) > 0) {
    // prepare a query with placeholders
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT id_menu, nom, prix, image FROM menu WHERE id_menu IN ($placeholders)");
    $stmt->execute($ids);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r) {
        $id = $r['id_menu'];
        $items[$id] = $r;
        $items[$id]['q'] = $cart[$id]['q'] ?? 0;
    }
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
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Panier - Majoraly</title>
</head>
<body>
  <main class="container">
    <h1>Mon panier</h1>
    <?php if (empty($items)): ?>
      <p>Votre panier est vide. <br><br> <a href="menu.php">Voir le menu</a></p>
    <?php else: ?>
      <form action="php/cart_action.php" method="post">
        <input type="hidden" name="action" value="update">
        <table class="cart-table">
          <thead><tr><th>Produit</th><th>Prix</th><th>Quantite</th><th>Total</th><th>Suppr.</th></tr></thead>
          <tbody>
            <?php $grand = 0; foreach($items as $id => $it): 
              $line = $it['prix'] * $it['q'];
              $grand += $line;
            ?>
              <tr>
                <td>
                  <img src="<?php echo htmlspecialchars($it['image'] ?: 'images/menu/none.png'); ?>" alt="" class="mini">
                  <?php echo htmlspecialchars($it['nom']); ?>
                </td>
                <td><?php echo number_format($it['prix'], 0, ',', ' '); ?> FCFA</td>
                <td><input type="number" name="q[<?php echo (int)$id; ?>]" value="<?php echo (int)$it['q']; ?>" min="0"></td>
                <td><?php echo number_format($line, 0, ',', ' '); ?> FCFA</td>
                <td><button type="submit" name="remove" value="<?php echo (int)$id; ?>" class="btn small">Suppr.</button></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <p class="grand">Total: <?php echo number_format($grand, 0, ',', ' '); ?> FCFA</p>
        <div class="cart-actions">
          <button type="submit" class="btn">Mettre à jour</button>
          <a href="menu.php" class="btn">Ajouter un article</a>
          <button type="submit" name="action" value="clear" class="btn alt">Vider le panier</button>
          <a href="php/checkout.php" class="btn btn-valid">Valider ma commande</a>
        </div>
      </form>
    <?php endif; ?>
  </main>
</body>
</html>
