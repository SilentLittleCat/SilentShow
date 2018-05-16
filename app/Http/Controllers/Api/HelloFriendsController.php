<?php

namespace App\Http\Controllers\Api;

use App\LearnFun;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelloFriendsController extends Controller
{
    protected $modal;

    public function __construct()
    {
        $this->modal = new LearnFun();
    }

    public function getLearnFun(Request $request)
    {
        $offset = $request->has('offset') ? (int) $request->input('offset') : 0;
        $limit = $request->has('limit') ? (int) $request->input('limit') : 5;
        if(!$request->has('id') || ($item = $this->modal->find($request->input('id'))) == null) {
            return response()->json([], 200);
        } else {
            $item->content = str_replace(array("/r", "/n", "/r/n"), "<br>", $item->content);
            $item->image = url($item->image);
            return response()->json($item, 200);
        }
    }

    public function getLearnFuns(Request $request)
    {
        $offset = $request->has('offset') ? (int) $request->input('offset') : 0;
        $limit = $request->has('limit') ? (int) $request->input('limit') : 5;
        $items = $this->modal->orderBy('updated_at', 'desc')->offset($offset)->limit($limit)->get()->each(function ($item) {
            $item->image = url($item->image);
        });
        return response()->json($items, 200);
    }

    public function login(Request $request)
    {
        if($request->has('code')) {
            $client = new Client();
            $appId = 'wx98e7bce25e638940';
            $secret = 'e84b8203a0458b15fff785376a7d5a20';
            $code = $request->input('code');
            $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appId . '&secret=' . $secret . '&js_code=' . $code . '&grant_type=authorization_code';
            $res = $client->request('GET', $url);
            $res = json_decode($res->getBody()->getContents());
            if(isset($res->errcode)) {
                return response()->json(['status' => 'fail'], 200);
            } else {
                $res->status = 'success';
                return response()->json($res, 200);
            }
        }
        return response()->json(['status' => 'fail'], 200);
    }
}
