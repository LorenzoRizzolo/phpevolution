<?php

foreach($GLOBALS['panel_pages'] as $page){
    $class = (!isset($_GET['page']) && $page=="home") || ($_GET['page']==$page) ? "selected" : "";
    echo " <a href='?page=$page'><div class='see-page $class'> ".$GLOBALS['icons'][$page]." $page</div></a> ";
}


?>