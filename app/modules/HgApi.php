<?php

class HgApi {
    private $key = null;
    private $error = false;

    public function __construct($key = null){
        if(!empty($key)) $this->key = $key;
    }

    function GetQuotation($endpoint = '', $params = []){
        $uri = "https://api.hgbrasil.com/". $endpoint ."?key=". $this->key ."&format=json";
        
        if(is_array($params)) {
            foreach($params as $key => $value) {
                if(!empty($value)) continue;
                $uri .= $key . "=" . urlencode($value). '&';
                  
            }
            $uri = substr($uri, 0, -1);
            $response = @file_get_contents($uri);
            $this->error = false;
            $final = json_decode($response);
            return $final;
        }else {
            $this->error = true;
            return "Erro ao tentar solicitar os dados, tente novamente mais tarde!";
        }
        
    }

    function IsError(){
        return $this->error;
    }

    function DollarQuotation(){
        $data = $this->GetQuotation('finance/quotations');

        if(!empty($data) && is_object($data->results->currencies->USD)) {
            $this->error = false;
            return $data->results->currencies->USD;
        }else {
            $this->error = true;
            return "Erro ao tentar solicitar os dados, tente novamente mais tarde!";
        }
    }

    function EuroQuotation() {
        $data = $this->GetQuotation('finance/quotations');
        
        if(!empty($data) && is_object($data->results->currencies->EUR)) {
            $this->error = false;
            return $data->results->currencies->EUR;
        }else {
            $this->error = true;
            return "Erro ao tentar solicitar os dados, tente novamente mais tarde!";
        }
    }
}