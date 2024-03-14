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

function console($t){
    echo "
    <script>
        console.log('$t')
    </script>
    ";
}

function decrypt($var){
    $dati = $GLOBALS['dati_env'];
    return openssl_decrypt($var,"AES-256-CBC", $dati->key, 0, $dati->iv);
}
function encrypt($var){
    $dati = $GLOBALS['dati_env'];
    return openssl_encrypt($var,"AES-256-CBC", $dati->key, 0, $dati->iv);
}

function change_password_admin($password){
    file_put_contents(__DIR__."/../../.pwd", encrypt($password));
}

function get_password_admin(){
    return decrypt(file_get_contents(__DIR__."/../../.pwd"));
}

// Aggiungi una variabile di sessione per tenere traccia dell'altezza totale
$totalHeight = 0;
function error($t){
    if(!isempty($t)){
        echo "<div class='error' style='bottom: {$GLOBALS['totalHeight']}px;'>";
        echo "<i class='fa-regular fa-circle-xmark'></i> ";
        echo "<p>$t</p>";
        echo "</div>";
        $GLOBALS['totalHeight'] += 70;
    } 
}

function success($t){
    if(!isempty($t)){
        echo "<div class='success' style='bottom: {$GLOBALS['totalHeight']}px;'>"; 
        echo "<i class='fa-regular fa-circle-check'></i> ";
        echo "<p>$t</p>";
        echo "</div>";
        $GLOBALS['totalHeight'] += 70; 
    }
}

function error_page($t){
    echo "<div class='error-page'>";
    echo "<div> <img src='img/logo.png'> <span>Pagina <b>$t</b> non trovata</span><br> <a href='?page=home'>Vai alla Home</a></div>";
    echo "</div>";
}

function see_permessi($str){
    $arr = array(
        "_" => " "
    );
    return strtr($str, $arr);
}

function popup($pop){
    $pop_dir = __DIR__."/../popup/".$pop.".php";
    if(file_exists($pop_dir)){ 
        echo "<div class='popup'>";
            echo "<div class='popup-content'>";
                echo "<form method='post'><button name='chiudi'><i class='fa-regular fa-circle-xmark'></i> Chiudi</button></form>";
                require_once $pop_dir; 
            echo "</div>";
        echo "</div>";
    }
}

function redirect($page){
    echo "
<script> 
    window.location.href='/$page';
</script> 
    ";
}

function one_up($var){
    $end = substr($var, 1, strlen($var));
    return strtoupper($var[0]).$end;    
}

function random_code(){
    $caratteri = '0123456789';
    $lunghezzaCaratteri = strlen($caratteri);
    $stringaCasuale = '';
    for ($i = 0; $i < 4; $i++) {
        $indiceCasuale = mt_rand(0, $lunghezzaCaratteri - 1);
        $stringaCasuale .= $caratteri[$indiceCasuale];
    }
    return $stringaCasuale;
}

?>