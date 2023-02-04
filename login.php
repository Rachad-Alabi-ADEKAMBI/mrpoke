<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>Mrpoke- Connexion</title>
</head>

<body>
    <div class="content">
        <form class="form" action="api/api.php?action=login" method="POST">

            <img src="public/img/logo.png" alt="">

            <h1>
                Connexion
            </h1>

            <label for="">
                Identifiant:
                <input type="text" required name='username' v-model='username'>
            </label>

            <label for="">
                Mot de passe:
                <input type="password" name='pass' v-model='pass' required>
            </label>

            <br>
            <button class="btn btn-primary" type='submit'>
                Connexion
            </button>
        </form>
    </div>
</body>

</html>