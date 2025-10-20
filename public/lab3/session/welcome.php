<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
echo "<h2>Вітаємо, " . $_SESSION['user'] . "!</h2>";
echo "<p>Ви увійшли у систему.</p>";
echo "<a href='logout.php'>Вихід</a>";
?>