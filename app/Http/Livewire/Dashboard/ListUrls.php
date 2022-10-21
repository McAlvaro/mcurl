<?php

namespace App\Http\Livewire\Dashboard;

use App\Repositories\UrlRepository;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ListUrls extends Component
{

    protected $url_repo;

    public $url_selected = null ;

    protected $listeners = [ 'urlAdded' => 'render' ];

    /* public function mount( UrlRepository $url_repo ) { */

        /* $this->url_repo = $url_repo; */

    /* } */

    public function setUrlSelected ( $url_id ){
        Log::debug('Set Url: ' . $url_id);
        $this->url_selected = $url_id;
        
        /* $this->emitSelf('urlAdded'); */
        $this->emit('getDetail', $url_id );

        $this->emit('getVisit', $url_id);

    }


    public function render( $is_new = false )
    { 
        $this->url_repo = new UrlRepository();
        $urls = $this->url_repo->getAll( auth()->user()->id );

        if( ($urls && is_null($this->url_selected)) || $is_new ) {
            /* $this->url_selected = $urls->first()->id; */

            $url_id = $urls->first()->id;
            Log::debug('Url Fist or New :' . $url_id);
            $this->setUrlSelected( $url_id );

            /* $this->emit('getDetail', $this->url_selected ); */
        }

        return view('livewire.dashboard.list-urls', compact('urls'));
    }
}
