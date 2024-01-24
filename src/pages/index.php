<div class="page">

    <header>
        <div class="left">

        <div class="flex-mobile">
            <div id="menu-open" class="mobile"> <i class="fa-solid fa-bars"></i> </div>
            <div class="title">
            Titolo    <br>
            <small>Sottotitolo</small>
            </div>
        </div>

        <div class="menu pc">
        <?php
            // print_r($GLOBALS['articoli']);
            $page = ( isset($_GET['page']) ? $_GET['page'] : "home" );
            foreach($GLOBALS['pages'] as $pagina => $dati){
                echo "<a href='?page=$pagina'> <div class='".( $page==$pagina ? "selected" : "" )."'> ".$dati['icon']." ".$dati['nome']."</div></a>";
            }
        ?>
        </div>

        <div class="menu mobile">
        <?php
            $page = ( isset($_GET['page']) ? $_GET['page'] : "home" );
            foreach($GLOBALS['pages'] as $pagina => $dati){
                echo "<a href='?page=$pagina'> <div class='".( $page==$pagina ? "selected" : "" )."'>".$dati['icon']." ".$dati['nome']."</div></a>";
            }
        ?>
        </div>

    </div>
    </header>

    <div class="right">
        <?php

            $page = ( isset($_GET['page']) ? $_GET['page'] : "home" );
            $file = __DIR__."/$page.php";
            require_once (file_exists($file) ? $file : __DIR__."/error_page.php");

        ?>
    </div>

</div>