<?php

namespace App\Services;

use App\Models\Url;

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

        $content = file_get_contents( $this->model->url );

        $title = $this->getMetaTitle($content);

        return $title ? $title : '';

    }

}
