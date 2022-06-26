<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
class SectionController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::paginate(20);
        
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.sections.create');
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
            'banner' => 'file|mimes:jpg,png,bmp,jpeg',

        ]);



        if (isset($request->banner)) {
            $extension = "." . $request->banner->getClientOriginalExtension();
            $name = $request->slug;
            $name = $name . $extension;
            $path = $request->banner->storeAs('sections/banners/', $name, 'local');
        }

        $section = Section::create([
            'title' => $request->title,
            'description' => $request->description,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'slug' => $request->slug,
            'banner' =>  isset($path) ?  'uploads/' . $path : null,
            'status' => $request->status,
        ]);
        if ($section) {
            return back()->with('message', 'Section has been added');
        } else {
            return back()->with('error', 'Error Adding Section Titled ');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Section $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'banner' => 'file|mimes:jpg,png,bmp,jpeg',

        ]);



        if (isset($request->banner)) {
            @unlink($section->banner);
            $extension = "." . $request->banner->getClientOriginalExtension();
            $name = $request->slug;
            $name = $name . '_'.time().$extension;
            $path = $request->banner->storeAs('sections/banners/', $name, 'local');
        }
        $update = Section::where("id", $section->id)->update([
            'title'=>$request->title,
            'description' => $request->description,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'slug' => $request->slug,
            'banner' =>  isset($request->banner) ?  'uploads/' . $path : $section->banner,
            'status' => $request->status,
        ]);
if($update){
return back()->with('message', 'Section has been updated success fully') ;
 }
 else{
    return back()->with('error', 'error updating Section') ;
 }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section $section
     * @return \Illuminate\Http\Response
     */

    public function changeStatus(Request $request)
    {
        $res =Section::where('id', $request->record_id)->update(['status' => $request->currentstatus == 1 ? 0 : 1]);
//       $res=true;
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

        //  $res=User::where('id', $request->record_id)->delete();
        // $res2=Profile::where('id', $request->section_id)->delete();
        $res = true;
        $res2 = true;

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
