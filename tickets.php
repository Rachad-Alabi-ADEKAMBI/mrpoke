<?php include 'api/api.php';
include 'parts/checkSession.php';

$pdo = getConnexion();
//on determine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

//on determine le nombre de clients total
$sql = "SELECT COUNT(tickets.id) AS nb_customers FROM tickets
ORDER BY id ASC";

$query = $pdo->prepare($sql);

$query->execute();

$numberOfPages = $query->fetch();

$nbcustomers = (int) $numberOfPages['nb_customers'];

//on détermine le nombre `a afficher par pages
$parPage = 24;

//On calcule le nombre total de pages
$pages = ceil($nbcustomers / $parPage);

//Calcul de la premiere page
$premier = $currentPage * $parPage - $parPage;

$query = $pdo->prepare('SELECT *
FROM tickets
ORDER BY id ASC
LIMIT :premier, :parpage');

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

$query->execute();

$articles = $query->fetchAll();

$query->closeCursor();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>Mrpoke- Tickets</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>

    <div class="content" id='app'>
        <div class="dashboard">

            <div class="container">
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-4">
                                        Bonjour Admin
                                    </div>
                                    <div class="col col-md-4">
                                        <a href="dashboard.php" class="btn btn-success float-end">
                                            Liste des inscrits
                                        </a>
                                    </div>

                                    <div class="col col-md-4">
                                        <a href="api/api.php?action=logout" class="btn btn-danger float-end">
                                            Déconnexion
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tickets mt-2 text-center mx-auto">
                <div class="tickets__content">
                    <?php foreach ($articles as $article) { ?>
                    <a href="ticket.php?id=<?= $article[
                        'id'
                    ] ?>" class="mx-auto text-center">
                        <div class="ticket mx-auto">
                            <header class="header">
                                <img src="public/img/food.png" alt="" class='food'>
                                <img src="public/img/bandeau.png" alt="" class='flag'>
                                <img src="public/img/icon-food.png" alt="" class='food'>
                            </header>

                            <main class="main">
                                <p class="top-text">
                                    Concours du <span>Mardi 14 Janvier 2023</span>
                                </p>

                                <p class="text">
                                    Pour valider votre participation au <strong>concours Mister Poke</strong>,
                                    scannez le <strong>code QR</strong> et suivez la page facebook
                                    <strong>@Mrpoke</strong>
                                </p>

                                <div class="row">
                                    <img src="public/img/phone.png" alt="">
                                    <div class="box">
                                        2 menus Maxi poke à gagner
                                    </div>
                                </div>

                                <div class="infos">
                                    <div class="info">
                                        <div class="black">Info</div>
                                        <div class="blue">0696109953</div>
                                    </div>

                                    <div class="info">
                                        <div class="black"> Info</div>
                                        <div class="blue">0696610888</div>
                                    </div>

                                    <div class="info">
                                        <div class="black"> Info</div>
                                    </div>
                                </div>

                                <div class="bottom">
                                    <div class="details">
                                        <img src="public/img/qr-sample.jpg" class="sample" alt=""
                                            style="height: 30px; width: 30px">
                                        <div class="details__main">
                                            <p>
                                                Votre numéro de participation:

                                            </p>

                                            <div class="strong">
                                                --<?= $article['code'] ?>---
                                            </div>

                                            <div class="thin">
                                                ( A présenter en cas de gain)
                                            </div>
                                        </div>

                                        <img src="public/img/bowl.png" alt="">
                                    </div>

                                    <div class="black">
                                        <p>
                                            Avec ce coupon vous bénéficiez de 10% de réduction
                                            72h après la date du concours
                                        </p>
                                    </div>
                                </div>
                            </main>

                            <img src="public/img/logo.png" class="abs" alt="">
                        </div>
                    </a>
                    <?php } ?>
                </div>

                <a class="btn btn-success mx-auto" href='print.php'>
                    Tout imprimer
                </a>
            </div>

            <div class="pages mx-auto text-center">
                <ul class="pagination mx-auto text-center">
                    <li class="page-item <?= $currentPage == 1
                        ? 'disabled'
                        : '' ?> ">
                        <a href="tickets.php?page=<?= $currentPage -
                            1 ?>" class="page-link">Précédente</a>
                    </li>

                    <?php for ($page = 1; $page <= $pages; $page++): ?>

                    <li class="page-item <?= $currentPage == $page
                        ? 'active'
                        : '' ?> ">
                        <a href="tickets.php?page=<?= $page ?>" class="page-link">
                            <?= $page ?></a>
                    </li>

                    <?php endfor; ?>
                    <li class="page-item <?= $currentPage == $pages
                        ? 'disabled'
                        : '' ?> ">
                        <a href="tickets.php?page=<?= $currentPage +
                            1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <?php include 'parts/footer.php'; ?>


</body>

</html>