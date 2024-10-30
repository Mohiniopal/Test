<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use DB;
use DataTables;
use File;
use Alert;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
    
        $data=Career::all();
        return view('Admin.career.view',["career_arr"=>$data]);

 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('career.add');

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
          
            'position'=> 'required',
          
        ]);


        $career = new Career;



        $career->position = $request->position;
        $career->slug= Str::slug($request->position);
        $career->location= $request->location;
        $career->report_to = $request->report_to;
        $career->short_desc = $request->short_desc;
        $career->job_description = $request->job_description;
        $career->additional_requirements = $request->additional_requirements;
        $career->education = $request->education;

     
        $career->save();
 
        Alert::success('Done', 'You\'ve Successfully Add Career');
        return redirect('/career/view');
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
        $career = Career::find($id);  
        return view('career.edit',compact('career'));
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
         $request->validate([
          
            'position'=> 'required',
          
        ]);

        $career = Career::where('id', $request->id)->first();
        $career->position = $request->position;
        $career->slug= $request->slug;
        $career->location= $request->location;
        $career->report_to = $request->report_to;
        $career->short_desc = $request->short_desc;
        $career->job_description = $request->job_description;
        $career->additional_requirements = $request->additional_requirements;
     $career->education = $request->education;


         $career->update();    

         Alert::success('Done', 'You\'ve Successfully Update Career');
         return redirect('/career/edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = Career::where('id','=',$id)->delete();

        Alert::success('Done', 'You\'ve Successfully Delete Career');
        return back();
    }
}
