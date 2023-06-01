<?php

// session timeout
$time = 21600;
// Sets session timeout
ini_set('session.gc_maxlifetime', $time);
ini_set('session.use_only_cookies', true);
session_set_cookie_params($time);
session_start();


require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();
class dati_env{
    public $dbhost;
    public $dbname;
    public $dbuser;
    public $dbpas;
    public $key;
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
$dati_env->dbpas = $_ENV['DBPAS'];
$dati_env->key = $_ENV['KEY'];
$dati_email = new dati_email();
$dati_email->email = $_ENV['EMAIL'];
$dati_email->emailpas = $_ENV['EMAILPAS'];
$dati_email->smtp = $_ENV['SMTPSERVER'];
$dati_email->port = $_ENV['PORT'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function send_email($emailto, $object, $message){
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
        $mail->addAddress($emailto);
        $mail->isHTML(true);
        $mail->Subject = $object;
        $mail->Body = $message;
        $mail->send();
        return true;
    }catch(Exception $e){
        return false;
    }
}

function decrypt($var){
    $dati = $GLOBALS['dati_env'];
    return openssl_decrypt($var,"AES-256-CBC", $dati->key);
}
function encrypt($var){
    $dati = $GLOBALS['dati_env'];
    return openssl_encrypt($var,"AES-256-CBC", $dati->key);
}

// here there are the db functions
require 'functions.php';
require 'dbfunctions.php';

?>