<?php

foreach(glob($backend."db/*") as $file){
    require_once "db/".basename($file);
}

?>