<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\certificate;
use Alert;
use Illuminate\Support\Str;
use File;

class certificate_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data=certificate::all();

        return view('Admin.Certificate.view',["client_arr"=>$data]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image'=> 'required',
        ]);


        $certificate = new certificate;

        $certificate->name = $request->name;
        $certificate->alt_tag = $request->alt_tag;
        $certificate->orderby = $request->orderby;

        if($request->hasfile('image'))

        {

            $file = $request->file('image');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/certificate', $filename);

            $certificate->image = $filename;

        }

        if($request->hasfile('pdf'))

        {

            $file = $request->file('pdf');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'_pdf.'.$extention;

            $file->move('public/upload/certificate', $filename);

            $certificate->pdf = $filename;

        }
        
           

        $certificate->save();

    

        Alert::success('Done', 'You\'ve Successfully Add Certificate');

        return redirect('/certificate/view');
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
        $Client = certificate::find($id);  

        return view('Admin.Certificate.edit',compact('Client'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $certificate = certificate::where('id', $request->id)->first();

        $certificate->name = $request->name;
        $certificate->alt_tag = $request->alt_tag;
        $certificate->orderby = $request->orderby;
   
       


         if($request->hasfile('image'))

         {

             $destination = 'public/upload/certificate'.$certificate->image;

             if(File::exists($destination))

             {

                 File::delete($destination);

             }

             $file = $request->file('image');

             $extention = $file->getClientOriginalExtension();

             $randomNumber = random_int(10, 99);

             $filename = time().$randomNumber.'.'.$extention;

             $file->move('public/upload/certificate', $filename);

             $certificate->image = $filename;

          }

          if($request->hasfile('pdf'))

         {

             $destination = 'public/upload/certificate'.$certificate->pdf;

             if(File::exists($destination))

             {

                 File::delete($destination);

             }

             $file = $request->file('pdf');

             $extention = $file->getClientOriginalExtension();

             $randomNumber = random_int(10, 99);

             $filename = time().$randomNumber.'_pdf.'.$extention;

             $file->move('public/upload/certificate', $filename);

             $certificate->pdf = $filename;

          }
          


         $certificate->update();    

         Alert::success('Done', 'You\'ve Successfully Update Certificate');

         return redirect('/certificate/edit/'.$id);
    }

    public function removecertificate_img(Request $request, $id)
    {
        $data=certificate::find($id);
        $old_img=$data->certificate;

        if(file_exists('Admin/upload/certificate/'.$old_img))
            {
                unlink('Admin/upload/certificate/'.$old_img);
                $data->certificate='';
            }
            $data->update();
            return  back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=certificate::find($id);
		
        $data->delete();
		Alert::success('Done', 'You\'ve Successfully Delete Certificate');
        return back();
    }
}
