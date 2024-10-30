<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use DB;
use DataTables;
use File;
use Alert;
class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $gallery=ProductImage::where('product_id',$id)->orderBy('id', 'DESC')->get();
        $product_id = $id;
        return view('Admin.productimage.view',compact('gallery','product_id'));
    }

    public function savegallerimage(Request $request,$id){
      
        $gallery = new ProductImage;
        $gallery->product_id = $id;
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

    public function tag_update(Request $request, $id)
    {
        $gallery = ProductImage::where('id', $request->id)->first();
        $product_id = $gallery->product_id;
        $gallery->alt_tag = $request->alt_tag;
        $gallery->orderby = $request->orderby;
        $gallery->update();     
        Alert::success('Done', 'You\'ve Successfully Update ProductImage');
        return redirect('/productimage/view/'.$product_id);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery=ProductImage::find($id);
        $gallery->delete();
        Alert::success('Done', 'You\'ve Successfully Delete ProductImage');
        return back();
    }
}
