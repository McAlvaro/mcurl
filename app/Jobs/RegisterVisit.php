<?php

namespace App\Jobs;

use App\Models\Url;
use App\Models\Visit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RegisterVisit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;

    protected $client_ip;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( Url $url, $client_ip )
    {
        $this->url = $url;

        $this->client_ip = $client_ip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->url->incrementClickCounter()->save();
        
        Log::debug('Client IP: ' . $this->client_ip);

        $visit = Visit::create([
            'url_id' => $this->url->id,
            'ip_address' => $this->client_ip,
            'visit_date' => date('Y-m-d')
        ]);

        $data = $visit->service()->getVisitData();

        Log::debug('Response JOBS: ');

        Log::debug($data);

        if( !empty($data) ){
            $visit->country = $data['country'];
            $visit->country_code = $data['country_code'];
            $visit->city = $data['city'];
            $visit->continent = $data['continent'];
            $visit->save();
        }

        
    }
}
