<?php

namespace App\Models;

use App\Services\GetVisitData;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';

    protected $guarded = [];

    public function url () {
        return $this->belongsTo( Url::class, 'id', 'url_id');
    }

    public function service(){
        return new GetVisitData($this);
    }
}
