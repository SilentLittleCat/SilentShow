<?php

namespace App\Http\Controllers\Admin;

use App\MusicCategory;
use App\UploadFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MusicCategoryController extends Controller
{
    protected $redirect_index = '/admin/music-categories/index';

    protected $pre_uri = '/admin/music-categories/';

    protected $view_path = 'admin.music-categories.';

    protected $model_name = '音乐分类';

    protected $model;

    public function __construct()
    {
        $this->model = new MusicCategory();
    }

    public function index(Request $request)
    {
        if($request->has('keywords') && $request->input('keywords')) {
            $keywords = '%' . $request->input('keywords') . '%';
            $list = $this->model->where('name', 'like', $keywords)->orderBy('updated_at', 'desc')->paginate();
        } else {
            $list = $this->model->orderBy('updated_at', 'desc')->paginate();
        }

        $pre_uri = $this->pre_uri;
        $model_name = $this->model_name;

        return view($this->view_path . 'index', compact('list', 'pre_uri', 'model_name'));
    }

    public function create(Request $request)
    {
        $pre_uri = $this->pre_uri;
        $model_name = $this->model_name;
        return view($this->view_path . 'create', compact('pre_uri', 'model_name'));
    }

    public function store(Request $request)
    {
        if(!$request->has('data')) return back()->withErrors(['sg_error_info' => '没有数据！']);

        $validator = Validator::make($request->input('data'), [
            'name' => 'unique:music_categories,name'
        ], [
            'name.unique' => '分类名已存在！'
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $res = $this->model->create($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        return redirect($this->redirect_index);
    }

    public function edit(Request $request)
    {
        if(!$request->has('id') || ($item = $this->model->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要编辑的数据']);
        $pre_uri = $this->pre_uri;
        $model_name = $this->model_name;
        return view($this->view_path . 'edit', compact('item', 'pre_uri', 'model_name'));
    }

    public function detail(Request $request)
    {
        if(!$request->has('id') || ($item = $this->model->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要查看的数据']);
        $pre_uri = $this->pre_uri;
        $model_name = $this->model_name;
        return view($this->view_path . 'detail', compact('item', 'pre_uri', 'model_name'));
    }

    public function update(Request $request)
    {
        if(!$request->has('id') || ($item = $this->model->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要编辑的数据']);
        $tmp = $this->model->where([
            ['id', '!=', $item->id],
            ['name', '=', $request->input('data')['name']]
        ])->first();
        if($tmp != null) {
            $validator = Validator::make($request->input('data'), []);
            $validator->errors()->add('name', '分类名已存在！');
            return back()->withErrors($validator);
        }
        $res = $this->model->where('id', $request->input('id'))->update($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        return redirect($this->redirect_index);
    }

    public function delete(Request $request)
    {
        if (!$request->has('id') || ($item = $this->model->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要删除的数据']);
        UploadFile::deleteImage($item->cover);
        $res = $item->delete();
        if ($res) return back()->withErrors(['sg_error_info' => '删除失败']);
        return redirect($this->redirect_index);
    }

}
