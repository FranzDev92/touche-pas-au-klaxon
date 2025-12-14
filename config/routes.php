<?php
use App\Controller\TrajetController;
use App\Controller\AuthController;
use App\Controller\AdminController;

$router->get('/',function(){
  (new TrajetController())->publicList();
});

$router->get('/login',function(){
  (new AuthController())->loginForm();
});
$router->post('/login',function(){
  (new AuthController())->login();
});
$router->get('/logout',function(){
  (new AuthController())->logout();
});

$router->get('/trajet/create',function(){
  (new TrajetController())->createForm();
});
$router->post('/trajet/store',function(){
  (new TrajetController())->store();
});

$router->get('/trajet',function(){
  $id=isset($_GET['id'])?(int)$_GET['id']:0;
  (new TrajetController())->details($id);
});

$router->get('/admin',function(){
  (new TrajetController())->adminList();
});
$router->get('/admin/trajets',function(){
  (new TrajetController())->adminList();
});

/* EDIT */
$router->get('/admin/trajet/edit',function(){
  $id=isset($_GET['id'])?(int)$_GET['id']:0;
  (new TrajetController())->editForm($id);
});
$router->post('/admin/trajet/edit',function(){
  $id=isset($_POST['id'])?(int)$_POST['id']:0;
  (new TrajetController())->update($id);
});

/* DELETE */
$router->get('/admin/trajet/delete',function(){
  $id=isset($_GET['id'])?(int)$_GET['id']:0;
  (new TrajetController())->delete($id);
});

$router->get('/admin/users',function(){
  (new AdminController())->users();
});
$router->get('/admin/agences',function(){
  (new AdminController())->agences();
});
$router->post('/admin/agences/create',function(){
  (new AdminController())->createAgence();
});
$router->post('/admin/agences/{id}/update',function($id){
  (new AdminController())->updateAgence((int)$id);
});
$router->get('/admin/agences/{id}/delete',function($id){
  (new AdminController())->deleteAgence((int)$id);
});
