<h2>Elimina utente</h2>

<?php
$id = $_GET['utente'];
$utente = get_utente_by_id($id);

echo "<br>Vuoi davvero eliminare l'utente <b>".$utente['nome']." ".$utente['cognome']."</b> ?";
?>

<form method="post">

<button name='elimina'>Elimina</button>

</form>

