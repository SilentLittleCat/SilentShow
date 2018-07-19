<?php

namespace App\Http\Controllers;

use App\Photo;
use App\PhotoCategory;
use App\UploadFile;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $from = '39.071510,117.190091';
        $to = $from;
        $url = 'https://apis.map.qq.com/ws/distance/v1/?from=' . $from . '&to=' . $to . '&key=' . env('TECENT_POSITION_KEY');
        $url = 'https://apis.map.qq.com/ws/distance/v1/?mode=driving&from=39.983171,116.308479&to=39.996060,116.353455;39.949227,116.394310&key=2DEBZ-SPSK3-ICA3T-Y4Y7D-EDWYQ-WBFVE';
        $res = $client->get($url);
        $res = (string)$res->getBody();
        dd($res);
        return response()->json(['status' => 'success', 'data' => $res]);
    }
}
