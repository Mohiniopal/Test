<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use DataTables;
use File;
use Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery=Gallery::orderBy('id', 'DESC')->get();
        return view('Admin.gallery.view',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.gallery.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery = new Gallery;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/upload/gallery', $filename);
            $gallery->image = $filename;
        }
        $gallery->save();


        Alert::success('Done', 'You\'ve Successfully Add Gallery');
        return back();
    }

    public function savegallerimage(Request $request){
      
        $gallery = new Gallery;

        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $original_name = $file->getClientOriginalName();
        
            $name = basename($request->file('file')->getClientOriginalName(), '.'.$request->file('file')->getClientOriginalExtension());
            $extention = $file->getClientOriginalExtension();
              $randomNumber = random_int(10, 99);
          $filename = $name.'-'.$randomNumber.'.'.$extention;
            $file->move('public/upload/media_images', $filename);
            $gallery->image = $filename;
        }
        $gallery->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);  
        return view('Admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tag_update(Request $request, $id)
    {
        $gallery = Gallery::where('id', $request->id)->first();
        $gallery->alt_tag = $request->alt_tag;
        $gallery->orderby = $request->orderby;
        $gallery->update();     
        Alert::success('Done', 'You\'ve Successfully Update Gallery');
        return redirect('/gallery/view');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $gallery = Gallery::where('id', $request->id)->first();


        if($request->hasfile('image'))
        {
            $destination = 'public/upload/gallery'.$gallery->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/upload/gallery', $filename);
            $gallery->image = $filename;
        }

  
         $gallery->update();     
         Alert::success('Done', 'You\'ve Successfully Update Gallery');
         return redirect('/admin/gallery/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $gallery=Gallery::find($id);
        $gallery->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Gallery');
        return back();

    }
}