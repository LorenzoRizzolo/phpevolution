<?php

function nuovo_utente($username, $nome, $cognome, $password, $id_stabilimenti, $permessi){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare(" INSERT INTO `utenti`(`username`, `nome`, `cognome`, `password`, `id_stabilimenti`, `permessi_utente`) VALUES 
        ('$username', '$nome', '$cognome', '$password', '$id_stabilimenti', '$permessi'); ");
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function modifica_utente($id, $username, $nome, $cognome, $password, $id_stabilimenti, $permessi){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("
        UPDATE `utenti` SET `username`='$username',`nome`='$nome',`cognome`='$cognome',
        `password`='$password',`id_stabilimenti`='$id_stabilimenti',`permessi_utente`='$permessi' WHERE id=$id
        ");
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}


function esiste_utente($username){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `utenti` WHERE username='$username';");
        $stmt->execute();
        return $stmt->fetchColumn();
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function esiste_id_utente($id){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `utenti` WHERE id=$id;");
        $stmt->execute();
        return $stmt->fetchColumn();
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function get_utenti(){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `utenti`; ");
        $stmt->execute();
        $data = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($data, [
                "id" => $row['id'],
                "nome" => decrypt($row['nome']),
                "cognome" => decrypt($row['cognome']),
                "username" => decrypt($row['username']),
                "password" => decrypt($row['password']),
                "id_stabilimenti" => json_decode(decrypt($row['id_stabilimenti'])),
                "permessi_utente" => json_decode(decrypt($row['permessi_utente']))
            ]);
        }
        return $data;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function get_utente_by_id($id){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `utenti` WHERE id=$id; ");
        $stmt->execute();
        $data = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return [
                "id" => $row['id'],
                "nome" => decrypt($row['nome']),
                "cognome" => decrypt($row['cognome']),
                "username" => decrypt($row['username']),
                "password" => decrypt($row['password']),
                "id_stabilimenti" => json_decode(decrypt($row['id_stabilimenti'])),
                "permessi_utente" => json_decode(decrypt($row['permessi_utente']))
            ];
        }
        return false;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function elimina_utente($id){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare(" DELETE FROM utenti WHERE id=$id ");
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}