<?php
$dati = get_utente_by_id($_SESSION['id']);
$_SESSION['permessi'] = $dati['permessi_utente'];
?>

<div class="page">

    <div class="menu pc">
        <?php require "components/header.php"; ?>
        <div class="menu-pc">
            <?php require_once "components/menu.php"; ?>
        </div>
    </div>

    <div class="fixed-header-mobile">
        <div class="header-mobile mobile">
            <?php require "components/header.php"; ?>
            <div>
                <div class="menu-container">
                    <button class="no-load" id='menu-open'><i class="fa-solid fa-bars"></i></button>
                </div>
            </div>
        </div>
        <div class="menu-mobile mobile">
            <?php require "components/menu.php"; ?>
        </div>
    </div>

    <div class="main-page">
        <?php

        $page = isset($_GET['page']) ? $_GET['page'] : "home";
        $final_page = $src."userpages/$page.php";
        if(file_exists($final_page)){ require_once $final_page; }else{ error_page($page); }

        ?>
    </div>

</div>