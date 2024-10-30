<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Client;
use App\Models\certificate;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Category;
use App\Models\Product;
use App\Models\ApplicationProduct;
use App\Models\ProductImage;
use App\Models\Contact;
use App\Models\Career;
use App\Models\ClientIndustry;
use App\Models\Infrastructure;
use Mail;
class ApiController extends Controller
{
    public function banner()
    {
        $data = Banner::select(['banner_id','banner_name','mobile_image','banner_link','orderby','desktop_image','banner_sub_heading','banner_desc','alt_tag'])
        ->orderBy('orderby', 'ASC')->get(); 
        return response()->json([
            'code' => 200,
            'success' => True,
            'banner' => $data,
        ]);
    }

    public function client()
    {
        $data = Client::where('export_client','0')->orderBy('orderby', 'ASC')->get(); 
        return response()->json([
            'code' => 200,
            'success' => True,
            'client' => $data,
        ]);
    }

    

    public function client_detail($slug)
    {
        $cate = ClientIndustry::where('slug',$slug)->first();
        $cat_id = $cate->id;
        $cat_name = $cate->category_name;
        
        $data = Client::where('export_client','0')->where('category_id',$cat_id)->orderBy('orderby', 'ASC')->get(); 
      
        return response()->json([
            'code' => 200,
            'success' => True,
            'industry' => $cat_name,
            'client' => $data,
        ]);
    }

    public function client_detail2()
    {
        $data = ClientIndustry::orderBy('orderby', 'ASC')->get(['id','category_name','slug']); 
        
        foreach($data as $d)
        {
            $Client = Client::where('export_client','0')->where('category_id',$d->id)->orderBy('orderby', 'ASC')->get(); 
            $d->client = $Client; 
        }
      
        return response()->json([
            'code' => 200,
            'success' => True,
            'client' => $data,
        ]);
    }

    public function home_client()
    {
        $data = Client::where('home','1')->orderBy('orderby', 'ASC')->limit(8)->get(); 
        return response()->json([
            'code' => 200,
            'success' => True,
            'client' => $data,
        ]);
    }

    public function export_client()
    {
        $Client = Client::where('export_client','1')->orderBy('orderby', 'ASC')->get();  

        return response()->json([
            'code' => 200,
            'success' => True,
            'client' => $Client,
        ]);
    }

    // public function client_detail2()
    // {
    //     $data = Client::groupby('category_id')->get(['category_id']); 

    //     foreach($data as $d)
    //     {
    //         // $cate = Category::where('cat_id',$d->category_id)->first('cat_name');
    //         // $d->industry = $cate->cat_name;
    //         if($d->category_id == 'food-consumable-sector')
    //         {
    //             $d->category_name = 'Food & Consumable Sector';
    //         }elseif($d->category_id == 'paper-manufacturing-industries')
    //         {
    //             $d->category_name = 'Paper Manufacturing Industries';
    //         }elseif($d->category_id == 'icecream-industries')
    //         {
    //             $d->category_name = 'Icecream Industries';
    //         }elseif($d->category_id == 'pharmacueticals-sector')
    //         {
    //             $d->category_name = 'Pharmacueticals Sector';
    //         }elseif($d->category_id == 'soap-manufacturing-sector')
    //         {
    //             $d->category_name = 'Soap Manufacturing Sector';
    //         }elseif($d->category_id == 'tyre-industries')
    //         {
    //             $d->category_name = 'Tyre Industries';
    //         }elseif($d->category_id == 'kraft-prper')
    //         {
    //             $d->category_name = 'Kraft Prper';
    //         }else{}


    //         $Client = Client::where('category_id',$d->category_id)->orderBy('orderby', 'ASC')->get();
    //         $d->client = $Client;
    //     }

    //     return response()->json([
    //         'code' => 200,
    //         'success' => True,
    //         'client' => $data,
    //     ]);
    // }

    public function certificate()
    {
        $data = certificate::orderBy('orderby', 'ASC')->get(); 
        return response()->json([
            'code' => 200,
            'success' => True,
            'certificate' => $data,
        ]);
    }

    public function gallery()
    {
        $data = Gallery::orderBy('orderby', 'ASC')->get();
        return response()->json([
            'code' => 200,
            'success' => True,
            'gallery' => $data,
        ]);
    }

    public function infrastructure()
    {
        $data = Infrastructure::orderBy('orderby', 'ASC')->get();
        return response()->json([
            'code' => 200,
            'success' => True,
            'infrastructure' => $data,
        ]);
    }

    public function cms()
    {
        $data = Page::get(['pg_id','pg_name','slug','meta_title']);
        return response()->json([
            'code' => 200,
            'success' => True,
            'cms' => $data,
        ]);
    }

    public function cms_detail($slug)
    {
        $data = Page::where('slug',$slug)->first();
        return response()->json([
            'code' => 200,
            'success' => True,
            'cms' => $data,
        ]);
    }

    public function industry()
    {
        $data = Category::orderBy('cat_order', 'ASC')->get(); 
        return response()->json([
            'code' => 200,
            'success' => True,
            'industry' => $data,
        ]);
    }

    public function home_industry()
    {
        $data = Category::where('home','1')->orderBy('cat_order', 'ASC')->limit(8)->get(); 
        return response()->json([
            'code' => 200,
            'success' => True,
            'industry' => $data,
        ]);
    }

    public function product()
    {
        $data = Product::orderBy('orderby', 'ASC')->get(['id','title','slug','image','alt_tag','banner_img','banner_alt','meta_title']);
        return response()->json([
            'code' => 200,
            'success' => True,
            'product' => $data,
        ]);
    }

    public function product_detail($slug)
    {
        $data = Product::leftjoin('category','category.cat_id','=','products.category_id')->where('products.slug',$slug)->first(['category.cat_name','products.*']);

        $product_id = $data->id;
        $application = ApplicationProduct::leftjoin('applications','applications.id','=','application_product.application_id')
                                         ->where('product_id',$product_id)
                                         ->get(['applications.name','applications.slug']);

        $data->applications = $application;

        $images = ProductImage::where('product_id',$product_id)->orderBy('orderby', 'ASC')->get(['image','alt_tag','orderby']);

        $data->productImage = $images;

        return response()->json([
            'code' => 200,
            'success' => True,
            'product' => $data,
        ]); 
    }

    public function contact(Request $request)

    {

         $data = array(

            "full_name" => $request->full_name,
            "email"  => $request->email,
            "address"  => $request->address,
            "phone_number"  => $request->phone_number,
            "message_text" => $request->message

            );

        $email = $data['email'];

        Mail::send('Admin.contact.contactmail',$data,function($message) use($data)  {
        $message->to('opal911@opal.in')->subject('New Contact Form  submitted from Website');
            $message->from('opal966@opal.in','Yogeshwar Polymers');

        });



        $contact = Contact::create([

            'full_name' =>  ($request->full_name) ? $request->full_name : '',

            'email' => ($request->email) ? $request->email : '' ,

            'phone_number' => ($request->phone_number) ? $request->phone_number : '',
            
            'address' => ($request->address) ? $request->address : '' ,

            'message' => ($request->message) ? $request->message : '',

        ]);



        return response()->json([

            'success' => true,

            'message' => 'Your form has been submited successfully',

        ]);

    }

    public function inquiry(Request $request)

    {

         $data = array(

            "full_name" => $request->full_name,
            "email"  => $request->email,
            "phone_number"  => $request->phone_number,
            "message_text" => $request->message,
            "products"=> $request->products
            );

        $email = $data['email'];

        Mail::send('Admin.contact.contactmail',$data,function($message) use($data)  {
        $message->to('opal911@opal.in')->subject('New Inquiry Form  submitted from Website');
            $message->from('opal966@opal.in','Yogeshwar Polymers');

        });



        $contact = Contact::create([

            'full_name' =>  ($request->full_name) ? $request->full_name : '',

            'email' => ($request->email) ? $request->email : '' ,

            'phone_number' => ($request->phone_number) ? $request->phone_number : '',
            
            'message' => ($request->message) ? $request->message : '',

            'products' => ($request->products) ? $request->products : '',

        ]);



        return response()->json([

            'success' => true,

            'message' => 'Your form has been submited successfully',

        ]);

    }

    public function career(Request $request)

    {

        $Career = new Career;

        $Career->full_name = $request->full_name;

        $Career->email = $request->email;

        $Career->phone_number = $request->phone_number;

        $Career->qualification = $request->qualification;

        $Career->job_experience = $request->job_experience;

        if($request->hasfile('document'))

        {

            $file = $request->file('document');

            $extention = $file->getClientOriginalExtension();

            $randomNumber = random_int(100000, 999999);

            $filename = time().$randomNumber.'.'.$extention;

            $file->move('public/upload/career', $filename);

            $Career->document = $filename;

        }

       

        $Career->save();



        return response()->json([

            'success' => true,

            'message' => 'Your form has been submited successfully',

        ]);

    }

    // public function contact(Request $request)
    // {
       
    //     $validatedData = $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone_number' => 'nullable|string|max:20',
         
    //     ]);

       
    //     $data = $validatedData;

       
    //     Mail::send('Admin.contact.contactmail', $data, function ($message) use ($data) {
    //         $message->to('opal911@opal.in')->subject('New Contact Form submitted from Website');
    //         $message->from('opal966@opal.in', 'Yogeshwar Polymers');
    //     });

       
    //     Contact::create([
    //         'full_name' => $data['full_name'],
    //         'email' => $data['email'],
    //         'phone_number' => $data['phone_number'] ?? '',
    //         'address' => $data['address'] ?? '',
    //         'message' => $data['message'],
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Your form has been submitted successfully',
    //     ]);
    // }

}
