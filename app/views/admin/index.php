<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url; ?>public/img/Favicon.png" />
    <link rel="stylesheet" href="<?= base_url; ?>public/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url; ?>public/css/Admin.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title><?= $data['title']; ?> | <?= $this->get_client_ip(); ?></title>
</head>
    <body>
        <header>
            <?php require_once 'Navbar.php'; ?>
            <?php require_once 'Jumbotron.php'; ?>
        </header>
        <div class="Server">
            <div class="container containerss">
                <div class="card">
                  <div class="card-header">
                    IP : <?= $this->get_client_ip(); ?>
                  </div>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <?php
                        try {
                            echo "<p><span class='bolding'>PHP SELF</span> : " . $_SERVER['PHP_SELF'] . "</p>";
                        } catch(xception $e) {}
                        try {
                            echo "<p><span class='bolding'>SERVER NAME</span> : " . $_SERVER['SERVER_NAME'] . "</p>";
                        } catch(xception $e) {}
                        try {
                            echo "<p><span class='bolding'>HTTP HOST</span> : " . $_SERVER['HTTP_HOST'] . "</p>";
                        } catch(xception $e) {}
                        try {
                            echo "<p><span class='bolding'>HTTP USER AGENT</span> : " . $_SERVER['HTTP_USER_AGENT'] . "</p>";
                        } catch(xception $e) {}
                        try {
                            echo "<p><span class='bolding'>SCRIPT NAME</span> : " . $_SERVER['SCRIPT_NAME'] . "</p>";
                        } catch(xception $e) {}
                        ?>
                      <footer class="blockquote-footer">Server :  <cite title="Source Title"><?= $this->pingDomain(); ?>ping</cite></footer>
                    </blockquote>
                  </div>
              </div>
            </div>
        </div>
        <script src="<?= base_url; ?>public/js/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="<?= base_url; ?>public/js/bootstrap.js"></script>
        <script src="<?= base_url; ?>public/js/Home.js"></script>
    </body>
</html>