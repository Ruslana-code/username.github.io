<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $category = trim(htmlspecialchars($_POST['category']));
    $message = trim(htmlspecialchars($_POST['message']));
    
    // Ваш email
    $to = "msh_vl@mail.ru";
    
    // Тема письма
    $subject = "Новое предложение для сайта Октябрьск: " . $category;
    
    // Тело письма
    $body = "
    📧 НОВОЕ СООБЩЕНИЕ С САЙТА ОКТЯБРЬСК
    
    👤 Имя: $name
    📧 Email: $email
    📋 Категория: $category
    
    💬 Сообщение:
    $message
    
    ---
    Это сообщение отправлено с формы обратной связи сайта Октябрьск
    ";
    
    // Заголовки
    $headers = "From: site@oktyabrsk.ru\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    
    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "success";
    } else {
        http_response_code(500);
        echo "error";
    }
} else {
    http_response_code(405);
    echo "Method not allowed";
}
?>
