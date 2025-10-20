<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: welcome.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($login === 'admin' && $password === '12345') {
        $_SESSION['user'] = $login;
        $_SESSION['last_activity'] = time();
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Невірний логін або пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="uk"><head><meta charset="UTF-8"><title>Вхід</title></head>
<body>
<h2>Вхід у систему ($_SESSION)</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post">
<label>Логін:</label><br><input type="text" name="login" required><br><br>
<label>Пароль:</label><br><input type="password" name="password" required><br><br>
<input type="submit" value="Увійти">
</form>
</body></html>