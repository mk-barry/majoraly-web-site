<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/site.webmanifest">
  <link rel="stylesheet" href="css/reservation.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Réservation</title>
</head>
<body>
  <header class="header">
    <h1>Réservations</h1>
    <div class="cart-link">
       <a href="index.php">Retourner à l'accueil</a>
    </div>
  </header>
  <main class="container">
    <form action="php/reservation_handler.php" method="post" class="form">
      <label>Nom complet
        <input type="text" name="nom" required>
      </label>
      <label>Téléphone
        <input type="tel" name="telephone" required>
      </label>
      <label>Date et heure
        <input type="datetime-local" name="datetime" required>
      </label>
      <label>Nombre de personnes
        <input type="number" name="couvert" min="1" value="2" required>
      </label>
      <label>Remarques
        <textarea name="remarques"></textarea>
      </label>
      <button type="submit" class="btn">Envoyer la réservation</button>
    </form>
  </main>
</body>
</html>
