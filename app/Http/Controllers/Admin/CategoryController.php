<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Category;

use DB;

use DataTables;

use File;

use Alert;

use Illuminate\Support\Str;



class CategoryController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    { 

    

        $data=Category::all();

        return view('Admin.category.view',["category_arr"=>$data]);



 

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

     

        $result = Category::all()->toArray();

        $my_category_tree = $this->buildTree($result,0);

        return view('Admin.category.add',compact('my_category_tree'));

    }



    public function buildTree(array &$elements, $parentId = 0) {

        $branch = array();

    

        foreach ($elements as $element) {

            if ($element['parent_id'] == $parentId) {

                $children = $this->buildTree($elements, $element['cat_id']);

                if ($children) {

                    $element['children'] = $children;

                }

                $branch[$element['cat_id']] = $element;

                unset($elements[$element['cat_id']]);

            }

        }

        return $branch;

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

            'category_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

            'category_name'=> 'required',

           

          

        ]);





        $category = new Category;







        $category->cat_name = $request->category_name;

        $category->slug= Str::slug($request->category_name);

        $category->parent_id = $request->parent_id ?: '0';

        $category->color = $request->color;
        if(isset($request->cat_order) && $request->cat_order != null && $request->cat_order != '')

        {

            $category->cat_order = $request->cat_order;

        }else{

            $category->cat_order = 0;

        }

        $category->home = $request->home ?: '0';

        $category->subtitle = $request->subtitle;

        $category->alt_tag = $request->alt_tag;

        $category->rubric = $request->rubric;

        // $category->full_desc = $request->full_desc;

        $category->meta_title = $request->meta_title;

        $category->meta_keyword = $request->meta_keyword;

        $category->meta_desc = $request->meta_desc;



        if($request->hasfile('category_image'))

        {

            $file = $request->file('category_image');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(100000, 999999);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/category', $filename);

            $category->cat_img = $filename;

        }



       



        $category->save();

 

        Alert::success('Done', 'You\'ve Successfully Add Category');

        return redirect('/category/view');

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

        $category = Category::find($id);  

        $cate = Category::where('parent_id','=', 0)->get();

        return view('Admin.category.edit',compact('category','cate'));

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

            'category_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

           

            'category_name'=> 'required',



        ]);



        $category = Category::where('cat_id', $request->id)->first();

        $category->cat_name = $request->category_name;

        $category->parent_id = $request->parent_id ?: '0';
        $category->home = $request->home ?: '0';
        $category->color = $request->color;
        if(isset($request->cat_order) && $request->cat_order != null && $request->cat_order != '')

        {

            $category->cat_order = $request->cat_order;

        }else{

            $category->cat_order = 0;

        }

        $category->rubric = $request->rubric;

        // $category->full_desc = $request->full_desc;

        $category->slug= $request->slug;

        $category->subtitle = $request->subtitle;

        $category->alt_tag = $request->alt_tag;

        $category->meta_title = $request->meta_title;

        $category->meta_keyword = $request->meta_keyword;

        $category->meta_desc = $request->meta_desc;

       

           

        if($request->hasfile('category_image'))

        {

            $destination = 'public/upload/category'.$category->cat_img;

            if(File::exists($destination))

            {

                File::delete($destination);

            }

            $file = $request->file('category_image');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(100000, 999999);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/category', $filename);

            $category->cat_img = $filename;

        }



       



         $category->update();    



         Alert::success('Done', 'You\'ve Successfully Update Category');

         return redirect('/category/edit/'.$id);

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $category = Category::where('cat_id','=',$id)->delete();



        Alert::success('Done', 'You\'ve Successfully Delete Category');

        return back();

    }

}

