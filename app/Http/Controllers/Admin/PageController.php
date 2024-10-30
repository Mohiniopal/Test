<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Page;

use DataTables;

use File;

use Alert;

use Illuminate\Support\Str;



class PageController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $data=Page::all();

        return view('Admin.page.view',["page_arr"=>$data]);



    }





    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('Admin.page.add');

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

            'page_name'=> 'required',

            'banner_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



            $page = new Page;

            $page->pg_name = $request->page_name;

            $page->slug= Str::slug($request->page_name);

            $page->shrt_desc = $request->shrt_desc;

            $page->meta_title = $request->meta_title;

            $page->meta_keyword = $request->meta_keyword;

            $page->meta_desc = $request->meta_desc;

            $page->full_desc = $request->full_desc;

            $page->page_footer = $request->page_footer;

            $page->rubric = $request->rubric;

            $page->alt_tag = $request->alt_tag;

            if($request->hasfile('banner_image'))

            {

                $file = $request->file('banner_image');

                $extention = $file->getClientOriginalExtension();

                $filename = time().'.'.$extention;

                $file->move('public/upload/page', $filename);

                $page->banner_image = $filename;

            }

            if($request->hasfile('mobile_banner'))

            {

                $file = $request->file('mobile_banner');

                $extention = $file->getClientOriginalExtension();

                $filename = time().'mobile.'.$extention;

                $file->move('public/upload/page', $filename);

                $page->mobile_banner = $filename;

            }

            $page->save();





        Alert::success('Done', 'You\'ve Successfully Add Page');

        return redirect('/page/view');



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

        $page = Page::find($id);  

        return view('Admin.page.edit',compact('page'));

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

            'page_name'=> 'required',

            'banner_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);







        $page = Page::where('pg_id', $request->id)->first();

        $page->pg_name = $request->page_name;

        $page->slug= $request->slug;

        $page->shrt_desc = $request->shrt_desc;

        $page->full_desc =   $request->full_desc;

        $page->meta_title = $request->meta_title;

        $page->meta_keyword = $request->meta_keyword;

        $page->meta_desc = $request->meta_desc;

        $page->rubric = $request->rubric;

        $page->alt_tag = $request->alt_tag;

        $page->page_footer = $request->page_footer;

        if($request->hasfile('banner_image'))

        {

            $destination = 'public/upload/page'.$page->banner_image;

            if(File::exists($destination))

            {

                File::delete($destination);

            }

            $file = $request->file('banner_image');

            $extention = $file->getClientOriginalExtension();

            $filename = time().'.'.$extention;

            $file->move('public/upload/page', $filename);

            $page->banner_image = $filename;

        }

        if($request->hasfile('mobile_banner'))

        {

            $destination = 'public/upload/page'.$page->mobile_banner;

            if(File::exists($destination))

            {

                File::delete($destination);

            }

            $file = $request->file('mobile_banner');

            $extention = $file->getClientOriginalExtension();

            $filename = time().'mobile.'.$extention;

            $file->move('public/upload/page', $filename);

            $page->mobile_banner = $filename;

        }

      

  

         $page->update();     

         Alert::success('Done', 'You\'ve Successfully Update Page');

         return redirect('/page/edit/'.$id);

         

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $page=Page::find($id);

        $page->delete();

        Alert::success('Done', 'You\'ve Successfully Delete Page');

        return back();





    }





}

