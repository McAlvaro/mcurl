<?php

namespace App\Services;

use App\Models\Visit;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GetVisitData {

    protected $model;

    protected $client;

    protected $parsed_response = [];

    public function __construct( Visit $visit ){

        $this->model = $visit;
        
        $this->client = new Client([
            'base_uri' => 'http://ipwho.is',
            'timeout' => 3.0
        ]);

    }

    public function getVisitData (){

        try{

            $client_ip = $this->model->ip_address;
            Log::debug("IP Get: $client_ip");
            $response = $this->client->request('GET', "$client_ip");
        

            if( !is_null($response->getBody()) ){
                Log::debug('Parsed Response');
                $this->parsed_response = $this->parseResponse( json_decode($response->getBody()));
            }
        
            return $this->parsed_response;

        } catch( Exception $ex ){

            Log::debug('Ocurrio un Error al Obtener Datos de la IP: ' . $ex->getMessage());
            return $this->parsed_response; 

        }

    }

    private function parseResponse ( $response ){

        return [
            'country' => isset($response->country) ? $response->country : '',
            'country_code' => isset($response->country_code) ? $response->country_code : '',
            'city' => isset($response->city) ? $response->city : '',
            'continent' => isset($response->continent) ? $response->continent : ''
        ];
    }

}
