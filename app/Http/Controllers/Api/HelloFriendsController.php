<?php

namespace App\Http\Controllers\Api;

use App\LearnFun;
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
        if(!$request->has('id') || ($item = $this->modal->where('id', $request->input('id'))->get()) == null) {
            return response()->json([], 200);
        } else {
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

        }
    }
}
