<?php

if(isset($_POST['aggiungi'])){
    popup("aggiungi_utente");
}

if(isset($_POST['aggiungi_utente'])){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stabilimenti = isset($_POST['stabilimenti']) ? json_encode($_POST['stabilimenti']) : json_encode([]);
    $permessi_utente = isset($_POST['permessi_utente']) ? json_encode($_POST['permessi_utente']) : json_encode([]);
    if(!isempty($nome) && !isempty($cognome) && !isempty($username) && !isempty($password)){
        if(!esiste_utente(encrypt($username))){
            nuovo_utente(
                encrypt($username),
                encrypt($nome),
                encrypt($cognome),
                encrypt($password),
                encrypt($stabilimenti),
                encrypt($permessi_utente)
            );
            cronologia("Aggiunto utente $nome $cognome, $username");
        }else{
            error("Utente $username già esistente");
            popup("aggiungi_utente");
        }
    }else{
        error("Compila tutti i campi");
        popup("aggiungi_utente");
    }
}

if(isset($_POST['modifica_utente'])){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stabilimenti = isset($_POST['stabilimenti']) ? json_encode($_POST['stabilimenti']) : json_encode([]);
    $permessi_utente = isset($_POST['permessi_utente']) ? json_encode($_POST['permessi_utente']) : json_encode([]);
    if(!isempty($nome) && !isempty($cognome) && !isempty($username) && !isempty($password)){
        $count = esiste_utente( encrypt($nome), encrypt($locazione) )<=0 ? false : true;
        if(!$count){
            modifica_utente(
                $_GET['utente'],
                encrypt($username),
                encrypt($nome),
                encrypt($cognome),
                encrypt($password),
                encrypt($stabilimenti),
                encrypt($permessi_utente)
            );
            success("Utente $nome $cognome modificato");
            cronologia("Modificato utente $nome $cognome, $username");
        }else{
            error("Utente $username già esistente");
        }
    }else{
        error("Compila tutti i campi");
    }
}

if(isset($_POST['accedi_come'])){
    $dati = get_utente_by_id($_GET['utente']);
    $_SESSION['id'] = $dati['id'];
    $_SESSION['username'] = $dati['username'];
    $_SESSION['role'] = "utente";
    redirect("");
}

if(isset($_GET['utente'])){
    $id = $_GET['utente'];
    $mod = $_GET['mod'];
    switch($mod){
        case "elimina":
            popup("elimina_utente");
            break;
        case "visualizza":
            popup("visualizza_utente");
            break;
        case "modifica":
            popup("modifica_utente");
            break;
    }
}
if(isset($_POST['elimina'])){
    $id = $_GET['utente'];
    $utente = get_utente_by_id($id);
    cronologia("eliminato utente ".$utente['username']);
    elimina_utente($id);
    $_SESSION['del'] = $utente['nome']." ".$utente['cognome'];
    redirect_here("&del=".random_code());
}
if(isset($_GET['del'])){
    if($_SESSION['random']!=$_GET['del']){
        success("Utente ".$_SESSION['del']." eliminato");
        $_SESSION['random'] = $_GET['del'];
    }
}

?>

<div class="pagel">
    <h2>Utenti</h2>
</div>

<form method="post" class="pagel">

    <button name='aggiungi'><i class="fa-solid fa-plus"></i> Aggiungi</button>
    <!-- <button name='seleziona'><i class="fa-solid fa-hand"></i> Seleziona</button> -->

</form>

<div class="pagel paddingbot0">

<div class="search">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" id="searchbar" placeholder="Cerca">
</div><br>

    <div class="nff"></div><br class="nff">

<?php

$i=0;
foreach(get_utenti() as $s){
    echo "<div class='value mini-box'>";
    echo "
    <div class='dato'>
    <b>".$s['nome']." ".$s['cognome']."</b><br>
    <small>".$s['username']."</small>
    </div>";
    require $GLOBALS['src']."adminpages/popup/menu-utente.php";
    echo "</div>";
    $i++;
}
if(!$i){
    echo "Nessun utente trovato<br><br>";    
}

?>

</div>
