<h2>Aggiungi utente</h2>
<p>Completa il form per aggiungere un utente</p>
<br>    

<form method="post">

<div class="grid-2 pagel">
    <b>Dati utenti</b>
    <div></div>

    <div class='input-container' style='display:inline-block;'>
        <input type='text' name='username' <?php if(isset($_POST['username'])){ echo "value='".$_POST['username']."'"; } ?> >
        <div class='placeholder'><i class="fa-solid fa-user-tie"></i> Username</div>
    </div>

    <div class='input-container' style='display:inline-block;'>
        <div class="eye"><i class="fa-solid fa-eye"></i></div>
        <input type='password' name='password' <?php if(isset($_POST['password'])){ echo "value='".$_POST['password']."'"; } ?> >
        <div class='placeholder'><i class="fa-solid fa-key"></i> Password</div>
    </div>

    <div class='input-container' style='display:inline-block;'>
        <input type='text' name='nome' <?php if(isset($_POST['nome'])){ echo "value='".$_POST['nome']."'"; } ?> >
        <div class='placeholder'><i class="fa-solid fa-user-tie"></i> Nome</div>
    </div>

    <div class='input-container' style='display:inline-block;'>
        <input type='text' name='cognome' <?php if(isset($_POST['cognome'])){ echo "value='".$_POST['cognome']."'"; } ?> >
        <div class='placeholder'><i class="fa-solid fa-user-tie"></i> Cognome</div>
    </div>

    <div></div>
    <div><br></div>
</div>

<br>
<div class='pagel'>
    <b>Stabilimenti</b><br>
    <i>L'utente avrà accesso agli stabilimenti selezionati</i><br><br>
    <?php
        
        foreach(get_stabilimenti() as $s){
            $check="";
            if(isset($_POST['stabilimenti'])){
                if(array_search($s['id'], $_POST['stabilimenti'])!=""){ $check="checked"; }
            }
            echo "
            <div class='switch'>
                <label class='apple-switch'>
                    <input class='apple-switch-input' value='".$s['id']."' name='stabilimenti[]' type='checkbox' $check>
                    <span class='apple-switch-slider'></span>
                </label>
            <span>".$s['nome']." - ".$s['locazione']."</span>
            </div><br>
            ";
        }

    ?>
</div>

<br>    
<div class="pagel">
    <b>Permessi sulle operazioni</b><br><br>
    <b>Pagine lotti:</b><br><br>
    <?php
        foreach($GLOBALS['permessi_utenti']['lotti'] as $lotto){
            $check="";
            if(isset($_POST['permessi_utente'])){
                if(array_search($lotto, $_POST['permessi_utente'])!=""){ $check="checked"; }
            }
            echo "
            <div class='switch'>
                <label class='apple-switch'>
                    <input class='apple-switch-input' name='permessi_utente[]' value='$lotto' type='checkbox' $check>
                    <span class='apple-switch-slider'></span>
                </label>
            <span>".see_permessi($lotto)."</span>
            </div><br>
            ";
        }
    ?>
</div>

<br>    
<div class="pagel">
    <b>Pagine gestione turni:</b><br><br>
    <?php
        foreach($GLOBALS['permessi_utenti']['turni'] as $turno){
            $check="";
            if(isset($_POST['permessi_utente'])){
                if(array_search($turno, $_POST['permessi_utente'])!=""){ $check="checked"; }
            }
            echo "
            <div class='switch'>
                <label class='apple-switch'>
                    <input class='apple-switch-input' name='permessi_utente[]' value='$turno' type='checkbox' $check>
                    <span class='apple-switch-slider'></span>
                </label>
            <span>".see_permessi($turno)."</span>
            </div><br>
            ";
        }
    ?>
</div>

<button name='aggiungi_utente'>Aggiungi</button>

</form>