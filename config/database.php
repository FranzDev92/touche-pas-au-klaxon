<?php
function getPDO():PDO{
$dsn='mysql:host=127.0.0.1;port=3307;dbname=touche_pas_au_klaxon;charset=utf8mb4';
$user='root';
$pass='';
$options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
return new PDO($dsn,$user,$pass,$options);
}
