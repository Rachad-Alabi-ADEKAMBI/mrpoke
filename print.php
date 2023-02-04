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
$parPage = 500;

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

<body onload="window.print()">

    <div class="content" id='app'>
        <div class="dashboard">

            <div class="tickets mt-2">
                <div class="tickets__content">
                    <?php foreach ($articles as $article) { ?>
                    <a href="ticket.php?id=<?= $article['id'] ?>">
                        <div class="ticket">
                            <header class="header">
                                <img src="public/img/food.png" alt="" class='food'>
                                <img src="public/img/bandeau.png" alt="" class='flag'>
                                <img src="public/img/food.png" alt="" class='food'>
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
                                        <div class="black">Info:</div>
                                        <div class="blue">0696109953</div>
                                    </div>

                                    <div class="info">
                                        <div class="black"> Info:</div>
                                        <div class="blue">0696610888</div>
                                    </div>
                                </div>

                                <div class="bottom">
                                    <div class="details">
                                        <iframe src="qrcode.php?var=<?= $article[
                                            'code'
                                        ] ?>" class="qr" frameborder="0"></iframe>

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
            </div>

        </div>
    </div>


</body>

</html>