<?php
$uploadDir = "uploads/";

echo "<h2>Список файлів у директорії 'uploads'</h2>";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir);
}

$files = array_diff(scandir($uploadDir), ['.', '..']);

if (count($files) === 0) {
    echo "<p>Немає завантажених файлів.</p>";
} else {
    echo "<ul>";
    foreach ($files as $file) {
        $filePath = $uploadDir . $file;
        echo "<li><a href='$filePath' download>$file</a></li>";
    }
    echo "</ul>";
}

echo "<a href='index.html'>Повернутись назад</a>";
?>
