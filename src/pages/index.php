

<div class="page">

<div class="left">
    <?php require_once "header.php"; ?>
    <div class="pc">
        <?php
        foreach($GLOBALS['panel_pages'] as $key => $page){
            $class = (!isset($_GET['page']) && $page=="home") || (isset($_GET['page']) && $_GET['page']==$page) ? "selected" : "";
            echo "<a href='?page=".strtolower($key)."'><div class='menu-page $class'>$page ".see_permessi(one_up($key))."</div></a>";
        }
        ?>
    </div>
    <div class="menu-mob">
        <div class="menu-mobile mobile">
            <?php
            foreach($GLOBALS['panel_pages'] as $key => $page){
                $class = (!isset($_GET['page']) && $page=="home") || (isset($_GET['page']) && $_GET['page']==$page) ? "selected" : "";
                echo "<a href='?page=".strtolower($key)."'><div class='menu-page $class'>$page ".see_permessi(one_up($key))."</div></a>";
            }
            ?>
        </div>
    </div>
</div>

<div class="right">
    <?php
    $page = !isset($_GET['page']) ? "home" : strtolower($_GET['page']);
    if(file_exists($GLOBALS['src']."pages/".$page.".php")){
        require_once $page.".php";
    }else{
        echo "<br>Pagina inesistente";
    }
    ?>
</div>

</div>