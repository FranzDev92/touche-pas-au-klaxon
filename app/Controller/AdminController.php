<?php
namespace App\Controller;

use App\Model\TrajetModel;
use App\Model\UtilisateurModel;
use App\Model\AgenceModel;

class AdminController extends BaseController
{
    public function trajets(): void
    {
        $this->requireAdmin();
        $model=new TrajetModel($this->pdo);
        $trajets=$model->findAllPublic();
        $this->render('admin/trajets',[
            'trajets'=>$trajets,
            'isAdminPage'=>true
        ]);
    }

    public function users():void{
$this->requireAdmin();
$stmt=$this->pdo->query('SELECT id,nom,prenom,email,telephone,role,is_admin FROM utilisateur ORDER BY nom,prenom');
$users=$stmt->fetchAll(\PDO::FETCH_ASSOC);
$this->render('admin/users',['users'=>$users]);
}

    public function agences(): void
    {
        $this->requireAdmin();
        $model=new AgenceModel($this->pdo);
        $agences=$model->findAll();
        $this->render('admin/agences',[
            'agences'=>$agences,
            'isAdminPage'=>true
        ]);
    }

    public function createAgence(): void
    {
        $this->requireAdmin();
        $ville=trim($_POST['ville']??'');
        if($ville!==''){
            $stmt=$this->pdo->prepare('INSERT INTO agence(ville) VALUES(:ville)');
            $stmt->execute(['ville'=>$ville]);
            $this->setFlash('success','Agence créée');
        }
        $this->redirect('/admin/agences');
    }

    public function updateAgence(int $id): void
    {
        $this->requireAdmin();
        $ville=trim($_POST['ville']??'');
        if($ville!==''){
            $stmt=$this->pdo->prepare('UPDATE agence SET ville=:ville WHERE id=:id');
            $stmt->execute(['ville'=>$ville,'id'=>$id]);
            $this->setFlash('success','Agence modifiée');
        }
        $this->redirect('/admin/agences');
    }

    public function deleteAgence(int $id): void
    {
        $this->requireAdmin();
        $stmt=$this->pdo->prepare('DELETE FROM agence WHERE id=:id');
        $stmt->execute(['id'=>$id]);
        $this->setFlash('success','Agence supprimée');
        $this->redirect('/admin/agences');
    }
}
