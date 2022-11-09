<?php


$id = $_GET['id'];

$connection = new PDO("mysql:host=localhost;dbname=blog_db", 'root', 'root');

$result = $connection->query('SELECT id, title FROM post WHERE id = ' . $id);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>List of Posts</title>
    </head>
    <body>
        <h1>List of Posts</h1>
        <ul>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <p>タイトル : <?=  $row['title'] ?></p>
            <?php endwhile ?>
        </ul>

        <p><a href="index.php">戻る</a></p>
    </body>
</html>

<?php
$connection = null;
?>
