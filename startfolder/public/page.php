<?php

switch($_GET['opt']){
    case 'home':
        require_once $header.'home.php';
        require_once $pages.'home.php';
        require_once $footer.'home.php';
        break;
    case 'stru':
        require_once $header.'structure.php';
        require_once $pages.'structure.php';
        require_once $footer.'home.php';
        break;
    case 'js':
        require_once $header.'js-components.php';
        require_once $pages.'js-components.php';
        require_once $footer.'home.php';
        break;
    case 'php':
        require_once $header.'php-functions.php';
        require_once $pages.'php-functions.php';
        require_once $footer.'home.php';
        break;
    default:
        require_once $header.'home.php';
        require_once $pages.'home.php';
        require_once $footer.'home.php';
        break;
}

?>