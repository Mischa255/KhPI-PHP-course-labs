<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (!isset($_COOKIE['old_cart'])) $_COOKIE['old_cart'] = "[]";
if (isset($_POST['item'])) {
    $_SESSION['cart'][] = $_POST['item'];
    setcookie('old_cart', json_encode($_SESSION['cart']), time() + (7*24*60*60));
}
if (isset($_POST['clear'])) $_SESSION['cart'] = [];
$old_cart = json_decode($_COOKIE['old_cart'], true);
?>
<!DOCTYPE html>
<html lang="uk"><head><meta charset="UTF-8"><title>Кошик</title></head>
<body>
<h2>Корзина ($_SESSION + $_COOKIE)</h2>
<form method="post">
<input type="text" name="item" placeholder="Назва товару">
<input type="submit" value="Додати">
<button type="submit" name="clear">Очистити</button>
</form>
<h3>Поточна сесія:</h3>
<ul><?php foreach ($_SESSION['cart'] as $p) echo "<li>$p</li>"; ?></ul>
<h3>Попередні покупки (з cookie):</h3>
<ul><?php foreach ($old_cart as $p) echo "<li>$p</li>"; ?></ul>
</body></html>