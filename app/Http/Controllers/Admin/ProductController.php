<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Application;

use App\Models\Category;

use App\Models\ApplicationProduct;

use DB;

use DataTables;

use File;

use Alert;

use Illuminate\Support\Str;



class ProductController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $data=Product::all();

        return view('Admin.product.view',["product_arr"=>$data]);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $apps = Application::orderBy('orderby', 'DESC')->get(['id','name']);

        

        return view('Admin.product.add',["apps"=>$apps]);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $data=new Product;

        $data->title=$request->title;

        $data->slug= Str::slug($request->title);

        $data->subtitle=$request->subtitle;

        $data->alt_tag=$request->alt_tag;
        $data->banner_alt=$request->banner_alt;
        $data->category_id = $request->category_id;

        if(isset($request->orderby) && $request->orderby != '' && $request->orderby != null)

        {

            $data->orderby=$request->orderby;

        }else{

            $data->orderby=0;

        }

       

        $data->rubric=$request->rubric;

        $data->desc=$request->desc;

        $data->property=$request->property;

        $data->solubility=$request->solubility;

        $data->specification=$request->specification;

        $data->meta_title=$request->meta_title;

        $data->meta_desc=$request->meta_desc;

        $data->meta_keyword=$request->meta_keyword;



        if($request->hasfile('image'))

        {

            $file = $request->file('image');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/product', $filename);

            $data->image = $filename;

        }

        if($request->hasfile('banner_img'))

        {

            $file = $request->file('banner_img');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'banner.'.$extention;

            $file->move('public/upload/product', $filename);

            $data->banner_img = $filename;

        }

        if($request->hasfile('mobile_banner'))

        {

            $file = $request->file('mobile_banner');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'mobile.'.$extention;

            $file->move('public/upload/product', $filename);

            $data->mobile_banner = $filename;

        }



        $data->save();



        $product_id = $data->id;



        if(isset($request->application_id) && $request->application_id != '' && $request->application_id != null)

        {

            $application_id = $request->application_id;



            foreach($application_id as $app)

            {

                $app_pro = new ApplicationProduct;

                $app_pro->application_id = $app;

                $app_pro->product_id = $product_id;

                $app_pro->save();

            }

        }

        

        Alert::success('Done', 'You\'ve Successfully Add Product');

        return redirect('/product/view');

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

        $apps = Application::orderBy('orderby', 'DESC')->get(['id','name']);

        $application = ApplicationProduct::where('product_id',$id)->pluck('application_id')->toArray();

        $product=Product::find($id);

        return view('Admin.product.edit',compact('product','apps','application'));

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

        $data = Product::where('id', $id)->first();

        $data->title=$request->title;

        $data->slug= $request->slug;

        $data->subtitle=$request->subtitle;

        $data->alt_tag=$request->alt_tag;

        $data->banner_alt=$request->banner_alt;

        $data->category_id = $request->category_id;

        if(isset($request->orderby) && $request->orderby != '' && $request->orderby != null)

        {

            $data->orderby=$request->orderby;

        }else{

            $data->orderby=0;

        }

       

        $data->rubric=$request->rubric;

        $data->desc=$request->desc;

        $data->property=$request->property;

        $data->solubility=$request->solubility;

        $data->specification=$request->specification;

        $data->meta_title=$request->meta_title;

        $data->meta_desc=$request->meta_desc;

        $data->meta_keyword=$request->meta_keyword;



        if($request->hasfile('image'))

        {

            $destination = 'public/upload/product'.$data->image;

            if(File::exists($destination))

            {

                File::delete($destination);

            }

            $file = $request->file('image');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/product', $filename);

            $data->image = $filename;

        }


        if($request->hasfile('banner_img'))

        {

            $destination = 'public/upload/product'.$data->banner_img;

            if(File::exists($destination))

            {

                File::delete($destination);

            }

            $file = $request->file('banner_img');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'banner.'.$extention;

            $file->move('public/upload/product', $filename);

            $data->banner_img = $filename;

        }


        if($request->hasfile('mobile_banner'))

        {

            $destination = 'public/upload/product'.$data->mobile_banner;

            if(File::exists($destination))

            {

                File::delete($destination);

            }

            $file = $request->file('mobile_banner');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(10, 99);

            $filename = time().$randomNumber.'mobile.'.$extention;

            $file->move('public/upload/product', $filename);

            $data->mobile_banner = $filename;

        }


        $data->save();



        if(isset($request->application_id) && $request->application_id != null && $request->application_id != '')

        {

            $exist = ApplicationProduct::where('product_id','=',$id)->delete();



            foreach($request->application_id as $app)

            {

                $app_pro = new ApplicationProduct;

                $app_pro->application_id = $app;

                $app_pro->product_id = $id;

                $app_pro->save();

            }

        }else{

            $exist = ApplicationProduct::where('product_id','=',$id)->delete();

        }



        Alert::success('Done', 'You\'ve Successfully Update Product');

        return redirect('/product/edit/'.$id);

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $exist = ApplicationProduct::where('product_id','=',$id)->delete();

        

        $data=Product::find($id);

        $data->delete();

        Alert::success('Done', 'You\'ve Successfully Delete Product');

        return back();

    }

}

