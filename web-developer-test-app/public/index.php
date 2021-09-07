
<?php

include_once '../app/classes/request.class.php';
include_once '../app/classes/router.class.php';
$router = new Router(new Request);

$router->get('/web-developer-test-app/public', function($request) {
  $document_root = $_SERVER['DOCUMENT_ROOT'];
  include __DIR__. '/default.php';
});

$router->get('/web-developer-test-app/public/subscribed', function($request) {
  $document_root = $_SERVER['DOCUMENT_ROOT'];
  include __DIR__. '/subscribed.php';
});