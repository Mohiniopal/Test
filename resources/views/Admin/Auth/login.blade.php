<!DOCTYPE html>
<html lang="en">


<head>
    <title>Yogeshwar Polymers</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    {{-- <link rel="shortcut icon" href="{{url('Admin/assets/img/favicon.png')}}"> --}}
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/vendors.css')}}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/style.css')}}" />

    <style>
       
        .login {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        
        .login img {
            display: block;
            margin: 0 auto 20px;
        }

        .bg-gradient {
            border-radius: 10px 0 0 10px;
        }
        
        .brder{
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-white">
@include('sweetalert::alert')
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login">
                                        <img src="{{url('Admin/assets/img/LOGO_1.png')}}" class="img-fluid  mb-2" width = 50%; alt="logo" />
                                        {{-- <h1>Yogeshwar Polymers</h1> --}}
                                       
                                        <form method="POST" action="{{url('/adminlogin')}}" enctype="multipart/form-data" class="needs-validation" class="mt-3 mt-sm-5">
                                        @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">User Name*</label>
                                                        <input type="text" class="form-control" placeholder="Username" name="email"/>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 mt-3">
                                                <button type="submit" class="btn btn-dark text-white btn-lg btn-block" name="submit" value="Send" >Login
                                                </button>
                                                </div>
                                                <!-- <div class="col-12  mt-3">
                                                    <p>Don't have an account ?<a href="{{url('/register')}}"> Sign Up</a></p>
                                                </div> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2" style="background:#ef2b5d !important;">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                         <img class="img-fluid brder" src="{{url('Admin/assets/img/login_home.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="{{url('Admin/assets/js/vendors.js')}}"></script>

    <!-- custom app -->
    <script src="{{url('Admin/assets/js/app.js')}}"></script>
</body>


</html>