<?php
session_start();
require_once 'db_connect.php';


?>
<html>

<head>
    <meta charset="utf8">
    <title>Velvet record</title>
    <link href="./asset/CSS/index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <h2 class="text">Ajouter un vinyle</h2>

    <div class="container center">
        <form action="add_script.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Titre du disque</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
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
                <label for="label" class="form-label">Label</label>
                <input type="text" class="form-control" id="label" name="label" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Année de sortie</label>
                <input type="number" class="form-control" id="year" name="year" min="1900" max="2099" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" min="5" max="35" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image de la couverture</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </form>
    </div>





</body>

</html>