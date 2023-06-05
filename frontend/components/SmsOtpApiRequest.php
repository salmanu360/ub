<?php 
namespace frontend\components;

use yii;
use yii\base\Component;
use GuzzleHttp\Client;

class SmsOtpApiRequest extends Component{

    public $client = null;    
    private $api_key;

    private function getApiURL(){
        $this->api_key = \yii::$app->params['smsOtpApiKey'];
        return "https://2factor.in/API/V1/$this->api_key/SMS/";
    }

    public function __construct(){
        parent::__construct();
        $this->client = new Client([
            'base_uri' => self::getApiUrl(),
            'verify'=>false,
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function send($endpoint, $method = 'POST', $options = []){       
        $res = $this->client->request(
            $method, 
            $endpoint,
            // ['body'=>json_encode($encrypted_data)]
        );
        
        if($res->getStatusCode() == 200){
            $response = (string)$res->getBody();
            $response = json_decode($response, true);
            return  $response;
        }
        else{
            return false;
        }
    }
}