<?php

namespace App\Models;

use App\Services\CodeGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'short_url','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    /* SHORT URL */

    public function short_url( $long_url ){

        // Create URL
        $url = self::create([
            'url' => $long_url,
            'user_id' => auth()->user()->id
        ]);

        // Generate Code
        $code = ( new CodeGenerator() )->get_code($url->id);

        // Update URL
        $url->code = $code;
        $url->save();

        return $url->code;

    }

}
