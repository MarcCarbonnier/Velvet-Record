<?php
session_start();
include 'db_connect.php';

// Retrieve and validate POST data
$titre = filter_input(INPUT_POST, 'title');
$name = filter_input(INPUT_POST, 'artist_name');
$year = filter_input(INPUT_POST, 'year');
$genre = filter_input(INPUT_POST, 'genre');
$label = filter_input(INPUT_POST, 'label');
$price = filter_input(INPUT_POST, 'prix');
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = './pictures/';
    $fileName = basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        echo "Fichier téléchargé avec succès : " . htmlspecialchars($fileName) . '<br>';
        // Mettez à jour `disc_picture` dans la base de données
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
}

if (!$titre || !$name || !$year || !$genre || !$label || !$price) {
    die("Données invalides ou incomplètes.");
}

// Debug output
var_dump($titre . '<br>');
var_dump($name . '<br>');
var_dump($year . '<br>');
var_dump($genre . '<br>');
var_dump($label . '<br>');
var_dump($price . '<br>');
var_dump($fileName . '<br>');


try {
    // Insérer l'artiste et récupérer son ID
    $requete2 = $db->prepare("INSERT INTO artist (artist_name) VALUES (:name)");
    $requete2->execute([":name" => $name]);
    $artistId = $db->lastInsertId();

    // Insérer dans `disc` avec la clé étrangère `artist_id`
    $requete = $db->prepare("
    INSERT INTO disc (disc_title, artist_id, disc_label, disc_year, disc_genre, disc_price, disc_picture) 
    VALUES (:title, :artist_id, :label, :year, :genre, :prix, :picture)
");
    $requete->execute([
        ":title" => $titre,
        ":artist_id" => $artistId,
        ":label" => $label,
        ":year" => $year,
        ":genre" => $genre,
        ":prix" => $price,
        ":picture" => $fileName,
    ]);

    // Redirection vers la page de liste des disques
    header("Location: index.php");

    exit;
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion dans la base de données : " . $e->getMessage();
};
