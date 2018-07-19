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
        $url = 'http://apis.map.qq.com/ws/place/v1/suggestion/?keyword=%E7%BE%8E%E9%A3%9F&region=%E5%8C%97%E4%BA%AC&output=json&key=3DSBZ-QV7HS-T7YO7-63ZYW-L4IMK-NSBJD';
        $res = $client->get($url);
        $res = (string)$res->getBody();
        dd($res);
        return response()->json(['status' => 'success', 'data' => $res]);
    }
}
