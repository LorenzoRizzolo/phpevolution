<h2>Visualizza stabilimento</h2>

<?php
$id = $_GET['stabilimento'];
$stabilimento = get_stabilimento_by_id($id);

echo "<br><b>Nome stabilimento:</b><br>";
echo $stabilimento['nome']."<br>";
echo "<br><b>Locazione stabilimento:</b><br>";
echo $stabilimento['locazione']."<br>";
?>

