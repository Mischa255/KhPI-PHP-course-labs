<?php
session_start();
$timeout = 300;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();
    session_destroy();
    echo "Сесію завершено через неактивність.<br><a href='index.php'>Оновити сторінку</a>";
    exit;
}
$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html lang="uk"><head><meta charset="UTF-8"><title>Активність сесії</title></head>
<body>
<h2>Контроль активності ($_SESSION['last_activity'])</h2>
<p>Сесія активна. Остання активність: <?php echo date("H:i:s", $_SESSION['last_activity']); ?></p>
</body></html>