<?php

foreach(glob(__DIR__."/db/*") as $file){
    require_once __DIR__."/db/".basename($file);
}

?>