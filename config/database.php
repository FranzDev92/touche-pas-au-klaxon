<?php

function getPDO(): PDO
{
    return new PDO(
        'mysql:host=127.0.0.1;port=3307;dbname=touche_pas_au_klaxon;charset=utf8mb4',
        'root',
        '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
}
