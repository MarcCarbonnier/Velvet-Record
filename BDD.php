<?php
session_start();
require_once 'db_connect.php';




$requete = $db->prepare("SELECT * FROM disc d LEFT JOIN artist a ON d.artist_id = a.artist_id ORDER BY artist_name");
$requete->execute();
$discs = $requete->fetchAll(PDO::FETCH_OBJ);
$_SESSION["discs"] = $discs;
// Test requete DB
//print_r($_SESSION["discs"]);


function getdiscID($id, $db)
{
    if (!$id) {
        return null;
    }

    $query = $db->prepare("SELECT * FROM disc d JOIN artist a ON d.artist_id = a.artist_id WHERE d.disc_id = :disc_id");
    $query->bindParam(':disc_id', $id, PDO::PARAM_INT);
    $query->execute();

    $discID = $query->fetch(PDO::FETCH_ASSOC);

    if (!$discID) {
        echo "No disc found with ID: $id";
    }

    return $discID;
}



function DropItem($id ,$db){
    $query= $db->prepare("DELETE FROM disc WHERE disc_id=:disc_id");
    $query->bindParam(':disc_id', $id, PDO::PARAM_INT);
    $query->execute([
        ':disc_id' => $id
    ]);
}

function effacer($id,$db){
if(isset($_GET['disc_id']))
{
    
    $id = $_SESSION['getdiscID']['disc_id'];
    DropItem($id,$db);
}};


function getartist_id($db){
    $query= $db->prepare("SELECT * FROM artist a WHERE artist_id");
    $query->execute();
    $artist= $query->fetchALL(PDO::FETCH_OBJ);
    return $artist;
}
$_SESSION['getartist_id']=getartist_id($db);

?>