<div class="pagel">
    <h2>Informazioni</h2>
</div>

<?php
if(isset($_POST['cambia_password'])){
    popup("cambia_password");
}
?>

<div class="pagel">
    <?php
    echo "<br><b>Permessi abilitati:</b><br>";
    echo "<ul>";
    foreach($dati['id_stabilimenti'] as $s){
        $dati = get_stabilimento_by_id($s);
        echo "<li>".$dati['nome']."</li>";
    }
    echo "</ul>";
    ?>
</div>

<form method="post" class="pagel">
<b>Opzioni:</b><br><br>

<button name='cambia_password'>Cambia password</button>

</form>