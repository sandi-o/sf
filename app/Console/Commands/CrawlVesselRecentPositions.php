<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CrawlVesselRecentPositions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:vessels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets the vessel\'s most recent position and save it to a json file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::withoutVerifying()->withToken(env('AIS_TOKEN'))->get('https://ais.spire.com/vessels?last_known_position');

        $geoBucket = array();
        foreach($response->json()['data'] as $key => $value) {
            $coordinates = $value['last_known_position']['geometry']['coordinates'];

            $geoBucket[$id]['id']           = $value['id'];
            $geoBucket[$id]['name']         = $value['name'];
            $geoBucket[$id]['imo']          = $value['imo'];
            $geoBucket[$id]['mmsi']         = $value['mmsi'];
            $geoBucket[$id]['call_sign']    = $value['call_sign'];
            $geoBucket[$id]['longitiude']   = $coordinates[0];
            $geoBucket[$id]['latitude']     = $coordinates[1];
            $geoBucket[$id]['time_received']= Carbon::now();
        }
    
        Storage::disk('public')->put(time() .'.json', json_encode($geoBucket));
    }
}
