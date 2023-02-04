<?php
include 'api/api.php';
require 'phpqrcode/qrlib.php';
$var = verifyInput($_GET['var']);

$link = 'register.php?var=' . $var;

QRcode::png($link);