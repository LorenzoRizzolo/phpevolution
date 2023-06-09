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
    <link rel="apple-touch-icon" href="php.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="framework.css">
    <link rel="shortcut icon" href="php.ico" type="image/x-icon">

    <title>PHPevolution</title>
</head>
<body>

<?php
// pages folder
$pages = "../src/pages/";
// footer folder
$footer = "../src/footer/";
// footer header
$header = "../src/header/";
// src folder 
$src = "../src/";

require_once $src.'common_file.php';
require_once 'page.php';
?>

<div id="loading">
  <div class='loader'></div>
</div>

<script src="jquery.js"></script>
<script src="framework.js"></script>

</body>
</html>