<h2>Modifica stabilimento</h2>

<?php
$id = $_GET['stabilimento'];
$stabilimento = get_stabilimento_by_id($id);
?>



<form method="post">

    <div class="grid-2">

        <div class='input-container' style='display:inline-block;'>
            <input type='text' name='nome' <?php if(isset($_POST['nome'])){ echo "value='".$_POST['nome']."'"; }else{ echo "value='".$stabilimento['nome']."'"; } ?> >
            <div class='placeholder'><i class="fa-solid fa-warehouse"></i> Nome</div>
        </div>

        <div class='input-container' style='display:inline-block;'>
            <input type='text' name='locazione' <?php if(isset($_POST['locazione'])){ echo "value='".$_POST['locazione']."'"; }else{ echo "value='".$stabilimento['locazione']."'"; } ?> >
            <div class='placeholder'><i class="fa-solid fa-map-location-dot"></i> Locazione</div>
        </div>

    </div>

    <button name='salva_modifiche'>Salva modifiche</button>

</form>

