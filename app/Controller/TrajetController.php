<?php
namespace App\Controller;

use App\Model\TrajetModel;

class TrajetController extends BaseController{
private TrajetModel $trajetModel;

public function __construct(){
parent::__construct();
$this->trajetModel=new TrajetModel($this->pdo);
}

public function publicList():void{
$trajets=$this->trajetModel->findAllPublic();
$this->render('trajet/liste_public',['trajets'=>$trajets]);
}

public function details(int $id):void{
if($id<=0){
header('Location: /');
exit;
}
$trajet=$this->trajetModel->findOneWithUser($id);
if(!$trajet){
header('Location: /');
exit;
}
$this->render('user/details',['trajet'=>$trajet]);
}
}
