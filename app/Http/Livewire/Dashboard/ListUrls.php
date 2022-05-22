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

    public function setUrlSelected ( $post_id ){
        Log::debug('Set Url: ' . $post_id);
        $this->url_selected = $post_id;
        
        /* $this->emitSelf('urlAdded'); */

    }


    public function render( $is_new = false )
    { 
        $this->url_repo = new UrlRepository();
        $urls = $this->url_repo->getAll( auth()->user()->id );

        if( ($urls && is_null($this->url_selected)) || $is_new ) {
            $this->url_selected = $urls->first()->id;
        }

        return view('livewire.dashboard.list-urls', compact('urls'));
    }
}
