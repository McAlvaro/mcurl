<?php

namespace App\Http\Livewire\Dashboard;

use App\Respositories\UrlRespository;
use Livewire\Component;

class ListUrls extends Component
{

    protected $url_repo;

    public function mount( UrlRespository $url_repo ) {

        $this->url_repo = $url_repo;

    }

    public function render()
    { 
        $urls = $this->url_repo->getAll( auth()->user()->id );

        return view('livewire.dashboard.list-urls', compact('urls'));
    }
}
