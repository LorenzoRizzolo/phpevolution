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
    $data = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$data->dbhost;dbname=$data->dbname", $data->dbuser, $data->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("query");
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
    $data = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$data->dbhost;dbname=$data->dbname", $data->dbuser, $data->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("query");
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
    $data = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$data->dbhost;dbname=$data->dbname", $data->dbuser, $data->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("query select");
        $stmt->execute([]);
        $data = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($data, $row['name_column']);
        }
        return $data;
    }catch(PDOException $e){
        echo $e->getMEssage();
        return false;
    }
}
</code>
</pre>
<code class="code2">
function getdatafromdb(){
    $data = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$data->dbhost;dbname=$data->dbname", $data->dbuser, $data->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("query SELECT");
        $stmt->execute([]);
        $data = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($data, $row['name_column']);
        }
        return $data;
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
    $data = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$data->dbhost;dbname=$data->dbname", $data->dbuser, $data->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("query");
        $stmt->execute();
        return true;
    }catch(Exception $e){
        echo $e->getMEssage();
        return false;
    }
}
</code>
</pre>
<code class="code2">
function addtodb(){
    $data = $GLOBALS['dati_env'];
    try{
        $conn = new PDO("mysql:host=$data->dbhost;dbname=$data->dbname", $data->dbuser, $data->dbpas);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("query");
        $stmt->execute();
        return true;
    }catch(Exception $e){
        echo $e->getMEssage();
        return false;
    }
}
</code>


</div>