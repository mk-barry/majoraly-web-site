<?php
session_start();
// include DB connection
require_once __DIR__ . '/php/config.php';
require_once __DIR__ . '/php/db.php';

// Handle add-to-cart via POST to cart_action
// Fetch menus from DB
$stmt = $pdo->prepare('SELECT id_menu, abreviation, nom, description, image, prix, categorie FROM menu ORDER BY date_creation DESC');
$stmt->execute();
$menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/menu.css">
  <title>Menu - Majoraly</title>
</head>
<body>
  <header class="header">
    <h1>Majoraly — Menu</h1>
    <div class="cart-link">
      <a href="cart.php" title="Voir mon panier">🛒 Mon panier (<?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'],'q')) : 0; ?>)</a>
    </div>
  </header>
  <main class="container">
    <div class="menu-grid">
      <?php foreach($menus as $m): ?>
        <article class="menu-card">
          <img src="<?php echo htmlspecialchars($m['image'] ?: 'images/menu/none.png'); ?>" alt="<?php echo htmlspecialchars($m['nom']); ?>" class="menu-img">
          <h3><?php echo htmlspecialchars($m['nom']); ?> <small>(<?php echo htmlspecialchars($m['abreviation']); ?>)</small></h3>
          <p class="cat"><?php echo htmlspecialchars($m['categorie']); ?></p>
          <p class="desc"><?php echo htmlspecialchars($m['description']); ?></p>
          <p class="price"><?php echo number_format($m['prix'], 0, ',', ' '); ?> FCFA</p>
          <form action="php/cart_action.php" method="post" class="add-form">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id_menu" value="<?php echo (int)$m['id_menu']; ?>">
            <label>Quantite:
              <input type="number" name="q" value="1" min="1" class="qty-input">
            </label>
            <button type="submit" class="btn">Ajouter au panier</button>
          </form>
        </article>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>
