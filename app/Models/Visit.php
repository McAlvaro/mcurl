<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';

    protected $guarded = [];

    public function url () {
        return $this->belongsTo( Url::class, 'id', 'url_id');
    }
}
