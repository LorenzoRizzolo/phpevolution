<div class="home">

<p>Simple PHP functions:</p>

<p>Send email get address and servermail data from .env file to send emails. ( see rules of your servermail as gmail, aruba, yahoo... ) </p>
<p>You need only of this 3 simple imformations to send email</p>
<code>
    send_email($email, $object, $message);    
</code>

<p>
    Database functions use .env file to get data of your login password and name.
</p>
<p>
    With this simple code, using PDO to be protected from SQL injections, you can connect and use SQL query for your database.
</p>

<p>Try connection to DB</p>
<pre>
<code>
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
</code>
</pre>
<code class='code2'>
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
</code>

<p>Get data from db</p>
<pre>
<code>
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
</code>
</pre>
<code class="code2">
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
</code>



<p>Add data to Db</p>
<pre>
<code>
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
</code>
</pre>
<code class="code2">
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
</code>


</div>