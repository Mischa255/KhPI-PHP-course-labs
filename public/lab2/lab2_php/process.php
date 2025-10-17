<?php
$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_FILES['uploaded_file'])) {
    $file = $_FILES['uploaded_file'];
    $fileName = basename($file['name']);
    $targetFile = $uploadDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $fileSize = $file['size'];

    // Перевірка типу
    $allowedTypes = ['jpg', 'jpeg', 'png'];
    if (!in_array($fileType, $allowedTypes)) {
        die("Помилка: можна завантажувати лише зображення (jpg, jpeg, png).");
    }

    // Перевірка розміру
    if ($fileSize > 2 * 1024 * 1024) {
        die("Помилка: файл перевищує 2 МБ.");
    }

    // Перевірка чи існує
    if (file_exists($targetFile)) {
        $uniqueSuffix = "_" . date("Ymd_His");
        $fileName = pathinfo($fileName, PATHINFO_FILENAME) . $uniqueSuffix . "." . $fileType;
        $targetFile = $uploadDir . $fileName;
    }

    if (is_uploaded_file($file['tmp_name'])) {
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo "<h3>Файл успішно завантажено!</h3>";
            echo "<p>Ім’я файлу: $fileName</p>";
            echo "<p>Тип: $fileType</p>";
            echo "<p>Розмір: " . round($fileSize / 1024, 2) . " КБ</p>";
            echo "<a href='$targetFile' download>Завантажити файл</a><br>";
            echo "<a href='index.html'>Повернутись назад</a>";
        } else {
            echo "Помилка при збереженні файлу.";
        }
    } else {
        echo "Файл не було завантажено.";
    }
}
?>
