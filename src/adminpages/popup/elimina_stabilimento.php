<h2>Elimina stabilimento</h2>

<?php
$id = $_GET['stabilimento'];
$stabilimento = get_stabilimento_by_id($id);

echo "<br>Vuoi davvero eliminare lo stabilmento <b>".$stabilimento['nome']."</b> situato in <b>".$stabilimento['locazione']."</b> ?";
?>

<form method="post">

<button name='elimina'>Elimina</button>

</form>

