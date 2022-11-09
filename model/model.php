<?php

function open_database_connection()
{
    $connection = new PDO("mysql:host=localhost;dbname=blog_db", 'root', 'root');

    return $connection;
}

function get_all_posts()
{
    $connection = open_database_connection();


    $result = $connection->query('SELECT id, title FROM post');

    $posts = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    $connection = null;

    return $posts;
}
