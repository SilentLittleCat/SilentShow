<?php

namespace App\Http\Controllers\Web;

use App\Photo;
use App\PhotoCategory;
use App\PhotoCategoryRelation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    protected $redirect_index = '/web/photos/index';

    protected $pre_uri = '/web/photos/';

    protected $view_path = 'web.photos.';

    protected $model_name = '图片';

    protected $model;

    public function __construct()
    {
        $this->model = new Photo();
    }

    public function index(Request $request)
    {
        $categories = PhotoCategory::all();

        return view($this->view_path . 'index', compact('categories'));
    }

    public function category(Request $request)
    {
        if(!$request->has('id') || ($category = PhotoCategory::find($request->input('id'))) == null) {
            return back();
        }

        return view($this->view_path . 'category', compact('category'));
    }
}
