<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'meta.php'; ?>

    <title>Mrpoke- Connexion</title>
</head>

<body>
    <div class="content">
        <form class="form" method="POST" action="api/api.php?action=login">

            <img src="public/img/logo.png" alt="">

            <h1>
                Inscription au jeu concours
            </h1>

            <label for="">
                Nom:
                <input type="text" required v-model='first_name'>
            </label>

            <label for="">
                Prénoms:
                <input type="password" required v-model='last_name'>
            </label>

            <label for="">
                Téléphone:
                <input type="password" required v-model='phone' onkeyup="if(this.value<0){this.value= this.value * -1}">
            </label>

            <br>
            <button class="btn btn-primary" type="submit">
                Inscription
            </button>
        </form>
    </div>
</body>

</html>