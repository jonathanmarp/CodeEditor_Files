<?php
    $point = false;
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == config['username']) {
            $point = true;
        }
        if($password == config['password']) {
            $point = true;
        }
        if($point == true) {
            header("Location: " . base_url . "public/Admin/index/" .  $_SESSION['key1'] . "/" . $_SESSION['key2']);
        }
        $_SESSION['en'] = $this->encrypt($username);
        $_SESSION['id'] = $this->encrypt($password);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url; ?>public/img/Favicon.png" />
    <link rel="stylesheet" href="<?= base_url; ?>public/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url; ?>public/css/Home.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title><?= $data['title']; ?></title>
</head>
    <body>
        <header>
            <?php require_once 'Navbar.php'; ?>
            <?php require_once 'Jumbotron.php'; ?>
        </header>
        <script src="<?= base_url; ?>public/js/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="<?= base_url; ?>public/js/bootstrap.js"></script>
        <script src="<?= base_url; ?>public/js/Home.js"></script>
    </body>
</html>