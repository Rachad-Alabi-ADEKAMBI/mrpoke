<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>Mrpoke- Connexion</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-4 mx-auto">
                    <form class="form" action="api/api.php?action=login" method="POST" class='p-2'>

                        <img src="public/img/logo.png" alt="">

                        <h1>
                            Connexion
                        </h1>

                        <label for="">
                            Identifiant:
                            <input type="text" required name=' username' v-model='username'>
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
            </div>
        </div>
    </div>
    <?php include 'parts/footer.php'; ?>
</body>

</html>