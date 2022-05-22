<?php

namespace App\Http\Controllers;

use App\Jobs\RegisterVisit;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    public function index (Request $request) {

        /* $urls = Url::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get(); */

        return view('dashboard');

    }

    public function show( Request $request, $code ){

        $url = Url::where('code', $code)->first();

        if( $url ){

            RegisterVisit::dispatch($url, $request->getClientIp());

            return redirect()->away($url->url);

        } else {

            abort(404);

        }

    }

    public function store ( Request $request, Url $url ){

        $url = $url->short_url( $request->long_url );

        return response()->json([
            'short_url' => env('APP_DOMAIN') . '/' . $url
        ]);

    }

}
