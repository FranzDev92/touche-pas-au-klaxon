<?php
namespace App\Controller;

use App\Model\TrajetModel;

class TrajetController extends BaseController{
public function publicList():void{
$model=new TrajetModel($this->pdo);
$trajets=$model->findAllPublic();
$this->render('trajet/liste_public',['trajets'=>$trajets]);
}

public function details(int $id):void{
if($id<=0){
$this->setFlash('danger','Trajet introuvable.');
$this->redirect('/');
}
$model=new TrajetModel($this->pdo);
$trajet=$model->findOneWithUser($id);
if(!$trajet){
$this->setFlash('danger','Trajet introuvable.');
$this->redirect('/');
}
$this->render('user/details',['trajet'=>$trajet]);
}

public function adminList():void{
$this->requireAdmin();
$model=new TrajetModel($this->pdo);
$trajets=$model->findAllPublic();
$this->render('admin/trajets',['trajets'=>$trajets]);
}

public function createForm():void{
if(empty($_SESSION['user'])){
$this->setFlash('danger','Vous devez être connecté pour créer un trajet.');
$this->redirect('/login');
}
$this->render('trajet/create');
}

public function store():void{
if(empty($_SESSION['user'])){
$this->setFlash('danger','Vous devez être connecté pour créer un trajet.');
$this->redirect('/login');
}

$depart=trim($_POST['depart']??'');
$destination=trim($_POST['destination']??'');
$date_depart=trim($_POST['date_depart']??'');
$heure_depart=trim($_POST['heure_depart']??'');
$date_arrivee=trim($_POST['date_arrivee']??'');
$heure_arrivee=trim($_POST['heure_arrivee']??'');
$places_total=(int)($_POST['places_total']??0);

if($depart===''||$destination===''||$date_depart===''||$heure_depart===''||$places_total<=0){
$this->setFlash('danger','Veuillez remplir tous les champs obligatoires.');
$this->redirect('/trajet/create');
}

$model=new TrajetModel($this->pdo);

try{
$model->create([
'depart'=>$depart,
'destination'=>$destination,
'date_depart'=>$date_depart,
'heure_depart'=>$heure_depart,
'date_arrivee'=>($date_arrivee!==''?$date_arrivee:null),
'heure_arrivee'=>($heure_arrivee!==''?$heure_arrivee:null),
'places_total'=>$places_total,
'user_id'=>$_SESSION['user']['id']??0
]);
$this->setFlash('success','Trajet créé avec succès.');
$this->redirect('/admin/trajets');
}catch(\Throwable $e){
error_log('ERREUR TRAJET CREATE : '.$e->getMessage());
$this->setFlash('danger','Erreur lors de l’enregistrement : '.$e->getMessage());
$this->redirect('/trajet/create');
}
}

public function editForm(int $id):void{
$this->requireAdmin();
$model=new TrajetModel($this->pdo);
$trajet=$model->findOne($id);
if(!$trajet){
$this->setFlash('danger','Trajet introuvable.');
$this->redirect('/admin/trajets');
}
$this->render('admin/trajet_edit',['trajet'=>$trajet]);
}

public function update(int $id):void{
$this->requireAdmin();
$data=[
'depart'=>trim($_POST['depart']??''),
'destination'=>trim($_POST['destination']??''),
'date_depart'=>trim($_POST['date_depart']??''),
'heure_depart'=>trim($_POST['heure_depart']??''),
'date_arrivee'=>trim($_POST['date_arrivee']??''),
'heure_arrivee'=>trim($_POST['heure_arrivee']??''),
'places_total'=>(int)($_POST['places_total']??0),
];
$model=new TrajetModel($this->pdo);
$model->update($id,$data);
$this->setFlash('success','Trajet modifié.');
$this->redirect('/admin/trajets');
}

public function delete(int $id):void{
$this->requireAdmin();
$model=new TrajetModel($this->pdo);
$model->delete($id);
$this->setFlash('success','Trajet supprimé.');
$this->redirect('/admin/trajets');
}
}
