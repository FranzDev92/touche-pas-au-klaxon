<?php
namespace App\Model;
class AgenceModel extends BaseModel{
public function findAll():array{
$sql='SELECT id,ville FROM agence ORDER BY ville';
$stmt=$this->pdo->query($sql);
return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
}
