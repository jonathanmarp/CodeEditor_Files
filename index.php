<?php
session_start();

require_once 'app/config/config.php';

$_SESSION['key1'] = base64_encode(random_bytes(3));
$_SESSION['key2'] = base64_encode(random_bytes(3));

header("Location:" . base_url . "public/Home/index/" . $_SESSION['key1'] . "/" . $_SESSION['key2']);