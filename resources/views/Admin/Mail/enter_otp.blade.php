<!DOCTYPE html>
<html lang="en">


<head>
    <title>Mentor - Enter OTP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{url('Admin/assets/img/favicon.ico')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/vendors.css')}}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/style.css')}}" />
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
                                    <div class="login p-50">
                                        <h1 class="mb-2">We Are Mentor</h1>
                                        <p> Enter Your OTP</p>
                                        <form method="POST" action="{{url('/admin/store_otp')}}" enctype="multipart/form-data" class="needs-validation" class="mt-3 mt-sm-5">
                                        @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">OTP*</label>
                                                        <input type="text" class="form-control" placeholder="Enter OTP" name="otp"/>
                                                        @if ($errors->has('otp'))
                                                            <span class="text-danger">{{ $errors->first('otp') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                               
                                                <div class="col-12 mt-3">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Send" >Reset Password
                                                </button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="{{url('Admin/assets/img/bg/login.svg')}}" alt="">
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