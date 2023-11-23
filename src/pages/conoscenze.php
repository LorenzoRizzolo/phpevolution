<div class="pagel">
    <h2>Conoscenze</h2>
</div>

<div class="pagel">
    <h2>Conoscenze informatiche:</h2>
    <?php
    
    foreach($GLOBALS['skills'] as $key => $s){
        echo "<div class='skill'> $s $key</div>";
    }

    ?>
</div>