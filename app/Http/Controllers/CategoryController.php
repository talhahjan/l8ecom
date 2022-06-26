<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::orderBy('section_id')->with('section')->paginate(10);

         return view('admin.category.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections=Section::get();
     
        return view('admin.category.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'file|mimes:jpg,png,bmp,jpeg',
            'discount' => 'numeric',
             'section_id' => 'required|numeric',
        ]);

       

        if (isset($request->banner)) {
            $extension = "." . $request->banner->getClientOriginalExtension();
            $name = $request->slug.'_'.$extension;
            $path = $request->banner->storeAs('categories/banners/', $name, 'local');
        }


        $find=Section::find($request->section_id);
        $slug=Str::slug($find->title." ".$request->title);

        $category = Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'discount' => $request->discount,
            'title' => $request->title,
            'slug' => $slug,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'banner' =>  isset($path) ?  'uploads/' . $path : null,
            'section_id'=>$request->section_id,
            ]);


        if ($category)
            return back()->with('message', 'category added successfully');
        else
            return back()->with('error', 'error adding categoy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $sections=Section::get();    
        return view('admin.category.edit', compact('category','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,'.$category->id,
            'image' => 'file|mimes:jpg,png,bmp,jpeg',
            'discount' => 'numeric',
            'section_id' => 'numeric',

        ]);

            
        $find=Section::find($request->section_id);
        $slug=Str::slug($find->title." ".$request->slug);

        if (isset($request->banner)) {
            @unlink($category->banner);
            $extension = "." . $request->banner->getClientOriginalExtension();
            $name = $slug.'_'.$extension;
            $newName = $name . $extension;
            $path = $request->banner->storeAs('category/banners/', $newName, 'local');
        }

        $updateCategory = Category::where("id", $category->id)->update([
            'title' => $request->title,
            'slug' => $slug,
            'status' => $request->status,
            'description' => $request->description,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_title' => $request->meta_title,
            'banner' => isset($request->banner) ? 'uploads/' . $path : $category->banner,
        ]);

         if ($updateCategory) {
            return redirect()->route('admin.category.edit', $slug)->with('message', 'category has been successfully edited')->withInput();
        } else {
            return redirect()->route('admin.category.edit', $slug)->with('error', 'Errorupdating category')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $res = Category::where('id', $request->record_id)->update(['status' => $request->currentstatus == 1 ? 0 : 1]);
        $obj = array();
        $obj['msg'] = 'Error Updating Record';
        $obj['type'] = 'danger';

        if ($res) {

            $obj['msg'] = 'Record has been Updated successfully';
            $obj['type'] = 'success';
        }

        return $obj;
    }

    public function destroy(Request $request)
    {

       $res=category::where('id', $request->record_id)->delete();

        $obj = array();
        $obj['msg'] = 'Error deleting Record';
        $obj['type'] = 'danger';

        if ($res) {
            $obj['msg'] = 'Record has been deleted successfully';
            $obj['type'] = 'success';
        }
        return $obj;
    }


    public function collection(Category $collection){
        $brands = Brand::select('id', 'title')->get();
        $categories = Section::select('id','title')->get();
        $sizes=config('services.sizes');
        $colors=config('services.colors');
        
return view('user.products.all', compact('collection', 'brands','sizes','colors','categories'));
    }
}