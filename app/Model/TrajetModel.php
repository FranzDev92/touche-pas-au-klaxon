<?php
namespace App\Model;
use PDO;

class TrajetModel extends BaseModel{
public function findAllPublic():array{
$sql="
SELECT
t.id,
t.depart,
t.date_depart,
t.heure_depart,
t.destination,
t.date_arrivee,
t.heure_arrivee,
t.places_total
FROM trajet t
ORDER BY t.date_depart,t.heure_depart
";
$stmt=$this->pdo->query($sql);
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
return $rows?:[];
}

public function findOneWithUser(int $id):?array{
$sql="
SELECT
t.id,
t.depart,
t.date_depart,
t.heure_depart,
t.destination,
t.date_arrivee,
t.heure_arrivee,
t.places_total,
u.nom,
u.prenom,
u.email,
u.telephone
FROM trajet t
LEFT JOIN utilisateur u ON u.id=t.user_id
WHERE t.id=:id
LIMIT 1
";
$stmt=$this->pdo->prepare($sql);
$stmt->execute(['id'=>$id]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
return $row?:null;
}

public function findOne(int $id):?array{
$stmt=$this->pdo->prepare("
SELECT *
FROM trajet
WHERE id=:id
LIMIT 1
");
$stmt->execute(['id'=>$id]);
return $stmt->fetch(PDO::FETCH_ASSOC)?:null;
}

public function create(array $data):int{
$sql="
INSERT INTO trajet(
depart,
destination,
date_depart,
heure_depart,
date_arrivee,
heure_arrivee,
places_total,
user_id
)VALUES(
:depart,
:destination,
:date_depart,
:heure_depart,
:date_arrivee,
:heure_arrivee,
:places_total,
:user_id
)
";
$stmt=$this->pdo->prepare($sql);
$stmt->execute([
'depart'=>$data['depart']??'',
'destination'=>$data['destination']??'',
'date_depart'=>$data['date_depart']??'',
'heure_depart'=>$data['heure_depart']??'',
'date_arrivee'=>$data['date_arrivee']??null,
'heure_arrivee'=>$data['heure_arrivee']??null,
'places_total'=>(int)($data['places_total']??0),
'user_id'=>(int)($data['user_id']??0),
]);
return (int)$this->pdo->lastInsertId();
}

public function update(int $id,array $data):void{
$sql="
UPDATE trajet SET
depart=:depart,
destination=:destination,
date_depart=:date_depart,
heure_depart=:heure_depart,
date_arrivee=:date_arrivee,
heure_arrivee=:heure_arrivee,
places_total=:places_total
WHERE id=:id
";
$stmt=$this->pdo->prepare($sql);
$stmt->execute([
'depart'=>$data['depart']??'',
'destination'=>$data['destination']??'',
'date_depart'=>$data['date_depart']??'',
'heure_depart'=>$data['heure_depart']??'',
'date_arrivee'=>($data['date_arrivee']!==''?$data['date_arrivee']:null),
'heure_arrivee'=>($data['heure_arrivee']!==''?$data['heure_arrivee']:null),
'places_total'=>(int)($data['places_total']??0),
'id'=>$id
]);
}

public function delete(int $id):void{
$stmt=$this->pdo->prepare("DELETE FROM trajet WHERE id=:id");
$stmt->execute(['id'=>$id]);
}

public function findByUser(int $userId): array{
$stmt=$this->pdo->prepare("
SELECT id,depart,destination,date_depart,heure_depart,date_arrivee,heure_arrivee,places_total
FROM trajet
WHERE user_id=:id
ORDER BY date_depart,heure_depart
");
$stmt->execute(['id'=>$userId]);
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
return $rows?:[];
}
}
