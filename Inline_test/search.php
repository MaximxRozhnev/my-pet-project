<?php
header('Content-Type: application/json; charset=utf-8');

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Получаем данные из POST запроса
$postData = file_get_contents('php://input');
parse_str($postData, $params);
$searchTerm = trim($params['q'] ?? '');

// Валидация запроса
if (empty($searchTerm)) {
    http_response_code(400);
    echo json_encode(['error' => 'Запрос пустой']);
    exit;
}

try {
    // Подключение БД
    require_once 'db.php';
    $db = new Database();
    
    // Запрос
    $results = $db->fetchAll("
        SELECT 
            c.id as comment_id,
            c.postID as comment_postId,
            c.name as comment_title,
            c.body as comment_text,
            p.id as post_id,
            p.title as post_title
        FROM 
            `comments` c
        JOIN 
            `posts` p ON p.id = c.postId
        WHERE 
            c.`body` LIKE CONCAT('%', :search, '%')
    ", ['search' => $searchTerm]);
    
    echo json_encode($results ?: []);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка БД: ' . $e->getMessage()]);
}