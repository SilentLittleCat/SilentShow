<?php

namespace App\Http\Controllers\Api;

use App\HelloFriendsLearnFunRemark;
use App\HelloFriendsUser;
use App\LearnFun;
use Carbon\Carbon;
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
            $carbon = Carbon::now();
            $item->remarks = HelloFriendsLearnFunRemark::where('article_id', $item->id)->orderBy('created_at', 'desc')->get()->each(function ($item) use($hello_friends_user) {
                $tmp = $hello_friends_user->where('fuId', $item->fuId)->first();
                $item->avatar = $tmp ? $tmp->avatarUrl : '';
                $item->nickName = $tmp ? $tmp->nickName : '';
            });
            foreach($item->remarks as $tmp) {
                $tmp->remark_backs = HelloFriendsLearnFunRemark::where('fa_id', $tmp->id)->orderBy('created_at', 'desc')->get();
                $tmp->remarkDate = $this->getRemarkDate($tmp->created_at);
                foreach($tmp->remark_backs as $back) {
                    $tmp_1 = HelloFriendsUser::where('fuId', $back->fuId)->first();
                    $tmp->nickName = $tmp_1 ? $tmp_1->nickName : '';
                    $tmp->remarkDate = $this->getRemarkDate($tmp->created_at);
                }
            }
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
            'fa_id' => $request->input('fa_id'),
            'fuId' => $request->input('silent_user_id'),
            'article_id' => $request->input('article_id'),
            'content' => $request->input('content')
        ]);

        if(!$res) {
            return response()->json(['status' => 'fail'], 200);
        }

        $tmp = HelloFriendsUser::where('fuId', $item->fuId)->first();
        $res->avatar = $tmp ? $tmp->avatarUrl : '';
        $res->nickName = $tmp ? $tmp->nickName : '';
        $res->remarkDate = '刚刚';
        if($request->input('fa_id') == 0) {
            return response()->json(['status' => 'success', 'type' => 'first', 'data' => $res], 200);
        }
        return response()->json(['status' => 'success', 'type' => 'second', 'data' => $res], 200);
    }

    public function getRemarkDate($date)
    {
        $tmp = $date->diffInYears();
        if(!$tmp) {
            return $tmp . '年前';
        }
        $tmp = $date->diffInMonths();
        if(!$tmp) {
            return $tmp . '个月前';
        }
        $tmp = $date->diffInHours();
        if(!$tmp) {
            return $tmp . '小时前';
        }
        $tmp = $date->diffInMinutes();
        if(!$tmp) {
            return $tmp . '分钟前';
        }
        return '刚刚';
    }
}
