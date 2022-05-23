<?php

namespace App\Repositories;

use App\Models\Url;

class UrlRepository {
    
    protected $provider = Url::class;

    public function getAll ( $user_id ){

        return $this->provider::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        
    }

    public function getOne( $user_id ) {

        return $this->provider::where('user_id', $user_id)->orderBy('created_at', 'desc')->with(['visits', 'user'])->first();

    }

    public function getDetail( $url_id ) {

        return $this->provider::where('id', $url_id)->with(['visits', 'user'])->first();

    }

} 
