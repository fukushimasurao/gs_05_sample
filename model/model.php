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

function get_post_by_id($id)
{
    $connection = open_database_connection();

    $query = 'SELECT created_at, title, body FROM post WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    $connection = null;
    return $row;
}
