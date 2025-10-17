<?php
// Перевіряємо, чи надійшли дані з форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["first_name"]);
    $lastName = trim($_POST["last_name"]);

    // Перевірка на порожні значення
    if (empty($firstName) || empty($lastName)) {
        echo "Помилка: всі поля повинні бути заповнені!";
    } else {
        // Перевірка типів даних (тільки літери)
        if (!preg_match("/^[a-zA-ZА-Яа-яІіЇїЄє]+$/u", $firstName) ||
            !preg_match("/^[a-zA-ZА-Яа-яІіЇїЄє]+$/u", $lastName)) {
            echo "Помилка: ім'я та прізвище повинні містити лише літери.";
        } else {
            echo "<h2>Привіт, $firstName $lastName!</h2>";
            echo "<p>Дані отримано успішно.</p>";
        }
    }
} else {
    echo "Немає даних для обробки.";
}
?>
