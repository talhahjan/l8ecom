<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate('10');
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'title' => 'required|max:255|min:2',
            'logo' => 'file|mimes:jpg,png,bmp,jpeg',
        ]);

        if (isset($request->logo)) {
            $extension = "." . $request->logo->getClientOriginalExtension();
            $name = Str::Slug($request->title);
            $name = $name . time() . $extension;
            $path = $request->logo->storeAs('brands/logoes/', $name, 'local');
        }

        $brand = Brand::create([
            'title' => $request->title,
            'logo' =>  isset($path) ?  'uploads/brands/logoes/' . $path : null,
        ]);

        if ($brand) {
            return back()->with('message', 'brand has been added succeesfully');
        } else {
            return back()->with('error', 'error adding brand');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'logo' => 'file|mimes:jpg,png,bmp,jpeg',
        ]);


        if (isset($request->logo)) {
            @unlink($brand->logo);
            $extension = "." . $request->logo->getClientOriginalExtension();
            $name = Str::Slug($request->title) . time();
            $newName = $name . $extension;
            $path = $request->logo->storeAs('brands/logoes/', $newName, 'local');
        }

        $updateBrand = Brand::where("id", $brand->id)->update([
            'title' => $request->title,
            'logo' => isset($request->logo) ? 'uploads/' . $path : $brand->logo,
        ]);
        if ($updateBrand) {
            return back()->with('message', 'Brand updated successfully');
        } else {
            return back() - with('error', 'Error while Updating Brand');
        }
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {

        //$res = Brand::where('id', $request->record_id)->delete();

        $res = true;

        $obj = array();
        $obj['msg'] = 'Error deleting Record';
        $obj['type'] = 'danger';

        if ($res) {
            $obj['msg'] = 'Record has been deleted successfully';
            $obj['type'] = 'success';
        }
        return $obj;
    }
}
