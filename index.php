<?php
require_once 'db_connect.php';
require_once 'BDD.php';





$total = count($_SESSION["discs"]); //Renvoi le nombre de disque de la BDD

?>
<html>

<head>
    <meta charset="utf8">
    <title>Velvet record</title>
    <link href="./asset/CSS/index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1 class="txt-center col-6">La liste des disques (<?= $total ?>)</h1>
        <a href="add_form.php"><button type="button" class="btn btn-primary btn-a">Ajouter</button>
        </a>
    </header>
    <div class="container">
        <?php if (!empty($_SESSION['discs'])): ?>
            <div class="row">
                <?php foreach ($_SESSION['discs'] as $_SESSION['disc']): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="./pictures/<?= $_SESSION['disc']->disc_picture; ?>" class="img-fluid rounded-start" alt="Image du disque">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <!-- Fais une requete et creer une card a chaque nouveau disque -->
                                        <h5 class="card-title"><?= htmlspecialchars($_SESSION['disc']->disc_title) ?></h5>
                                        <p class="card-text"><!--Nom Artiste :--> <?= htmlspecialchars($_SESSION['disc']->artist_name) ?></p>
                                        <p class="card-text"><strong>Label :</strong> <?= htmlspecialchars($_SESSION['disc']->disc_label) ?></p>
                                        <p class="card-text"><strong>Année : </strong><?= htmlspecialchars($_SESSION['disc']->disc_year) ?></p>
                                        <p class="card-text"><strong>Genre :</strong> <?= htmlspecialchars($_SESSION['disc']->disc_genre) ?></p>
                                        <a href="detail.php?disc_id=<?= $_SESSION['disc']->disc_id?>"><button type="button" class="btn btn-primary btn-d">Détails</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Renvoi si aucun disuqe na été trouve en base de données-->
            <p>Aucun disque trouvé.</p>
        <?php endif; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>

</html>