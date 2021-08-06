<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\mmsiRequest;
use App\Http\Requests\mmsiHistoryRequest;
use App\CrawledVessel;

class CrawledVesselController extends Controller
{
    public function index() {
        return view('welcome',["crawledVessels"=>CrawledVessel::paginate(15)]);
    }

    /**
     * gets the most recent position of the vessel based on mmsi
     */
    public function latestPosition(mmsiRequest $request) {
        $crawledVessel = CrawledVessel::where('mmsi',$request->mmsi)->orderBy('time_received','desc')->first();
        if ($crawledVessel) {
            return response()->json(['data'=>['recent_position' => ['lng'=> $crawledVessel->longtitude,'lon'=>$crawledVessel->latitude]]
                    ,'message'=>'Record Found.'],200);
        } else {
            return response()->json(['message'=>'Record Not Found.'],200);
        }
    }

    /**
     * gets the history of the vessel based on mmsi ??
     */
    public function historyPosition(mmsiHistoryRequest $request) {    
        $crawledVessel = CrawledVessel::where('mmsi',$request->mmsi)->get();
        if ($crawledVessel) {
            return response()->json(['data'=>$crawledVessel,'message'=>'Record Found.'],200);
        } else {
            return response()->json(['message'=>'Record Not Found.'],200);
        }
    }
}
