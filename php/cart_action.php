<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

$action = $_POST['action'] ?? 'add';

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if ($action === 'add') {
    $id = (int)($_POST['id_menu'] ?? 0);
    $q = max(1, (int)($_POST['q'] ?? 1));
    if ($id > 0) {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['q'] += $q;
        } else {
            $_SESSION['cart'][$id] = ['q' => $q];
        }
    }
    header('Location: ../menu.php');
    exit;
}

if ($action === 'update') {
    // update quantities or remove if q==0
    $qs = $_POST['q'] ?? [];
    foreach ($qs as $id => $q) {
        $id = (int)$id;
        $q = (int)$q;
        if ($q <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id] = ['q' => $q];
        }
    }
    // handle single-item remove button
    if (!empty($_POST['remove'])) {
        $rid = (int)$_POST['remove'];
        unset($_SESSION['cart'][$rid]);
    }
    header('Location: ../cart.php');
    exit;
}

if ($action === 'clear') {
    $_SESSION['cart'] = [];
    header('Location: ../cart.php');
    exit;
}

// default redirect
header('Location: ../menu.php');
exit;
