<?php



namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;

use DataTables;

use File;

use Alert;



class BannerController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $data=Banner::all();

        return view('Admin.banner.view',["banner_arr"=>$data]);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('Admin.banner.add');

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

            'desktop_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

            'mobile_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

            'banner_name'=> 'required',

        ]);





        $banner = new Banner;

        $banner->banner_name = $request->banner_name;

        if(isset($request->orderby) || $request->orderby != null || $request->orderby != '')
        {
            $banner->orderby = $request->orderby;
        }else{
            $banner->orderby = 0;
        }
       

        $banner->banner_sub_heading = $request->banner_sub_heading;

        $banner->banner_desc = $request->banner_desc;

       

        $banner->banner_link = $request->banner_link;
    $banner->alt_tag = $request->alt_tag;
        if($request->hasfile('desktop_image'))

        {

            $file = $request->file('desktop_image');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(100000, 999999);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/banner', $filename);

            $banner->desktop_image = $filename;

        }

        if($request->hasfile('mobile_image'))

        {

            $file = $request->file('mobile_image');

            $extention = $file->getClientOriginalExtension();
            $randomNumber = random_int(100000, 999999);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/banner', $filename);

            $banner->mobile_image = $filename;

        }

        $banner->save();

    

        Alert::success('Done', 'You\'ve Successfully Add Banner');

        return redirect('/banner/view');

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

        $banner = Banner::find($id);  

        return view('Admin.banner.edit',compact('banner'));

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

            'desktop_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

            'mobile_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

            'banner_name'=> 'required',

        ]);



        $banner = Banner::where('banner_id', $request->id)->first();

        $banner->banner_name = $request->banner_name;

        if(isset($request->orderby) || $request->orderby != null || $request->orderby != '')
        {
            $banner->orderby = $request->orderby;
        }else{
            $banner->orderby = 0;
        }

        $banner->banner_sub_heading = $request->banner_sub_heading;

        $banner->banner_desc = $request->banner_desc;

        

        $banner->banner_link = $request->banner_link;

        $banner->alt_tag = $request->alt_tag;



           

        if($request->hasfile('desktop_image'))

        {

            $destination = 'public/upload/banner'.$banner->desktop_image;

            if(File::exists($destination))

            {

                File::delete($destination);

            }

            $file = $request->file('desktop_image');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(100000, 999999);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/banner', $filename);

            $banner->desktop_image = $filename;

         }



         if($request->hasfile('mobile_image'))

         {

             $destination = 'public/upload/banner'.$banner->mobile_image;

             if(File::exists($destination))

             {

                 File::delete($destination);

             }

             $file = $request->file('mobile_image');

             $extention = $file->getClientOriginalExtension();

             $randomNumber = random_int(100000, 999999);

             $filename = time().$randomNumber.'.'.$extention;

             $file->move('public/upload/banner', $filename);

             $banner->mobile_image = $filename;

          }



         $banner->update();    

         Alert::success('Done', 'You\'ve Successfully Update Banner');

         return redirect('/banner/edit/'.$id);

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $banner = Banner::where('banner_id','=',$id)->delete();

        Alert::success('Done', 'You\'ve Successfully Delete Banner');

        return back();

    }

}

