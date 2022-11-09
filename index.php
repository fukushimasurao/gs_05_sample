<?php

require_once 'model/model.php';
require_once 'controllers.php';

// localhostの後の部分を入れる。
// http://localhost/gs_05_sample だったら、gs_05_sampleを下にいれる。

$url_query = '/gs_05_sample';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($url_query . '/index.php' === $uri) {
    list_action();
} elseif ($url_query . '/index.php/show' === $uri && isset($_GET['id'])) {
    show_action($_GET['id']);
} elseif ($url_query . '/index.php/info' === $uri) {
    show_php_info();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
