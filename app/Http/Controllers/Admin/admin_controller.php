<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Page;



use App\Models\role;
use App\Models\User;
use App\Mail\forgot_password;
use Mail;
use Hash;
use Alert;

class admin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Auth.register');
    }

    public function login()
    {
        return view('Admin.Auth.login');
      
    }

    public function profile()
	{  
		$data=admin::where("id","=",session('admin_id'))->first();
		return view('Admin.Auth.profile',["fetch"=>$data]);
	}

    public function update(Request $request, $id)
    {
        $data=admin::where("id","=",session('admin_id'))->first();
        $old_img=$data->profile_img;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
       

        // img upload
		if($request->hasFile('profile_img'))
		{
			$file=$request->file('profile_img'); 
			$file_name=time() . "_profile_img." . $request->file('profile_img')->getClientOriginalExtension();
			$file->move('Admin/upload/admin',$file_name); 	
			$data->profile_img=$file_name; 
            //unlink('upload/admin/'.$old_img);
			
		}

        $data->save();
        Alert::success('Done', 'You\'ve Successfully Update You\'re Profile');
		return redirect('/admin/profile');
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
            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'profile_img'=>'required',
        ]);
        $data=new admin;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        // profile_img upload
		$file=$request->file('profile_img');  
		$file_name=time()."_profile_img.".$request->file('profile_img')->getClientOriginalExtension();
		$file->move('Admin/upload/admin',$file_name); 		
		$data->profile_img=$file_name;

        $res=$data->save();
        return redirect('/admin/login');
    }

    public function adminlogin(Request $request)
    {
        $data=$request->validate([
            
            'email'=>'required|email',
            'password'=>'required',
        ]);
       $data=admin::where("email","=",$request->email)->first();
       if($data)
       {
           if(Hash::check($request->password, $data->password))
           {
                    $request->Session()->put('admin_id',$data->id);
                    $request->Session()->put('email',$data->email);
                    Alert::success('Congrats', 'You\'ve Successfully Login');
                    return redirect('/home');
               
           }
           else
           {
            Alert::error('Fail', 'Login Failed due to Wrong Password');
            return redirect('/login');
           }
       }
       else
       {
        Alert::error('Fail', 'Login Failed due to Wrong email');
        return redirect('/login');
       }
    }

    public function changepasswordcreate()
    {
        return view('Admin.Auth.change_password');
      
    }

    public function changepassword(Request $request)
    {
        $data=$request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        
        ]);
       $data=admin::where("id","=",Session('admin_id'))->first();
       
        if(Hash::check($request->oldpassword, $data->password))
           {
            $data->password=Hash::make($request->newpassword);
            $data->update();
            Alert::success('Done', 'You\'re Password Change Success');
            return back();
           }
           else
           {
            Alert::error('fail', 'Please Enter Correct Old Password');
            return back();
           }
    }

    public function logout()
    {
        Session()->pull('admin_id');
        Session()->pull('email');
       
        return redirect('/login');
    }

    ////////////////forgot password
public function forgetview()
{
    return view('Admin.Mail.forgot_password');
}

public function forgot_password(Request $request)
    {
        $data=$request->validate([            
            'email'=>'required|email',
        ]);
        $email=$request->email;
        $data=admin::where("email","=",$request->email)->first();
        if($data)
        {
            $otpadmin_id=$data->id;
            $request->Session()->put('otpadmin_id',$otpadmin_id);
            $otp=rand(111111,999999);
            $request->Session()->put('forgot_password',$otp);
            $data=['forgot_password'=>Session('forgot_password'),'body'=>"Your OTP for reset your password"];
            Mail::to($email)->send(new forgot_password($data));
            return redirect('/admin/enter_otp');
        }
        else
        {
            Alert::error('fail', 'Email does not match with your registered mail');
            return redirect('/admin/forgot_password');
        }     
    }

    public function enter_otp(Request $request)
    {
        if(Session('forgot_password'))
        {
            return view('Admin.Mail.enter_otp');   
        }
        else
        {
            return redirect('/admin/login');
        }
    }

    public function store_otp(Request $request)
    {
        
            $data=$request->validate([            
            'otp'=>'required|numeric'
            ]);

            $otp=$request->otp;
            $forgot_password=Session('forgot_password');
            if($otp==$forgot_password)
            {
                Session()->pull('forgot_password');
                Session()->put('reset_pass',$otp);
                Alert::success('success', 'OTP match success');
                return redirect('/admin/reset_password');
            }
            else
            {
                Alert::error('fail', 'OTP does not match');
                return redirect('/admin/enter_otp');
            }
    }

    public function reset_password(Request $request)
    {
        if(Session('reset_pass'))
        {
            return view('Admin.Mail.reset_password');
        }
    }

    public function apassword_store(Request $request)
    {
        $data=$request->validate([
            'reset_pass' => 'required|string|min:6',
            'confirm_password' => 'required|same:reset_pass|min:6',
        ]);
        admin::where('id','=',Session('otpadmin_id'))->update(['password'=>Hash::make($request->reset_pass)]);
        Session()->pull('otpadmin_id');
        Session()->pull('reset_pass');
        Alert::success('Done', 'You\'re Password Reset Success');
        return redirect('/admin/login');
    }

    public function dashboard()
    {
 
        $data1=Product::all();
        $data2=Page::all();
        $data5=Contact::all();
        $data6=Category::all();
       
    

        $total_product=count($data1);
        $total_cms=count($data2);
     
        $total_contact=count($data5);
        $total_category=count($data6);
      
    

       return view('Admin.Auth.index',['total_product'=>$total_product,
       'total_cms'=>$total_cms,'total_contact'=>$total_contact,
        'total_category'=>$total_category]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
