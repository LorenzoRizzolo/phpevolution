<?php

function cronologia($azione){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare(" INSERT INTO `cronologia`(`id_utente`, `nome_utente`, `azione`, `data`, `ora`, `dati_per_admin`) VALUES 
        ('".($_SESSION['role']=="admin"?encrypt(-1):encrypt($_SESSION['id']))."',
        '".encrypt($_SESSION['username'])."','".encrypt($azione)."','".encrypt(date("d-m-Y"))."','".encrypt(date("H:i:s"))."','') ;");
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function get_cronologia(){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `cronologia` ORDER BY id DESC; ");
        $stmt->execute();
        $data = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($data, [
                "id" => $row['id'],
                "nome_utente" =>  esiste_id_utente(decrypt($row['id_utente'])) ? get_utente_by_id(decrypt($row['id_utente']))['username'] : decrypt($row['nome_utente']),
                "azione" => decrypt($row['azione']),
                "data" => decrypt($row['data']),
                "ora" => decrypt($row['ora'])
            ]);
        }
        return $data;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}