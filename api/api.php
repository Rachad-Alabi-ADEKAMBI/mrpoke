<?php
session_start();
//local
function getConnexion()
{
    return new PDO(
        'mysql:host=localhost; dbname=mrpoke; charset=UTF8',
        'root',
        ''
    );
}

$error = ['error' => false];
$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

function str_random($length)
{
    $alphabet = '0123456789';

    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

//controle des input
function verifyInput($inputContent)
{
    $inputContent = htmlspecialchars($inputContent);

    $inputContent = trim($inputContent);

    return $inputContent;
}

function createTickets()
{
    $pdo = getConnexion();

    for ($i = 0; $i < 495; $i++) {
        $code = str_random(6);

        $req = $pdo->prepare('SELECT id
        FROM tickets WHERE code = ?');
        $req->execute([$code]);
        $exist = $req->fetch();
        $req->closeCursor();

        while ($exist) {
            $code = str_random(6);
        }

        if (!$exist) {
            $req = $pdo->prepare('
                INSERT INTO tickets
               SET date_of_insertion = NOW(),
                code = ?,used = "no"
            ');
            $req->execute([$code]);
        }
    }?>
<script>
alert('ok ')
</script>
<?php
}

function getTickets()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    tickets
        ORDER BY id ASC
        LIMIT 40");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
    // return $datas;
}

function getUsedTickets()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    tickets WHERE used ='yes'
        ORDER BY id ASC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
    // return $datas;
}

function login()
{
    if (!empty($_POST)) {
        $pdo = getConnexion();

        $errors = [];

        if (
            isset($_POST['username'], $_POST['pass']) &&
            !empty($_POST['username'] && !empty($_POST['pass']))
        ) {
            $sql = 'SELECT * FROM `users` WHERE `username` = ?';

            $query = $pdo->prepare($sql);

            $query->execute([verifyInput($_POST['username'])]);

            $user = $query->fetch();

            if (!$user) {
                $errors['username'] = 'Utilisateur/mot de passe incorrect';
            }

            if (!password_verify($_POST['pass'], $user['pass'])) {
                $errors['pass'] = 'Utilisateur/mot de passe incorrect';
            }

            if (!empty($errors)) {
                $_SESSION['login'] = [
                    'username' => verifyInput($_POST['username']),
                ]; ?>

<script>
alert('Veuillez verifier vos identifiants');
window.location.replace('../login.php')
</script>
<?php
            }

            if (empty($errors)) {
                session_start();

                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'role' => $user['admin'],
                ];

                header('Location: ../dashboard.php');
            }
        }
    }
}

function register()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];

        $var = $_SESSION['register']['var'];

        if (empty($_POST['first_name'])) {
            $errors['first_name'] = 'Veuillez preciser le nom';
        }

        if (empty($_POST['last_name'])) {
            $errors['last_name'] = 'Veuillez preciser le nom';
        }

        if (empty($_POST['phone'])) {
            $errors['phone'] = 'Veuillez preciser le numéro';
        }

        $req = $pdo->prepare('SELECT id
        FROM tickets WHERE code = ?');
        $req->execute([$var]);
        $exist = $req->fetch();
        $req->closeCursor();

        if (!$exist) {
            $errors['var'] = 'Ticket introuvable, merci de vérifier le qr code';
        }

        $req = $pdo->prepare('SELECT id
        FROM tickets WHERE code = ? AND used = "yes"');
        $req->execute([$var]);
        $used = $req->fetch();
        $req->closeCursor();

        if ($used) {
            $errors['var'] =
                'Ticket déjà utilisé, merci de vérifier le qr code';
        }

        if (empty($errors)) {
            include 'errors.php';
        } else {

            $first_name = verifyInput($_POST['first_name']);
            $last_name = verifyInput($_POST['last_name']);
            $phone_number = verifyInput($_POST['phone_number']);

            $sql = $pdo->prepare(
                'UPDATE tickets SET used = "yes", first_name = ?,
                last_name = ?, phone_number = ? WHERE code = ?'
            );

            $sql->execute([$first_name, $last_name, $phone_number, $var]);
            ?>
<script>
alert('Inscription enregistrée, Mr Poke vous remercie');
window.location.replace('../index.php');
exit();
</script>
<?php
        }
    }
}

function logout()
{
    unset($_SESSION['user']);

    header('Location: ../login.php');
}

if ($action == 'login') {
    login();
}

if ($action == 'logout') {
    logout();
}

if ($action == 'register') {
    register();
}

if ($action == 'createTickets') {
    createTickets();
}

function sendJSON($infos)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}