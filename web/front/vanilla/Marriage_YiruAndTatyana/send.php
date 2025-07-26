<?php
// Замените на ваш токен и chat_id
$token = '';
$chat_id = '';//

$fullname = $_POST['fullname'] ?? 'Не указано';
$attendance = $_POST['attendance'] ?? 'Не выбрано';

$message = "ФИО: $fullname\nПрисутствие: $attendance";

$url = "https://api.telegram.org/bot$token/sendMessage";

$data = [
    'chat_id' => $chat_id,
    'text' => $message
];

$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type:application/x-www-form-urlencoded",
        'content' => http_build_query($data)
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result) {
    echo "Уведомление отправлено!";
} else {
    echo "Ошибка при отправке.";
}
