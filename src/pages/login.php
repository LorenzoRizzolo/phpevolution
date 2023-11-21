
<?php

if(isset($_POST['accedi'])){
    $nome = $_POST['nome'];
    $pas = $_POST['password'];
    if(!isempty($nome) && !isempty($pas)){
        if($nome=="admin"){
            if($pas==get_password_admin()){
                $_SESSION['username']="admin";
                $_SESSION['role']="admin";
                redirect("");
            }else{
                error("Password errata");
            }
        }else{
        }
    }else{
        error("Compila tutti i campi");
    }
}

?>

<div class="login-container">
    
    <form method="post" class="login">
        <img src="img/logo.png" alt="">
        
        <h2>Accedi a Monviso</h2>
        <i>Inserisci le tue credenziali per accedere</i><br><br>

        <div class='input-container' style='display:inline-block;'>
            <input type='text' name='nome' <?php if(isset($_POST['nome'])){ echo "value='".$_POST['nome']."'"; } ?> >
            <div class='placeholder'><i class="fa-solid fa-user-tie"></i> Nome utente</div>
        </div>

        <div class='input-container' style='display:inline-block;'>
        <div class="eye"><i class="fa-solid fa-eye"></i></div>
            <input type='password' name='password' <?php if(isset($_POST['password'])){ echo "value='".$_POST['password']."'"; } ?> >
            <div class='placeholder'> <i class="fa-solid fa-key"></i> Password</div>
        </div>

        <br><br>
        <button name='accedi'>Accedi</button>

    </form>

</div>
