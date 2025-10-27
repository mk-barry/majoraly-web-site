<?php
$serveur = getenv("MYSQLHOST");
$utilisateur = getenv("MYSQLUSER");
$motdepasse = getenv("MYSQLPASSWORD");
$base = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

// Connexion à MySQL
$conn = new mysqli($serveur, $utilisateur, $motdepasse, $base, $port);

// Vérifier si la connexion a échoué
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Optionnel : définir l'encodage en UTF-8 pour les caractères spéciaux
$conn->set_charset("utf8");

?>




