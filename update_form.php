<?php

session_start();
require_once 'db_connect.php';


$id = $_GET['disc_id'];


?>
<html>

<head>
    <meta charset="utf8">
    <title>Velvet record</title>
    <link href="./asset/CSS/index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container mt-5" style="max-width: 600px;">
        <h2>Modifier le vinyle</h2>

        <form action="update_script.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="disc_title" class="form-label">Title</label>
                <input type="text" class="form-control" id="disc_title" name="disc_title" value="<?= htmlspecialchars($_SESSION['getdiscID']['disc_title']); ?>" required>
            </div>
            <input type="number" class="form-control" id="disc_id" name="disc_id" value="<?= $id ;?>" hidden>
            <div class="mb-3">
                <label for="artist" class="form-artist">Nom de l'artiste</label>
                <select class="form-select" id="artist_name" name="artist_name" required>
                    <option value="">Choisir l'artiste</option>
                    <?php foreach ($_SESSION['getartist_id'] as $artiste):?>
                        <option  value="<?= htmlspecialchars($artiste->artist_name) ;?>"><?= htmlspecialchars($artiste->artist_name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="disc_year" class="form-label">Year</label>
                <input type="number" class="form-control" id="disc_year" name="disc_year" value="<?= htmlspecialchars($_SESSION['getdiscID']['disc_year']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="disc_genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="disc_genre" name="disc_genre" value="<?= htmlspecialchars($_SESSION['getdiscID']['disc_genre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="disc_label" class="form-label">Label</label>
                <input type="text" class="form-control" id="disc_label" name="disc_label" value="<?= htmlspecialchars($_SESSION['getdiscID']['disc_label']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="disc_price" class="form-label">Price</label>
                <input type="text" class="form-control" id="disc_price" name="disc_price" value="<?= htmlspecialchars($_SESSION['getdiscID']['disc_price']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="disc_picture" class="form-label">Picture</label>
                <input type="file" class="form-control" id="disc_picture" name="disc_picture" accept="image/*">
            </div>
            <!-- Affichage de l'image existante -->
            <div class="mb-3">
                <img src="<?php htmlspecialchars($_SESSION['getdiscID']['disc_picture'])  ?>" class="img-fluid" alt="Image du disque" style="max-width: 100%;">
            </div>
            <div class="d-flex justify-content-between">

                <button type="submit"  class="btn btn-primary">Modifier</button>
                <a href="index.php" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
<!-- <script src="form.js"></script> -->
</body>

</html>