<?php

namespace App\Http\Controllers\Api;

use App\HelloFriendsLearnFunRemark;
use App\HelloFriendsUser;
use App\LearnFun;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class HelloFriendsController extends Controller
{
    protected $modal;

    protected $app_id;

    protected $app_secret;

    public function __construct()
    {
        $this->modal = new LearnFun();

        $this->app_id = env('WX_APP_ID');

        $this->app_secret = env('WX_APP_SECRET');
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
            $hello_friends_user = new HelloFriendsUser();
            $item->remarks = HelloFriendsLearnFunRemark::where('article_id', $item->id)->get()->each(function ($item) use($hello_friends_user) {
                $tmp = $hello_friends_user->where('fuId', $item->fuId)->first();
                $item->avatar = $tmp ? $tmp->avatarUrl : '';
                $item->nickName = $tmp ? $tmp->nickName : '';
            });
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
            $appId = $this->app_id;
            $secret = $this->app_secret;
            $code = $request->input('code');
            $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appId . '&secret=' . $secret . '&js_code=' . $code . '&grant_type=authorization_code';
            $res = $client->request('GET', $url);
            $res = json_decode($res->getBody()->getContents());
            if(isset($res->errcode)) {
                return response()->json(['status' => 'fail'], 200);
            } else {
                $res->status = 'success';

                $res->fuId = uniqid('silent-', true);

                HelloFriendsUser::updateOrCreate([
                    'openId' => $res->openid
                ], [
                    'session_key' => $res->session_key,
                    'fuId' => $res->fuId
                ]);
                return response()->json($res, 200);
            }
        }
        return response()->json(['status' => 'fail'], 200);
    }

    public function updateUser(Request $request)
    {
        if(!$request->has('silent_user_id')) {
            return response()->json(['status' => 'fail'], 200);
        }
        $item = HelloFriendsUser::where('fuId', $request->input('silent_user_id'))->first();
        if($item) {
            $item->nickName = $request->input('userInfo')['nickName'];
            $item->avatarUrl = $request->input('userInfo')['avatarUrl'];
            $item->gender = $request->input('userInfo')['gender'];
            $item->city = $request->input('userInfo')['city'];
            $item->province = $request->input('userInfo')['province'];
            $item->country = $request->input('userInfo')['country'];
            $item->avatarUrl = $request->input('userInfo')['avatarUrl'];
            if(!$item->save()) {
                return response()->json(['status' => 'fail'], 200);
            }

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'fail'], 200);
    }

    public function sendLearnFunRemark(Request $request)
    {
        if(!$request->has('silent_user_id') || ($item = HelloFriendsUser::where('fuId', $request->input('silent_user_id'))->first()) == null) {
            return response()->json(['status' => 'fail'], 200);
        }

        $res = HelloFriendsLearnFunRemark::create([
            'fuId' => $request->input('silent_user_id'),
            'article_id' => $request->input('article_id'),
            'content' => $request->input('content'),
            'back_user_id' => $request->input('back_user_id')
        ]);

        if(!$res) {
            return response()->json(['status' => 'fail'], 200);
        }
        return response()->json(['status' => 'success'], 200);
    }
}
