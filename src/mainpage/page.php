<?php

if(!isset($_SESSION['role'])){
    $page = isset($_GET['page']) ? $_GET['page'] : "login";
    require_once $pages.$page.".php";
}else{
    $panel_pages =  $_SESSION['role']=="admin" ? $GLOBALS['admin_pages'] : $GLOBALS['user_pages'];
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    if($page=="logout"){ redirect("?logout"); }
    $final_page = $_SESSION['role']=="admin" ? $src."adminpages/index.php" : $src."userpages/index.php";
    if(file_exists($final_page)){ require_once $final_page; }
}



?>

