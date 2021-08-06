<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\CrawledVessel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // /**
    //  * bucketize data that received from api
    //  */
    // public function bucketize() {     
    //     // $rawDataBucket = [];

    //     // $this->getRecentPosition($rawDataBucket);
        
    //     // //remove the key for collected data from api
    //     // $dataBucket = [];        
    //     // foreach($rawDataBucket as $key =>$values) {
    //     //     foreach($values as $value)
    //     //         $dataBucket[] = $value;
    //     // }
                
    //     // //store in /storage/public folder with file name as time t'was stored
    //     // $fileName = time();
    //     // Storage::disk('public')->put($fileName .'.json', json_encode($dataBucket));

    //     // //get json file and parse
    //     // $jsonRawObject = Storage::disk('public')->get($fileName .'.json');
    //     // //decode the jsonRawObject from file
    //     // $jsonObject = json_decode($jsonRawObject, true);
        
    //     // //stor into db table parsed JSON
    //     // foreach($jsonObject as $jsonKey => $jsonValue) {
    //     //     //insert of update the record
    //     //     CrawledVessel::updateOrCreate(
    //     //         ['id' => $jsonValue['id']],
    //     //         [
    //     //             'vessel_name'=> $jsonValue['name'],
    //     //             'imo'=>  $jsonValue['imo'],
    //     //             'mmsi'=> $jsonValue['mmsi'],
    //     //             'call_sign'=> $jsonValue['call_sign'],
    //     //             'longitude'=> $jsonValue['last_known_position']['geometry']['coordinates'][0],
    //     //             'latitude'=> $jsonValue['last_known_position']['geometry']['coordinates'][1],
    //     //             'time_received' => Carbon::now()
    //     //         ]
    //     //     );
    //     // }
    // }

    // /**
    //  * get the last known position of all vessels based on polygon type coordinates 
    //  */
    // private function getRecentPosition(&$dataBucket,$next = null) {
    //     $coordinates = [
    //         [103.51282, 1.68337],
    //         [103.25644, 1.03532],
    //         [103.71388, 0.60126],
    //         [104.52140, 1.03999],
    //         [104.52607, 1.84257],
    //         [103.51282, 1.68337]
    //     ];

    //     $queryString = ['last_known_position'=>json_encode(['type'=>'Polygon','coordinates'=>[$coordinates]]),'limit'=> 1000];

    //     if(!empty($next))
    //         $queryString['next'] = $next;

    //     $response = Http::withoutVerifying()->withToken(env('AIS_TOKEN'))->get('https://ais.spire.com/vessels',$queryString);
                  
    //     if($response->successful() && count($response['data'])) {        
    //         array_push($dataBucket,$response['data']);            
    //     } else {
    //         return;
    //     }

    //     $this->getRecentPosition($dataBucket,$response['paging']['next']);
    // }
}
