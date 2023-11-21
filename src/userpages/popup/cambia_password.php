<h2>Cambia password</h2>

<p><i>
    Qui puoi cambiare la password del tuo account.  
</i></p>


<form method="post" id='formpassword'>

    <div class='input-container'>
        <div class="eye"><i class="fa-solid fa-eye"></i></div>
        <input type='password' name='old' <?php if(isset($_POST['old'])){ echo "value='".$_POST['old']."'"; } ?>>
        <div class='placeholder'>Password attuale</div>
    </div><br>

    <p><i>
        la nuova password deve contenere almeno due numeri, una lettera maiuscola e due caratteri speciali (£$%&/.=?^!)
    </i></p>
    <div class='input-container'>
        <div class="eye"><i class="fa-solid fa-eye"></i></div>
        <input type='password' <?php if(isset($_POST['new'])){ echo "value='".$_POST['new']."'"; } ?> name='new' id='new'>
        <div class='placeholder'>Nuova password</div>
    </div>
    <div id="result10" class='result'><i class="tred fa-regular fa-circle-xmark"></i> contiene numeri</div>
    <div id="result11" class='result'><i class="tred fa-regular fa-circle-xmark"></i> contiene maiuscole</div>
    <div id="result12" class='result'><i class="tred fa-regular fa-circle-xmark"></i> contiene caratteri speciali</div>
    <br>

    <div class='input-container'>
        <div class="eye"><i class="fa-solid fa-eye"></i></div>
        <input type='password' name='repnew' <?php if(isset($_POST['repnew'])){ echo "value='".$_POST['repnew']."'"; } ?> id='new2'>
        <div class='placeholder'>Ripeti nuova password</div>
    </div><br>

    <button name='ok_cambia' class='no-load'>Cambia</button>

</form>
<!-- <form method="post">
    <button name='chiudi'>Chiudi</button>
</form> -->