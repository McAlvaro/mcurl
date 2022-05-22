<?php

namespace App\Models;

use App\Services\CodeGenerator;
use App\Services\GetDataUrl;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'short_url','user_id', 'title', 'click_counter'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function visits() {
        return $this->hasMany( Visit::class, 'url_id', 'id' );
    }

    public function service () {
        
        return new GetDataUrl($this);

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

        $title = $url->service()->getMetaTitleUrl();

        if( !empty( $title ) ){

            $url->title = $title;
            $url->save();

        }

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

    public function incrementClickCounter() {
        $this->click_counter = $this->click_counter + 1;
        
        return $this;
    }

}
