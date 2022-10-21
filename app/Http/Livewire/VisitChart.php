<?php

namespace App\Http\Livewire;

use App\Repositories\UrlRepository;
use App\Repositories\VisitRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class VisitChart extends Component
{

    public $labels = [];

    public $data = [];

    protected $listeners = [ 'getVisit' => 'getCountryVisitData' ];

    public function mount( UrlRepository $url_repo ) {

        $url_repository = $url_repo;
        
        $url = $url_repository->getOne( auth()->user()->id );
        
         if( !empty($url) ) {
             Log::debug('Get Grafica Mount: ' . $url->id);
             $this->getCountryVisitData($url->id);
         }

    }

    public function getCountryVisitData ( $url_id ){

        Log::debug('Received Event ' . $url_id);

        $visit_repo = new VisitRepository;

        $visit_data = $visit_repo->getCountryVisitsData( $url_id );
        
        $label = [];
        $data = [];
        foreach( $visit_data as $key => $value ) {

            array_push( $label, $key);

            array_push( $data, $value );

        }
        
        $this->labels = $label;

        $this->data = $data;

        Log::debug('Set Data for chart');

        Log::debug(json_encode($this->labels));
        Log::debug(json_encode($this->data));

        $this->emit('updateTheChart');

    }

    public function render()
    {
        return view('livewire.visit-chart');
    }
}
