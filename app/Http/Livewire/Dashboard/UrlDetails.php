<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Url;
use App\Repositories\UrlRepository;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UrlDetails extends Component
{
    public $url = null;

    protected $url_repo;

    protected $listeners = [ 'getDetail' => 'getUrlDetails' ];

    public function mount( UrlRepository $url_repo ) {

        $this->url_repo = $url_repo;
        
        $url = $this->url_repo->getOne( auth()->user()->id );

        $this->url = $url;

    }


    public function getUrlDetails ( $url_id ) {

        Log::debug('Url ID: ' . $url_id);

        $this->url_repo = new UrlRepository();

        $url = $this->url_repo->getDetail( $url_id ) ;

        if( ! empty($url) ){
            $this->url = $url;
            Log::debug('Set Url Data');
        }

    }
 

    public function render()
    {
        return view('livewire.dashboard.url-details');
    }
}
