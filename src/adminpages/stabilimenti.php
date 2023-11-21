<?php

if(isset($_POST['aggiungi'])){
    popup("aggiungi_stabilimento");
}
if(isset($_POST['aggiungi_stabilimento'])){
    $nome = $_POST['nome'];
    $locazione = $_POST['locazione'];
    if(!isempty($nome) && !isempty($locazione)){
        if(!esiste_stabilimento(
            encrypt($nome),
            encrypt($locazione)
        )){
            if(nuovo_stabilimento(
                encrypt($nome),
                encrypt($locazione)
            )){
                cronologia("Aggiunto stabilimento $nome in $locazione");
                success("Stabilimento $nome aggiungo");
            }else{
                error("Stabilimento $nome non aggiunto");
                popup("aggiungi_stabilimento");
            }
        }else{
            error("Stabilimento $nome in $locazione già esistente");
            popup("aggiungi_stabilimento");
        }
    }else{
        error("Compila tutti i campi");
        popup("aggiungi_stabilimento");
    }
}

if(isset($_GET['stabilimento'])){
    $id = $_GET['stabilimento'];
    $mod = $_GET['mod'];
    switch($mod){
        case "elimina":
            popup("elimina_stabilimento");
            break;
        case "visualizza":
            popup("visualizza_stabilimento");
            break;
        case "modifica":
            popup("modifica_stabilimento");
            break;
    }
}

if(isset($_POST['elimina'])){
    $id = $_GET['stabilimento'];
    $stabilimento = get_stabilimento_by_id($id);
    elimina_stabilimento($id);
    cronologia("Eliminato stabilimento ".$stabilimento['nome']." in ".$stabilimento['locazione']);
    $_SESSION['del'] = $stabilimento['nome'];
    redirect_here("&del=".random_code());
}
if(isset($_GET['del'])){
    if($_SESSION['random']!=$_GET['del']){
        success("Stabilimento ".$_SESSION['del']." eliminato");
        $_SESSION['random'] = $_GET['del'];
    }
}

if(isset($_POST['salva_modifiche'])){
    $nome = $_POST['nome'];
    $locazione = $_POST['locazione'];
    if(!isempty($nome) && !isempty($locazione)){
        $count = esiste_stabilimento( encrypt($nome), encrypt($locazione) )<=0 ? false : true;
        if(!$count){
            if(aggiorna_stabilimento(
                $_GET['stabilimento'],
                encrypt($nome),
                encrypt($locazione)
            )){
                success("Stabilimento $nome modificato");
            }else{
                error("Stabilimento $nome non modificato");
            }
        }else{
            error("Stabilimento $nome in $locazione già esistente");
        }
    }else{
        error("Compila tutti i campi");
    }
}

?>

<div class="pagel">
    <h2>Stabilimenti</h2>
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
foreach(get_stabilimenti() as $s){
    echo "<div class='value mini-box'>";
    echo "
    <div class='dato'>
    <b>".$s['nome']."</b><br>
    <small>".$s['locazione']."</small>
    </div>";
    require $GLOBALS['src']."adminpages/popup/menu-stabilimento.php";
    echo "</div>";
    $i++;
}
if(!$i){
    echo "Nessuno stabilimento trovato<br><br>";    
}

?>

</div>
