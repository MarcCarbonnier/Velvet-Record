<?php

include 'BDD.php';

// Retrieve the disc ID from the URL
$id = ($_GET['disc_id']) ? $_GET['disc_id'] : null;



if ($id) {
    //var_dump(getdiscID($id, $db)); //Debug de $id
    $_SESSION['getdiscID'] = getdiscID($id, $db);
} else {
    echo "No disc_id provided in URL.";
}



?>
<html>

<head>
    <meta charset="utf8">
    <title>Velvet record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./asset/CSS/index.css" rel="stylesheet">
</head>

<body>
    <div class="container center">




        <?php if (!empty($_SESSION['getdiscID'])): ?>





            <div class="card col-md-12">
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="./pictures/<?= $_SESSION['getdiscID']['disc_picture'] ?>" class="img-fluid rounded-start" alt="Image du disque">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($_SESSION['getdiscID']['disc_title']) ?></h5>
                                    <p class="card-text"><!-- Nom artiste--> <?= htmlspecialchars($_SESSION['getdiscID']['artist_name']); ?></p>
                                    <p class="card-text">Genre : <?= htmlspecialchars($_SESSION['getdiscID']['disc_genre']) ?></p>
                                    <p class="card-text">Label : <?= htmlspecialchars($_SESSION['getdiscID']['disc_label']) ?></p>
                                    <p class="card-text">Année : <?= htmlspecialchars($_SESSION['getdiscID']['disc_year']) ?></p>
                                    <p class="card-text">Prix : <?= htmlspecialchars($_SESSION['getdiscID']['disc_price']) ?></p>
                                </div>
                                <form method="post">
                                    <div class="nav-button">
                                        <a class="btn btn-primary btn-d" href="update_form.php?disc_id=<?= $_SESSION['getdiscID']['disc_id'] ?>">Modifier</a>
                                        <a href="delete_album.php?disc_id=<?php echo $_SESSION['getdiscID']['disc_id']?>"  class="btn btn-primary btn-d" name="erase">Suprimer</a>
                                        <a href="index.php"><button type="button" class="btn btn-primary btn-d">Retour</button>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p style="text-align:center;">Aucun disque trouvé.</p>
        <?php endif; ?>
    </div>
</body>

</html>