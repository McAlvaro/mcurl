<?php

namespace App\Services;

use App\Models\Url;
use Exception;
use Illuminate\Support\Facades\Log;

class GetDataUrl {

    protected $model;

    public function __construct( Url $url ) {

        $this->model = $url;

    }

    private function getMetaTitle ( $content ){

        $pattern = "|<[\s]*title[\s]*>([^<]+)<[\s]*/[\s]*title[\s]*>|Ui";
        
        if(preg_match($pattern, $content, $match))
            return $match[1];
        else
            return false;

    }

    public function getMetaTitleUrl(){
        
        try {

            $content = file_get_contents( $this->model->url );

            $title = $this->getMetaTitle($content);

            return $title ? $title : '';
        } catch(Exception $ex) {
            Log::debug('Ocurrio un Error al obtener el meta title: ' . $ex->getMessage() );
            
            return "";

        }

    }

}
