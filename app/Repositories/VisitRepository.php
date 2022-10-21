<?php

namespace App\Repositories;

use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class VisitRepository {

    protected $provider = Visit::class;

    public function getVisitsData ( $url_id ) {

        $visits_data = $this->provider::where('url_id', $url_id)->groupBy('visit_date')->select(DB::raw('COUNT(*) as counter_visit, visit_date'))->pluck('counter_visit', 'visit_date');

        return $visits_data;

    }

    public function getCountryVisitsData( $url_id ) {

        $visits_data = $this->provider::where('url_id', $url_id)->where('country', '<>', '')->groupBy('country')->select(DB::raw('country, COUNT(*) as counter_visits'))->pluck('counter_visits', 'country');

        \Log::debug("Visits by Country: " . json_encode($visits_data));

        return $visits_data;

    }

}
