<?php

namespace App\Http\Controllers\Friends;

use App\HotTalk;
use App\UploadFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotTalkController extends Controller
{
    protected $redirect_index = '/friends/hot-talks/index';

    protected $view_path = 'friends.hot-talks.';

    protected $pre_uri = '/friends/hot-talks/';

    protected $modal_name = '热谈';

    protected $modal;

    public function __construct()
    {
        $this->modal = new HotTalk();
    }

    public function index(Request $request)
    {
        if($request->has('keywords') && $request->input('keywords')) {
            $keywords = '%' . $request->input('keywords') . '%';
            $list = $this->modal->where('title', 'like', $keywords)->orderBy('updated_at', 'desc')->paginate();
        } else {
            $list = $this->modal->orderBy('updated_at', 'desc')->paginate();
        }
        $modal_name = $this->modal_name;
        $pre_uri = $this->pre_uri;
        return view($this->view_path . 'index', compact('list', 'modal_name', 'pre_uri'));
    }

    public function create(Request $request)
    {
        $modal_name = $this->modal_name;
        $pre_uri = $this->pre_uri;
        return view($this->view_path . 'create', compact('pre_uri', 'modal_name'));
    }

    public function store(Request $request)
    {
        if(!$request->has('data')) return back()->withErrors(['sg_error_info' => '没有数据！']);
        $res = $this->modal->create($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        return redirect($this->redirect_index);
    }

    public function edit(Request $request)
    {
        if(!$request->has('id') || ($item = $this->modal->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要编辑的数据']);
        $modal_name = $this->modal_name;
        $pre_uri = $this->pre_uri;
        return view($this->view_path . 'edit', compact('item', 'modal_name', 'pre_uri'));
    }

    public function detail(Request $request)
    {
        if(!$request->has('id') || ($item = $this->modal->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要查看的数据']);
        $modal_name = $this->modal_name;
        $pre_uri = $this->pre_uri;
        return view($this->view_path . 'detail', compact('item', 'modal_name', 'pre_uri'));
    }

    public function update(Request $request)
    {
        if(!$request->has('id') || ($item = $this->modal->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要编辑的数据']);
        $res = $this->modal->where('id', $request->input('id'))->update($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        return redirect($this->redirect_index);
    }

    public function delete(Request $request)
    {
        if(!$request->has('id') || ($item = $this->modal->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要删除的数据']);
        (new UploadFile())->deleteImage($item->image);
        $res = $item->delete();
        if($res) return back()->withErrors(['sg_error_info' => '删除失败']);
        return redirect($this->redirect_index);
    }

    public function deleteMany(Request $request)
    {
        if(!$request->has('delete_ids') || empty($request->input('delete_ids'))) {
            return back()->withErrors(['sg_error_info' => '找不到要删除的数据']);
        }
        foreach(explode(',', $request->input('delete_ids')) as $id) {
            $item = $this->modal->where('id', $id)->first();
            if(!empty($item)) {
                (new UploadFile())->deleteImage($item->image);
                $item->delete();
            }
        }
        return redirect($this->redirect_index);
    }
}
