<?php

namespace App\Models;

use App\Services\CodeGenerator;
use Carbon\Carbon;
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

    public function parseCreatedAt(){
        $current_year = Carbon::now()->year;
        $created_year = Carbon::parse($this->created_at)->year;

        $date_formatted = "";
        if( $created_year == $current_year ){
            $date_formatted = Carbon::parseFromLocale($this->created_at, )->format('d M');
        } else {
            $date_formatted = Carbon::parse($this->created_at)->format('d M Y');
        }

        return $date_formatted;
    }

}
