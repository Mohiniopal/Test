<?php







namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;



use Illuminate\Http\Request;


use App\Models\ClientIndustry;
use App\Models\Client;



use DataTables;



use File;



use Alert;







class ClientController extends Controller



{



    /**



     * Display a listing of the resource.



     *



     * @return \Illuminate\Http\Response



     */



    public function index(Request $request)



    {



        $data=Client::all();



        return view('Admin.client.view',["client_arr"=>$data]);



    }







    /**



     * Show the form for creating a new resource.



     *



     * @return \Illuminate\Http\Response



     */



    public function create()



    {


        $Category = ClientIndustry::get(['id','category_name']);
        return view('Admin.client.add',compact('Category'));



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



            'client_logo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',





            'client_logo'=> 'required',

          



        ]);











        $certificate = new Client;



        $certificate->client_title = $request->client_title;

        $certificate->alt_tag = $request->alt_tag;

        $certificate->orderby = isset($request->orderby) ? $request->orderby : 0;

        $certificate->home = isset($request->home) ? $request->home : 0;

        $certificate->category_id = $request->category_id;

        if(isset($request->export_client) && $request->export_client != null && $request->export_client != '')

        {

            $certificate->export_client = $request->export_client;

        }else{

            $certificate->export_client = 0;

        }

        if($request->hasfile('client_logo'))



        {



            $file = $request->file('client_logo');



            $extention = $file->getClientOriginalExtension();



            $randomNumber = random_int(10, 99);



            $filename = time().$randomNumber.'.'.$extention;



            $file->move('public/upload/client', $filename);



            $certificate->client_logo = $filename;



        }

        

           



        $certificate->save();



    



        Alert::success('Done', 'You\'ve Successfully Add Client');



        return redirect('/client/view');



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



        $Client = Client::find($id);  

        $Category = ClientIndustry::get(['id','category_name']);

        return view('Admin.client.edit',compact('Client','Category'));



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



            'client_logo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',





            'client_title'=> 'required',

        



        ]);









        $certificate = Client::where('client_id', $request->id)->first();

        $certificate->home = isset($request->home) ? $request->home : 0;

       $certificate->client_title = $request->client_title;

       $certificate->alt_tag = $request->alt_tag;

       $certificate->orderby = $request->orderby;

       
       $certificate->category_id = $request->category_id;


        if(isset($request->export_client) && $request->export_client != null && $request->export_client != '')

        {

            $certificate->export_client = $request->export_client;

        }else{

            $certificate->export_client = 0;

        }

         if($request->hasfile('client_logo'))



         {



             $destination = 'public/upload/client'.$certificate->client_logo;



             if(File::exists($destination))



             {



                 File::delete($destination);



             }



             $file = $request->file('client_logo');



             $extention = $file->getClientOriginalExtension();



             $randomNumber = random_int(10, 99);



             $filename = time().$randomNumber.'.'.$extention;



             $file->move('public/upload/client', $filename);



             $certificate->client_logo = $filename;



          }

          





         $certificate->update();    



         Alert::success('Done', 'You\'ve Successfully Update Client');



         return redirect('/client/edit/'.$id);



    }







    /**



     * Remove the specified resource from storage.



     *



     * @param  int  $id



     * @return \Illuminate\Http\Response



     */



    public function destroy($id)



    {



        $certificate = Client::where('client_id','=',$id)->delete();



        Alert::success('Done', 'You\'ve Successfully Delete Client');



        return back();



    }



}



