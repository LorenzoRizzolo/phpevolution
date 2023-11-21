<h2>Aggiungi stabilimento</h2>
<p>Completa il form per aggiungere uno stabilimento</p>
<br>


<form method="post">

    <div class="grid-2">
        <b>Dati stabilimento</b>
        <div></div>

        <div class='input-container' style='display:inline-block;'>
            <input type='text' name='nome' <?php if(isset($_POST['nome'])){ echo "value='".$_POST['nome']."'"; } ?> >
            <div class='placeholder'><i class="fa-solid fa-warehouse"></i> Nome</div>
        </div>

        <div class='input-container' style='display:inline-block;'>
            <input type='text' name='locazione' <?php if(isset($_POST['locazione'])){ echo "value='".$_POST['locazione']."'"; } ?> >
            <div class='placeholder'><i class="fa-solid fa-map-location-dot"></i> Locazione</div>
        </div>
    </div>

    <button name='aggiungi_stabilimento'>Aggiungi</button>

</form>