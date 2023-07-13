<?php

require_once "../vendor/autoload.php";
require_once 'vars.php';
require 'functions.php';
require 'dbfunctions.php';

// session timeout
$time = 3600;
ini_set('session.gc_maxlifetime', $time);
ini_set('session.use_only_cookies', true);
session_set_cookie_params($time);
session_start();
if(isset($_GET['logout'])){
    session_unset();
    // session_destroy();
    // session_abort();
    // session_start();
    $_SESSION['cook']=true;
}


// require_once '../vendor/autoload.php'; 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../../"); //env
$dotenv->load();
class dati_env{
    public $dbhost;
    public $dbname;
    public $dbuser;
    public $dbpassword;
    public $key;
    public $iv;
}
class dati_email{
    public $email;
    public $emailpas;
    public $smtp;
    public $port;
}
$dati_env = new dati_env();
$dati_env->dbhost = $_ENV['DBHOST'];
$dati_env->dbname = $_ENV['DBNAME'];
$dati_env->dbuser = $_ENV['DBUSER'];
$dati_env->dbpassword = $_ENV['DBPAS'];
$dati_env->key = $_ENV['KEY'];
$dati_env->iv = $_ENV['IV'];
$dati_email = new dati_email();
$dati_email->email = $_ENV['EMAIL'];
$dati_email->emailpas = $_ENV['EMAILPAS'];
$dati_email->smtp = $_ENV['SMTPSERVER'];
$dati_email->port = $_ENV['PORT'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function send_email($email, $object, $message){
    $dati = $GLOBALS['dati_email'];
    try{
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $dati->smtp; 
        $mail->SMTPAuth = true;
        $mail->Username = $dati->email;
        $mail->Password = $dati->emailpas; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = $dati->port;
        $mail->setFrom($dati->email);
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $object;
        $mail->Body = $message;
        $mail->send();
        return true;
    }catch(Exception $e){
        return false;
    }
}

// here there are the db functions

?>