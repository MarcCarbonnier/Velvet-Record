<?php /*
session_start();


$requete = $dbh->prepare("SELECT * FROM disc d INNER JOIN artist a ON d.artist_id = a.artist_id ORDER BY artist_name");
$requete->execute();
$discs = $requete->fetchAll(PDO::FETCH_OBJ);
$_SESSION["discs"]=$discs;
 Test requete DB
print_r($discs);


$_SESSION['id_disc'];

// Renvoi les details pour le disque Selectionné
function getdiscID($id,$dbh){

    $query= $dbh->prepare("SELECT * FROM disc d JOIN artist a ON d.artist_id=a.artist_id WHERE d.disc_id=:disc_id");
    $query-> bindparam(':disc_id', $id,PDO::PARAM_INT);
    $query->execute();
    $discID= $query->fetch();
    return $discID;
}
$_SESSION['getdiscID']=getdiscID($id, $dbh);
*/
?>