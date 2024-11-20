<?php

session_start();
require_once 'db_connect.php';


// Retrieve and validate POST data
$titre = filter_input(INPUT_POST, 'disc_title');
$name = filter_input(INPUT_POST, 'artist_name');
$year = filter_input(INPUT_POST, 'disc_year');
$genre = filter_input(INPUT_POST, 'disc_genre');
$label = filter_input(INPUT_POST, 'disc_label');
$price = filter_input(INPUT_POST, 'disc_price');
$id = filter_input(INPUT_POST, 'disc_id');

if (!$titre || !$name || !$year || !$genre || !$label || !$price) {
    die("Données invalides ou incomplètes.");
}

// Gestion du fichier image
$picturePath = null;
if (isset($_FILES['disc_picture']) && $_FILES['disc_picture']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = './pictures/';
    $fileName = uniqid() . '_' . basename($_FILES['disc_picture']['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['disc_picture']['tmp_name'], $targetPath)) {
        $picturePath = $targetPath;
    } else {
        die("Erreur lors du téléchargement de l'image.");
    }
}



// Debug output
var_dump($titre . '<br>');
var_dump($name . '<br>');
var_dump($year . '<br>');
var_dump($genre . '<br>');
var_dump($label . '<br>');
var_dump($price . '<br>');
var_dump($fileName .'<br>');
var_dump($id . '<br>');

try {
    $sql = "UPDATE disc d JOIN artist a ON d.artist_id = a.artist_id
    SET 
        disc_title = :titre,
        artist_name = :name,
        disc_label = :label, 
        disc_year = :year, 
        disc_genre = :genre, 
        disc_price = :price,
        disc_picture= :picture
    WHERE disc_id = :idd";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':titre' => $titre,
        ':name' => $name,
        ':label' => $label,
        ':year' => $year,
        ':genre' => $genre,
        ':price' => $price,
        ':picture' => $fileName,
        ':idd' => $id
    ]);

    // Redirect to the list page after a successful update
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    echo "Erreur lors de la mise à jour dans la base de données : " . $e->getMessage() . '<br>';
    print_r($stmt->errorInfo()); // Display more detailed error information if needed
}
?>
