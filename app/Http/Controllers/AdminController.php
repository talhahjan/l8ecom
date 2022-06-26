<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
      //$this->middleware('admin');
    }

    public function dashboard()
    {


        return view('admin.dashboard');
    }
    public function setting()
    {
        return view('admin.setting');
    }

    public function viewProfile()
    {
        return view('admin.profile');
    }

    public function getCategories(Request $request)
    {
        $categories = Category::select('id', 'title')
        ->where('section_id', $request->id)
        ->where('parent_id', 0)
        ->get();
        return view('admin.ajax.load-cate', compact('categories'));
    }

  


    public function loadExtras(){
        return view('admin.ajax.extras');
    }
    




    public function deleteImage(Request $request)
    {
        $table = $request->table;
        $id = $request->record_id;
        $columns = ['profiles' => 'avatar', 'categories' => 'banner', 'sections' => 'banner', 'brands' => 'logo', 'thumbnails' => 'path'];
        $models = ['profiles' => 'App\Profile', 'categories' => 'App\Category', 'sections' => 'App\Section', 'brands' => 'App\Brand', 'thumbnails' => 'App\Thumbnail'];
        $column = $columns[$table];
        $model = $models[$table];
        $record = $model::select($column)->where('id', $id)->first();
        $obj = array();
        $obj['msg'] = 'error deleting image';
        $obj['type'] = 'danger';
        if ($table == 'thumbnails') {
            $res = $model::where('id', $id)->delete();
        } else {
            $res = $model::where('id', $id)->update([$column => null]);
        }

        if ($res && @unlink($record[$column])) {
            $obj['msg'] = 'Image deleted successfully';
            $obj['type'] = 'success';
        }
        return $obj;
}
}
