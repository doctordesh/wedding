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


// Admin
$app->get('/admin', function() {
  Util::route('AdminSessionsController', 'new_');
});

$app->post('/admin', function() {
  Util::route('AdminSessionsController', 'authenticate');
});

$app->get('/admin/logout', function() {
  Util::route('AdminSessionsController', 'destroy');
});

$app->get('/admin/invites', function() {
  Util::route('Admin\InvitesController', 'index');
});

$app->run();