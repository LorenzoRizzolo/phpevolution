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
    <link rel="stylesheet" href="fram.css">
    <link rel="shortcut icon" href="php.ico" type="image/x-icon">

    <title>FramPHP</title>
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


require_once 'page.php';
?>

<div id="loading">
  <h1>Loading...</h1>
</div>

<script src="jquery.js"></script>
<script src="script.js"></script>

</body>
</html>