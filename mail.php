<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $consent = isset($_POST["consent"]) ? true : false;

    // Проверяем, что email корректный и согласие получено
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный email.";
        exit;
    }

    if (!$consent) {
        echo "Необходимо дать согласие на обработку персональных данных.";
        exit;
    }

    // Настройки почты
    $to = "nastyapterova197@yandex.ru"; // Замените на ваш email
    $subject = "Новая подписка на рассылку";
    $message = "Новый подписчик:\nEmail: $email";
    $headers = "From: nastyapetrova197@yandex.ru\r\n"; // Замените на ваш email

    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        echo "Подписка успешно оформлена!";
    } else {
        echo "Ошибка при отправке письма.";
    }
} else {
    echo "Некорректный запрос.";
}
?>