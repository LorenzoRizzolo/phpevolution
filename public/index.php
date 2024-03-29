<!DOCTYPE html>
<?php

// pages folder
$backend = "../src/backend/";
$pages = "../src/pages/";

// src folder 
$src = "../src/";

$img = "img/";

require_once __DIR__.'/../src/backend/common_file.php';
require_once __DIR__.'/../src/backend/telegram_bot.php';
?>
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
    <link rel="apple-touch-icon" href="img/logo.ico">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/framework.css">
    <script src="https://kit.fontawesome.com/aad6a7f9c6.js" crossorigin="anonymous"></script>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">

    <title>PhpEvolution</title>
</head>
<body>

<?php
require_once __DIR__.'/../src/mainpage/page.php';
?>

<div id="loading">
  <div class='loader'></div>
</div>

<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="js/framework.js"></script>
<script src="js/vanta/p5.js"></script>
<script src="js/vanta/topology.js"></script>
<script>
if(isWebGLSupported() && isWebGLEnabled()){
  VANTA.TOPOLOGY({
    el: ".page",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00
  })
}else{
  console.log("WebGl is not supported on your device :(")
}
</script>

</body>
</html>