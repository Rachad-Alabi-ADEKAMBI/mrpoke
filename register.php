<?php
include 'api/api.php';
$var = verifyInput($_GET['var']);

$pdo = getConnexion();
$req = $pdo->prepare('SELECT id from tickets WHERE
    code = ?');
$req->execute([$var]);
$exist = $req->fetch();
$req->closeCursor();

if (!$exist) { ?>
<div class="mt-5">
    <p class="text-center">
        Ticket introuvable, merci de vérifier le qr code '
    </p>
</div>

<?php exit();}

$req = $pdo->prepare('SELECT id from tickets WHERE
    code = ? AND used = "yes"');
$req->execute([$var]);
$used = $req->fetch();
$req->closeCursor();

if ($used) { ?>
<div class="mt-5">
    <p class="text-center">
        Ticket déjà utilisé, merci de vérifier le qr code
    </p>
</div>
<?php exit();} else {$_SESSION['register'] = [
        'var' => $var,
    ];}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>Mrpoke- Inscription au jeu concours</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 mx-auto">
                    <form class="form" method="POST" action="api/api.php?action=register">

                        <img src="public/img/logo.png" alt="">

                        <h1>
                            Inscription au jeu concours
                        </h1>

                        <label for="">
                            Ticket: <span><?= $var ?></span>
                        </label>

                        <label for="">
                            Nom:
                            <input type="text" required v-model='first_name' name='first_name'>
                        </label>

                        <label for="">
                            Prénoms:
                            <input type="text" required v-model='last_name' name='last_name'>
                        </label>

                        <label for="">
                            Téléphone:
                            <input type="number" required v-model='phone' name='phone_number'
                                onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </label>

                        <br>
                        <button class="btn btn-primary" type="submit">
                            Inscription
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'parts/footer.php'; ?>

    <script>
    const {
        createApp
    } = Vue


    createApp({
        data() {
            return {
                usedTickets: ''

            }
        },
        mounted: function() {
            // this.displayDashboard();
        },

        methods: {
            displayDashboard() {
                axios.get('https://servicomantilles.com/api/UsedTickets').then(response =>
                    this.usedTickets = response.data);

            },
            format(num) {
                let res = new Intl.NumberFormat('fr-FR', {
                    maximumSignificantDigits: 3
                }).format(num);
                return res;
            },
        }

    }).mount('#app')
    </script>
</body>

</html>