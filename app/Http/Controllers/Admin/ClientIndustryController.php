<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientIndustry;
use DB;
use DataTables;
use File;
use Alert;
use Illuminate\Support\Str;

class ClientIndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=ClientIndustry::all();

        return view('Admin.client_industry.view',["category_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.client_industry.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new ClientIndustry;

        $category->category_name = $request->category_name;

        $category->slug= Str::slug($request->category_name);

        

        if(isset($request->orderby) && $request->orderby != null && $request->orderby != '')

        {

            $category->orderby = $request->orderby;

        }else{

            $category->orderby = 0;

        }

       
        $category->save();

 

        Alert::success('Done', 'You\'ve Successfully Add Client Industry');

        return redirect('/client/category/view');
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
        $category = ClientIndustry::find($id);  
        return view('Admin.client_industry.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = ClientIndustry::where('id', $request->id)->first();
        $category->category_name = $request->category_name;
        $category->slug = $request->slug;
        if(isset($request->orderby) && $request->orderby != null && $request->orderby != '')

        {

            $category->orderby = $request->orderby;

        }else{

            $category->orderby = 0;

        }

        $category->update();    



         Alert::success('Done', 'You\'ve Successfully Update Client Industry');

         return redirect('/client/category/edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ClientIndustry::where('id','=',$id)->delete();

        Alert::success('Done', 'You\'ve Successfully Delete Client Industry');

        return back();
    }
}
