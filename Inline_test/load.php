<?php
// Настройки БД
require_once('db.php');

// Подключение к бд
$db = new Database();

// Получение данных
$postsJson = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$commentsJson = file_get_contents('https://jsonplaceholder.typicode.com/comments');

// Преобразование в таблицы
$posts = json_decode($postsJson, true);
$comments = json_decode($commentsJson, true);

// Счётчики
$postCount = 0;
$commentCount = 0;

// Вставка постов
$postCount = 0;
foreach ($posts as $post) {
    $db->query(
        "INSERT INTO posts (id, userId, title, body) VALUES (:id, :userId, :title, :body)",
        [
            'id'     => $post['id'],
            'userId' => $post['userId'],
            'title'  => $post['title'],
            'body'   => $post['body']
        ]
    );
    $postCount++;
}

// Вставка комментариев
$commentCount = 0;
foreach ($comments as $comment) {
    $db->query(
        "INSERT INTO comments (id, postId, name, email, body) VALUES (:id, :postId, :name, :email, :body)",
        [
            'id'     => $comment['id'],
            'postId' => $comment['postId'],
            'name'   => $comment['name'],
            'email'  => $comment['email'],
            'body'   => $comment['body']
        ]
    );
    $commentCount++;
}

// Вывод в консоль
echo "<script>console.log('Загружено {$postCount} записей и {$commentCount} комментариев');</script>";
