<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: info_form.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk"><head><meta charset="UTF-8"><title>Server Info</title></head>
<body>
<h2>Інформація з $_SERVER</h2>
<p>IP клієнта: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
<p>Браузер: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
<p>Скрипт: <?php echo $_SERVER['PHP_SELF']; ?></p>
<p>Метод запиту: <?php echo $_SERVER['REQUEST_METHOD']; ?></p>
<p>Шлях до файлу: <?php echo __FILE__; ?></p>
</body></html>