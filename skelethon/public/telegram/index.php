<?php
    require_once "../../vendor/autoload.php";
    require_once "upd.php";
    require_once "../../src/backend/common_file.php";

    define("TOKEN", $dati_env->token);


    class Bot{

        public function __construct(string $token){
            $this->token = $token;
        }

        public function bot($method, $datas = [], $timeout = 10){
            $telegram_url = "https://api.telegram.org/bot$this->token/$method";
            $client = new \GuzzleHttp\Client(['timeout' => $timeout]);
            
            try {
                $response = $client->post($telegram_url, ['form_params' => $datas]);
    
            } catch(\GuzzleHttp\Exception\RequestException $e){
    
                error_log($e->getMessage());
                return false;
            }
            
            $body = (string)$response->getBody();
            $data = json_decode($body);
            
            if ($response->getStatusCode() !== 200 || !$data->ok) {
                error_log("Telegram error [$data->error_code]: $data->description");
                return false;
            }
            
            return $data;
        }

    }
    
    if($upd){
        $dati = $GLOBALS['dati_env'];
        $bot = new Bot($dati->token);
        $ar = explode(" ", $text);
        $message = $ar[0];
        $arg = $ar[1];
        switch($message){
            case '/chatid':
                $bot->bot("sendMessage", ["chat_id" => $chat_id, "text" => "Il tuo chatid: ".$chat_id]);
                break;
            default:
                $bot->bot("sendMessage", ["chat_id" => $chat_id, "text" => "Comando non trovato"]);
                break;
        }
    }
?>