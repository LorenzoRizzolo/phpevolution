<?php


function nuovo_stabilimento($nome, $locazione){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare(" INSERT INTO `stabilimenti`(`nome`, `locazione`) VALUES ('$nome', '$locazione'); ");
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function aggiorna_stabilimento($id, $nome, $locazione){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare(" UPDATE `stabilimenti` SET `nome`='$nome',`locazione`='$locazione' WHERE id=$id; ");
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function esiste_stabilimento($nome, $locazione){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `stabilimenti` WHERE nome='$nome' AND locazione='$locazione';");
        $stmt->execute();
        return $stmt->fetchColumn();
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function get_stabilimenti(){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `stabilimenti`; ");
        $stmt->execute();
        $data = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($data, [
                "id" => $row['id'],
                "nome" => decrypt($row['nome']),
                "locazione" => decrypt($row['locazione'])
            ]);
        }
        return $data;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function get_stabilimento_by_id($id){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `stabilimenti` WHERE id=$id");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return [
                "id" => $row['id'],
                "nome" => decrypt($row['nome']),
                "locazione" => decrypt($row['locazione'])
            ];
        }
        return false;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

function elimina_stabilimento($id){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=".$dati->dbhost.";dbname=".$dati->dbname, $dati->dbuser, $dati->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare(" DELETE FROM stabilimenti WHERE id=$id ");
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}