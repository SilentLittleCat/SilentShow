<?php

namespace App\Http\Controllers\Guest;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('keywords') && $request->input('keywords')) {
            $keywords = '%' . $request->input('keywords') . '%';
            $list = Movie::where('name', 'like', $keywords)->orderBy('updated_at', 'desc')->paginate();
        } else {
            $list = Movie::orderBy('updated_at', 'desc')->paginate();
        }

        return view('guest.movies.index', compact('list'));
    }

    public function create(Request $request)
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        if(!$request->has('data')) return back()->withErrors(['sg_error_info' => '没有数据！']);
        $res = Movie::create($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        return redirect('/admin/movies/index');
    }

    public function edit(Request $request)
    {
        if(!$request->has('id') || ($item = Movie::find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要编辑的数据']);
        return view('admin.movies.edit', compact('item'));
    }

    public function detail(Request $request)
    {
        if(!$request->has('id') || ($item = Movie::find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要查看的数据']);
        return view('admin.movies.detail', compact('item'));
    }

    public function update(Request $request)
    {
        if(!$request->has('id') || ($item = Movie::find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要编辑的数据']);
        $res = Movie::where('id', $request->input('id'))->update($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        return redirect('/admin/movies/index');
    }

    public function delete(Request $request)
    {
        if(!$request->has('id') || ($item = Movie::find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要删除的数据']);
        $res = $item->delete();
        if($res) return back()->withErrors(['sg_error_info' => '删除失败']);
        return redirect('/admin/movies/index');
    }
}
