<?php

foreach($GLOBALS['panel_pages']['default'] as $page){
    $class = (!isset($_GET['page']) && $page=="home") || (isset($_GET['page']) && $_GET['page']==$page) ? "selected" : "";
    echo " <a href='?page=$page'><div class='see-page $class'> ".$GLOBALS['icons'][$page]." $page</div></a> ";
}

$dati = get_utente_by_id($_SESSION['id']);



?>