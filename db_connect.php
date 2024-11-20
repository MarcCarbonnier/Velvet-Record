<?php

$hostname = 'localhost';
$dbname = 'record';
$username = 'admin';
$password = 'Afpa1234';


//var_dump($hostname,$dbname,$username,$password, '<br>'); //debug des varibale de log


try {
    $db = new PDO(
        "mysql:host=$hostname;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //affiche un message d'erreur si la connection ne ce fais pas à la base de donneés
    echo 'Erreur de connection a la base de données ' . $e->getMessage();
}

?>