<?php

namespace App\Http\Controllers\Admin;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    protected $redirect_index = '/admin/movies/index';

    protected $view_path = 'admin.movies.';

    protected $modal;

    public function __construct()
    {
        $this->modal = new Movie();
    }

    public function index(Request $request)
    {
        if($request->has('keywords') && $request->input('keywords')) {
            $keywords = '%' . $request->input('keywords') . '%';
            $list = $this->modal->where('name', 'like', $keywords)->orderBy('updated_at', 'desc')->paginate();
        } else {
            $list = $this->modal->orderBy('updated_at', 'desc')->paginate();
        }

        return view($this->view_path . 'index', compact('list'));
    }

    public function create(Request $request)
    {
        return view($this->view_path . 'create');
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
        return view($this->view_path . 'edit', compact('item'));
    }

    public function detail(Request $request)
    {
        if(!$request->has('id') || ($item = $this->modal->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要查看的数据']);
        return view($this->view_path . 'detail', compact('item'));
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
        $res = $item->delete();
        if($res) return back()->withErrors(['sg_error_info' => '删除失败']);
        return redirect($this->redirect_index);
    }
}
