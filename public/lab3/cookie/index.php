<?php
if (isset($_POST['delete_cookie'])) {
    setcookie("username", "", time() - 3600);
    header("Location: index.php");
    exit;
}
if (isset($_POST['username']) && !empty($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    setcookie("username", $username, time() + (7 * 24 * 60 * 60));
    $message = "Привіт, $username! Твоє ім’я збережено в cookie.";
} elseif (isset($_COOKIE['username'])) {
    $message = "З поверненням, " . htmlspecialchars($_COOKIE['username']) . "!";
} else {
    $message = "Введіть своє ім’я:";
}
?>
<!DOCTYPE html>
<html lang="uk"><head><meta charset="UTF-8"><title>COOKIE</title></head>
<body>
<h2>Робота з $_COOKIE</h2>
<p><?php echo $message; ?></p>
<?php if (!isset($_COOKIE['username'])): ?>
<form method="post">
    <input type="text" name="username" required>
    <input type="submit" value="Зберегти">
</form>
<?php else: ?>
<form method="post">
    <input type="submit" name="delete_cookie" value="Видалити cookie">
</form>
<?php endif; ?>
</body></html>