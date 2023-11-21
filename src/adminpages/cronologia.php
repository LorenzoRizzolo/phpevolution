<div class="pagel">
    <h2>Cronologia</h2>
</div>


<div class="pagel">
<div class="flex">
<div class="search">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" id="searchbar1" placeholder="Cerca per azione">
</div>
<div class="space"></div>
<div class="search">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" id="searchbar2" placeholder="Cerca per utente">
</div>
</div>
</div>

<div class="pagel cronologie">
    <div class="nff"></div>
    <?php
    
    foreach(get_cronologia() as $cro){
        echo "<div class='value cronologia'>";
        echo "<span class='dato2'><b>Nome utente: </b>".$cro['nome_utente']."<br><br></span>";
        echo "<span class='dato1'><b>Azione: </b>".$cro['azione']."<br><br></span>";
        echo "<b>Data: </b>".$cro['data']."<br>";
        echo "<b>Ora: </b>".$cro['ora'];
        echo "</div>";
    }

    ?>
</div>