<?php
include 'api/api.php';
include 'parts/checkSession.php';

$id = verifyInput($_GET['id']);

$pdo = getConnexion();
$req = $pdo->prepare('SELECT * from tickets WHERE
    id = ?');
$req->execute([$id]);
$exist = $req->fetch();
$var = $exist['code'];
$req->closeCursor();

if (!$exist) { ?> <div class="mt-5">
    <p class="text-center">
        Ticket introuvable, merci de vérifier le qr code '
    </p>
</div>

<?php exit();} else {$_SESSION['ticket'] = [
        'id' => $id,
        'var' => $exist['code'],
    ];}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>MrPoke - Ticket</title>
</head>

<body>

    <?php include 'parts/header.php'; ?>

    <div class="content"> <br><br>
        <div class="ticket">
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
                    scannez le <strong>code QR</strong> et suivez la page facebook <strong>@Mrpoke</strong>
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
                        <iframe src="qrcode.php?var=<?= $var ?>" class="qr" frameborder="0"></iframe>

                        <div class="details__main">
                            <p>
                                Votre numéro de participation:

                            </p>

                            <div class="strong">
                                --<?= $exist['code'] ?>---
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
    </div>

    <?php include 'parts/footer.php'; ?>

</body>

</html>