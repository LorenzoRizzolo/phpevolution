<h2>Visualizza utente</h2>

<?php
$id = $_GET['utente'];
$utente = get_utente_by_id($id);

echo "<br><b>Nome utente:</b><br>";
echo $utente['nome']." ".$utente['cognome']."<br>";

echo "<br><b>Username:</b><br>";
echo $utente['username']."<br>";

echo "<br><b>Password:</b> (clicca o sposta il cursore sopra con il mouse per mostrare)<br>";
echo "<span class='password'>".$utente['password']."</span><br>";

echo "<br><b>Permessi stabilimenti:</b><br>";
echo "<ul>";
foreach($utente['id_stabilimenti'] as $s){
    $dati = get_stabilimento_by_id($s);
    echo "<li>".$dati['nome']."</li>";
}
echo "</ul>";

echo "<br><b>Permessi utente sui lotti:</b>";
echo "<ul>";
foreach($GLOBALS['permessi_utenti']['lotti'] as $p){
    if(array_search($p, $utente['permessi_utente'])){
        echo "<li>".see_permessi($p)."</li>";
    }
}
echo "</ul>";

echo "<br><b>Permessi utente sul turno:</b>";
echo "<ul>";
foreach($GLOBALS['permessi_utenti']['turni'] as $p){
    if(array_search($p, $utente['permessi_utente'])){
        echo "<li>".see_permessi($p)."</li>";
    }
}
echo "</ul>";

?>

<form method="post">

<button name='accedi_come'>Accedi come <?php echo $utente['username']; ?></button>

</form>

