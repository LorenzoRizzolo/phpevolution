<?php

// nome del sito
$sitename = "";

// pagine admin
$admin_pages = [ "home", "utenti", "stabilimenti", "cronologia", "logout" ];



// pagine utenti
$user_pages = [ 
    "default"=>["home", "informazioni", "logout"] ,
    "lotti" => ["nuovo_lotto", "visualizza_lotti", "documento_lotti", "cronologia_lotti"],
    "turni" => ["nuovo_turno", "miei_turni", "cornologia_turni"]
];
// permessi degli utenti
$permessi_utenti = [
    "lotti" =>[
        "inserimento_lotti",
        "visualizzazione_lotti",
        "modifiche_lotti",
        "compilazione_documento_lotti",
        "visualizza_totale_cronologia_lotti"
    ],
    "turni" =>[
        "compilazione_foglio_del_turno",
        "visualizzazione_turni_personali",
        "visualizzazione_totale_cronologia_turni"
    ]
]; 

// icone
$icons = [
    "home" => '<i class="fa-solid fa-house"></i>',
    "utenti" => '<i class="fa-solid fa-users"></i>',
    "logout" => '<i class="fa-solid fa-door-open"></i>',
    "cronologia" => '<i class="fa-solid fa-clock-rotate-left"></i>',
    "stabilimenti" => '<i class="fa-solid fa-warehouse"></i>',
    "informazioni" => '<i class="fa-solid fa-receipt"></i>  '
];




if(isset($_POST['chiudi'])){
    if(count($_GET)>1){
        redirect("?page=".$_GET['page']);
    }
}

function redirect($page){
    echo "
   <script> 
    window.location.href='/$page'; 
    console.log('reindirizzato')
   </script> 
    ";
}

function redirect_here($args){
    echo "
   <script> 
    window.location.href='/?page=".$_GET['page']."$args'; 
    console.log('reindirizzato')
   </script> 
    ";
}

?>