<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class CodeGenerator {

    const NUMBER_CHARS = 62;

    protected $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function get_code ( $key ) {

        $random_num = $this->get_random_num( $key );

        $base62_num = $this->get_base62( $random_num );

        $random_key = $this->chars[ rand( 0, self::NUMBER_CHARS - 1 ) ];

        $code = $random_key . $base62_num;

        return $code;

    }

    private function get_random_num ( $key ) {

        list( $ms, $s ) = explode(' ', microtime());

        $s = $s - 1608000000;

        $ms = round($ms * 1000 );

        // Validate number has more 3 digits
        $ms = ( $ms < 100 ) ? $ms * 10 : $ms;

        $num = (int) ( $s . $ms );

        $num = $key + $num;

        return $num;

    }

    private function get_base62 ( $c ) {

        $status = true;

        $base62_num = '';

        do {
            $c = intdiv($c, self::NUMBER_CHARS);

            $r = $c % self::NUMBER_CHARS;

            $base62_num .= $this->chars[$r];

            if( $c < self::NUMBER_CHARS ) {

                $status = false;

                $base62_num .= $this->chars[$c];

            } 
        } while ( $status );

        $base62_num = strrev($base62_num);

        return $base62_num;

    }

}
