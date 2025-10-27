<?php
$serveur = "localhost";      // généralement localhost en local
$utilisateur = "root";       // ton nom d'utilisateur MySQL
$motdepasse = "";            // ton mot de passe MySQL (souvent vide en local)
$base = "majoraly";        // le nom de ta base de données

// Connexion à MySQL
$conn = new mysqli($serveur, $utilisateur, $motdepasse, $base);

// Vérifier si la connexion a échoué
if ($conn->connect_error) {
    die("❌ Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Optionnel : définir l'encodage en UTF-8 pour les caractères spéciaux
$conn->set_charset("utf8");
?>