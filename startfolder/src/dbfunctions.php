<?php

function tryconnection(){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$dati->dbhost;dbname=$dati->dbname", $dati->dbuser, $dati->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `table_name`");
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return "count: ".$count;
    }catch(Exception $e){
        echo $e->getMEssage();
        return -1;
    }
}

function addtodb(){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$dati->dbhost;dbname=$dati->dbname", $dati->dbuser, $dati->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO `table` VALUES ()");
        $stmt->execute();
        return [true, $conn->lastInsertId()];
    }catch(Exception $e){
        echo $e->getMEssage();
        return [false];
    }
}

function getdatafromdb(){
    $dati = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$dati->dbhost;dbname=$dati->dbname", $dati->dbuser, $dati->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `table`");
        $stmt->execute([]);
        $dati = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($dati, $rpw['name_column']);
        }
        return $dati;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}

?>