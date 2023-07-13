<?php
// check if is a number
function isnum($var){
    if (preg_match('/\d/', $var)) {
        return true;
    } else {
        return false;
    }
}

// check if is an empty string or if there are only spaces
function isempty($var){
    $trimmedString = trim($var);
    if (empty($trimmedString)) {
        return true;
    } else {
        return false;
    }
}

// check if $var contains $filter value
function contains($var, $filter){
    if($var==$filter || strpos($var, $filter) || substr($var, 0, strlen($filter))==$filter){
        return true;
    }else{
        return false;
    }
}

function decrypt($var){
    $dati = $GLOBALS['dati_env'];
    return openssl_decrypt($var,"AES-256-CBC", $dati->key, 0, $dati->iv);
}
function encrypt($var){
    $dati = $GLOBALS['dati_env'];
    return openssl_encrypt($var,"AES-256-CBC", $dati->key, 0, $dati->iv);
}
?>