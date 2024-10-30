<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use DB;
use DataTables;
use File;
use Alert;
use Illuminate\Support\Str;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Application::all();
        return view('Admin.application.view',["application_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.application.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => 'required',
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);

        $data=new Application;
        $data->name=$request->name;
        $data->slug= Str::slug($request->name);
        
        $data->alt_tag=$request->alt_tag;
       
        if(isset($request->orderby) && $request->orderby != '' && $request->orderby != null)
        {
            $data->orderby=$request->orderby;
        }else{
            $data->orderby=0;
        }
       
        
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $randomNumber = random_int(10, 99);
            $filename = time().$randomNumber.'.'.$extention;
            $file->move('public/upload/application', $filename);
            $data->img = $filename;
        }

       

        $data->save();
        
       
        Alert::success('Done', 'You\'ve Successfully Add Application');
        return redirect('/application/view');
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
        $application=Application::find($id);
       return view('Admin.application.edit',compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'name' => 'required',
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);

        $data = Application::where('id', $id)->first();

        $data->name=$request->name;
        $data->slug= $request->slug;
       
        $data->alt_tag=$request->alt_tag;
       
       
        if(isset($request->orderby) && $request->orderby != '' && $request->orderby != null)
        {
            $data->orderby=$request->orderby;
        }else{
            $data->orderby=0;
        }
       
        if($request->hasfile('img'))
        {
            $destination = 'public/upload/application'.$data->img;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $randomNumber = random_int(10, 99);
            $filename = time().$randomNumber.'.'.$extention;
            $file->move('public/upload/application', $filename);
            $data->img = $filename;
        }

       


        $data->update();
        Alert::success('Done', 'You\'ve Successfully Update Application');
        return redirect('/application/edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Application::find($id);
        $data->delete();
        Alert::success('Done', 'You\'ve Successfully Delete Application');
        return back();
    }
}
