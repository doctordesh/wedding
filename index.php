<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/bootstrap.php');

session_start();

$app = new \Slim\Slim();

$app->get('/', function() {
  Util::route('MainController', 'index');
});

$app->post('/sessions', function() {
  Util::route('SessionsController', 'authenticate');
});

$app->get('/logout', function() {
  Util::route('SessionsController', 'destroy');
});

$app->get('/wedding/invite/:id/edit', function($id) {
  $_REQUEST['invite']['id'] = $id;
  Util::route('Wedding\InvitesController', 'edit');
});

$app->put('/wedding/invite/:id', function($id) {
  $_REQUEST['invite']['id'] = $id;
  Util::route('Wedding\InvitesController', 'update');
});

$app->run();