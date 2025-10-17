<?php
$logFile = "log.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['user_text'])) {
    $text = trim($_POST['user_text']);
    file_put_contents($logFile, $text . PHP_EOL, FILE_APPEND);
    echo "<h3>Текст успішно записано!</h3>";
}

if (file_exists($logFile)) {
    echo "<h3>Вміст файлу log.txt:</h3>";
    echo "<pre>" . htmlspecialchars(file_get_contents($logFile)) . "</pre>";
} else {
    echo "<p>Файл log.txt поки порожній.</p>";
}

echo "<a href='index.html'>Повернутись назад</a>";
?>
