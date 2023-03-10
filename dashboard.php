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
WHERE used = 'yes'";

$query = $pdo->prepare($sql);

$query->execute();

$numberOfPages = $query->fetch();

$nbcustomers = (int) $numberOfPages['nb_customers'];

//on détermine le nombre `a afficher par pages
$parPage = 12;

//On calcule le nombre total de pages
$pages = ceil($nbcustomers / $parPage);

//Calcul de la premiere page
$premier = $currentPage * $parPage - $parPage;

$query = $pdo->prepare('SELECT *
FROM tickets
WHERE used = "yes"
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

    <title>Mrpoke- Tableau de bord</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>

    <div class="content">
        <div class="dashboard text-center">

            <div class="container">
                <div class="row mt-5">
                    <div class="col-sm-12 col-md-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-4">
                                        Bonjour Admin
                                    </div>
                                    <div class="col col-md-4">
                                        <a href="tickets.php" class="btn btn-success float-end">
                                            Tickets
                                        </a>
                                    </div>

                                    <div class="col col-md-4">
                                        <a href="api/api.php?action=logout" class="btn btn-danger float-end">
                                            Déconnexion
                                        </a>
                                    </div>
                                </div>
                                <!--
                                <div class="row">
                                    <div class="">
                                        <a class="btn btn-primary mx-auto" href="api/api.php?action=createTickets">
                                            Générer 100
                                        </a>
                                    </div>
                                </div>
                                -->
                            </div>

                            <div class="card-body">
                                <?php if ($numberOfPages == 0) { ?>
                                <p class="text-center">
                                    Aucune inscription pour l'instant
                                </p>
                                <?php } else { ?>
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nom et prénoms</th>
                                            <th>Téléphone</th>
                                            <th>Ticket</th>
                                        </tr>

                                        <?php foreach (
                                            $articles
                                            as $article
                                        ) { ?>
                                        <tr>
                                            <td data-label="Nom et prénoms">
                                                <?php echo "{$article['first_name']} {$article['last_name']} "; ?></td>
                                            <td data-label="Téléphone"><?= $article[
                                                'phone_number'
                                            ] ?></td>
                                            <td data-label="Ticket"><?= $article[
                                                'code'
                                            ] ?></td>
                                        </tr>
                                        <?php } ?>

                                    </table>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="row text-center">
                    <div class="pages mx-auto text-center">
                        <ul class="pagination">
                            <li class="page-item <?= $currentPage == 1
                                ? 'disabled'
                                : '' ?> ">
                                <a href="dashboard.php?page=<?= $currentPage -
                                    1 ?>" class="page-link">Précédente</a>
                            </li>

                            <?php for ($page = 1; $page <= $pages; $page++): ?>

                            <li class="page-item <?= $currentPage == $page
                                ? 'active'
                                : '' ?> ">
                                <a href="dashboard.php?page=<?= $page ?>" class="page-link">
                                    <?= $page ?></a>
                            </li>

                            <?php endfor; ?>
                            <li class="page-item <?= $currentPage == $pages
                                ? 'disabled'
                                : '' ?> ">
                                <a href="dashboard.php?page=<?= $currentPage +
                                    1 ?>" class="page-link">Suivante</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include 'parts/footer.php'; ?>
</body>

</html>