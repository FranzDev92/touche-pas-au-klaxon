<?php
namespace App\Model;

class TrajetModel extends BaseModel{
public function findAllPublic():array{
$sql="SELECT id,
             depart,
             destination,
             date_depart,
             heure_depart,
             date_arrivee,
             heure_arrivee,
             places_total,
             places_disponibles
      FROM trajet
      WHERE date_depart>=CURDATE()
      AND places_disponibles>0
      ORDER BY date_depart,heure_depart";
return $this->pdo->query($sql)->fetchAll();
}
public function findOneWithUser(int $id):?array{
$sql="SELECT t.id,t.depart,t.destination,t.date_depart,t.heure_depart,t.date_arrivee,t.heure_arrivee,t.places_total,t.places_disponibles,u.nom,u.prenom,u.telephone,u.email
FROM trajet t
JOIN users u ON t.user_id=u.id
WHERE t.id=:id
LIMIT 1";
$stmt=$this->pdo->prepare($sql);
$stmt->execute(['id'=>$id]);
$r=$stmt->fetch();
return $r?:null;
}
public function findAllAdmin():array{
$sql="SELECT t.id,a1.nom AS depart,a2.nom AS destination,
t.date_depart,t.heure_depart,t.date_arrivee,t.heure_arrivee,t.places_total
FROM trajets t
JOIN agences a1 ON a1.id=t.id_agence_depart
JOIN agences a2 ON a2.id=t.id_agence_arrivee
ORDER BY t.date_depart,t.heure_depart";
return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
}
