<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\PhotoCategory;
use App\PhotoCategoryRelation;
use App\UploadFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    protected $redirect_index = '/admin/photos/index';

    protected $pre_uri = '/admin/photos/';

    protected $view_path = 'admin.photos.';

    protected $model_name = '图片';

    protected $model;

    public function __construct()
    {
        $this->model = new Photo();
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

        $categories = (new PhotoCategory())->select(['name', 'id'])->get();
        return view($this->view_path . 'create', compact('pre_uri', 'model_name', 'categories'));
    }

    public function store(Request $request)
    {
        if(!$request->has('data')) return back()->withErrors(['sg_error_info' => '没有数据！']);
        $res = $this->model->create($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        if($request->has('categories') && is_array($request->input('categories'))) {
            foreach($request->input('categories') as $category) {
                PhotoCategoryRelation::create([
                    'photo_id' => $res->id,
                    'category_id' => $category
                ]);
            }
        }
        return redirect($this->redirect_index);
    }

    public function edit(Request $request)
    {
        if(!$request->has('id') || ($item = $this->model->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要编辑的数据']);
        $pre_uri = $this->pre_uri;
        $model_name = $this->model_name;
        $categories = (new PhotoCategory())->select(['name', 'id'])->get();
        $categories_string = $item->categories->implode('id', ',');
        return view($this->view_path . 'edit', compact('item', 'pre_uri', 'model_name', 'categories', 'categories_string'));
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
        $res = $this->model->where('id', $request->input('id'))->update($request->input('data'));
        if(!$res) return back()->withErrors(['sg_error_info' => '数据库保存失败！']);
        PhotoCategoryRelation::where('photo_id', $item->id)->delete();
        if($request->has('categories') && is_array($request->input('categories'))) {
            foreach($request->input('categories') as $category) {
                PhotoCategoryRelation::create([
                    'photo_id' => $item->id,
                    'category_id' => $category
                ]);
            }
        }
        return redirect($this->redirect_index);
    }

    public function delete(Request $request)
    {
        if (!$request->has('id') || ($item = $this->model->find($request->input('id'))) == null) return back()->withErrors(['sg_error_info' => '找不到要删除的数据']);
        UploadFile::deleteImage($item->path);
        PhotoCategoryRelation::where('photo_id', $item->id)->delete();
        $res = $item->delete();
        if ($res) return back()->withErrors(['sg_error_info' => '删除失败']);
        return redirect($this->redirect_index);
    }
}
