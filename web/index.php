<?php 

require_once __DIR__.'/../app.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $uri) {
    home_action();
} elseif ('/index.php/single' === $uri && isset($_GET['id'])){
    show_single($_GET['id']);
} elseif ('/index.php/pyramide' === $uri && isset($_GET['nb'])){
   pyramide_action($_GET['nb']);
} elseif ('/index.php/damier' === $uri && isset($_GET['nb'])){
   damier_action($_GET['nb']);
} elseif ('/index.php/circle' === $uri && isset($_GET['nb'])){
   circle_action($_GET['nb']);
} elseif ('/index.php/syracuse' === $uri && isset($_GET['nb'])){
   syracuse_action($_GET['nb']);
} elseif ('/index.php/cryptage' === $uri) {
    cryptage_action();
}elseif ('/index.php/cryptage/encode' === $uri && isset($_GET['txt']) && isset($_GET['nb1']) && isset($_GET['nb2'])) {
    encode_action($_GET['nb1'],$_GET['nb2'],$_GET['txt']);
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
