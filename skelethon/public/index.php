<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta charset="UTF-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- links -->
    <link rel="apple-touch-icon" href="img/php.ico">
    <link rel="shortcut icon" href="img/php.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/framework.css">

    <title>PHPevolution</title>
</head>
<body>

<?php
// pages folder
$pages = "../src/pages/";
$com = "../src/components/";
$back = "../src/backend/";
// src folder 
$src = "../src/";

require_once $back.'common_file.php';
require_once 'page.php';
?>

<div id="loading">
  <div class='loader'></div>
</div>

<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="js/framework.js"></script>

</body>
</html>