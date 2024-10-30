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



    <link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/bootstrap.min.css')}}" />
       <!--

1 Include jquery File  

-->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ url('Admin/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('Admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('Admin/assets/js/bootstrap.min.js') }}"></script>

<!--

2 Include these two files 

-->
<!--for dropdown-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>-->

<!--finsih-->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<!-- for ckeditor -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<!--

3 Call this single function 

-->

<script>

	$(document).ready(function() 

	{

		$('#table').DataTable();

	} );

</script>

<script>

	$(document).ready(function() 

	{

		$('#table1').DataTable();

	} );

</script>
<style>
    .selected{
        background-color: #3e4095 !important;
    }
    .navbar-brand{
        height: 55px !important;
    }
</style>
</head>



<body>

@include('sweetalert::alert')

    <!-- begin app -->

    <div class="app">

        <!-- begin app-wrap -->

        <div class="app-wrap">

            <!-- begin pre-loader -->

            <!-- <div class="loader">

                <div class="h-100 d-flex justify-content-center">

                    <div class="align-self-center">

                        <img src="{{url('Admin/assets/img/loader/loader.svg')}}" alt="loader">

                    </div>

                </div>

            </div> -->

            <!-- end pre-loader -->

            <!-- begin app-header -->

            <header class="app-header top-bar">

                <!-- begin navbar -->

                <nav class="navbar navbar-expand-md">



                    <!-- begin navbar-header -->

                    <div class="navbar-header d-flex align-items-center">

                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>

                        <a class="navbar-brand" href="{{url('admin/home')}}">

                             <img src="{{url('Admin/assets/img/LOGO_1.png')}}" class="img-fluid logo-desktop" alt="logo" />

                            <img src="{{url('Admin/assets/img/LOGO_1.png')}}" class="img-fluid logo-mobile" alt="logo" /> 
                            
                        </a>
                        {{-- <h4>Yogeshwar Polymers</h4> --}}
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                        <i class="ti ti-align-left"></i>

                    </button>

                    <!-- end navbar-header -->

                    <!-- begin navigation -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <div class="navigation d-flex">

                            <ul class="navbar-nav nav-left">
                                <!-- 
                                <li class="nav-item">

                                    <a href="javascript:void(0)" class="nav-link sidebar-toggle">

                                        <i class="ti ti-align-right"></i>

                                    </a>

                                </li> -->

                              

                                <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">

                                    <a href="javascript:void(0)" class="nav-link expand">

                                        <i class="icon-size-fullscreen"></i>

                                    </a>

                                </li>

                            </ul>

                            <ul class="navbar-nav nav-right ml-auto">

                             

                                <li class="nav-item">

                                    <!-- <a class="nav-link search" href="javascript:void(0)">

                                        <i class="ti ti-search"></i>

                                    </a> -->

                                    <div class="search-wrapper">

                                        <div class="close-btn">

                                            <i class="ti ti-close"></i>

                                        </div>

                                        <div class="search-content">

                                            <form>

                                                <div class="form-group">

                                                    <i class="ti ti-search magnifier"></i>
                                                    <input type="text" class="form-control autocomplete" placeholder="Search Here" id="autocomplete-ajax" autofocus="autofocus">

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </li>

                                <li class="nav-item dropdown user-profile">

                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <img src="{{url('Admin/assets/img/download.png')}}" alt="avtar-img">

                                        <span class="bg-success user-status"></span>

                                    </a>

                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">

                                      

                                        <div class="p-4">

                                           
                                            <a class="dropdown-item d-flex nav-link" href="{{url('/change_password')}}">

                                                <i class=" fa fa-edit pr-2 text-info"></i> Change Password

                                            </a>

                                            <a class="dropdown-item d-flex nav-link" href="{{url('/logout')}}">

                                                <i class=" zmdi zmdi-power pr-2 text-info"></i> Logout

                                            </a>

                                         
                                     

                                        </div>

                                    </div>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <!-- end navigation -->

                </nav>

                <!-- end navbar -->

            </header>

            <!-- end app-header -->

            <!-- begin app-container -->

            <div class="app-container">

                <!-- begin app-nabar -->

                <aside class="app-navbar">

                    <!-- begin sidebar-nav -->

                    <div class="sidebar-nav scrollbar scroll_light">

                        <ul class="metismenu " id="sidebarNav">

                            <!-- <li class="nav-static-title">Personal</li> -->

                            <li class="{{ Request::is('home') ? 'selected' : '' }} active">

                                <a  href="{{url('home')}}" aria-expanded="false">

                                    <i class="nav-icon ti ti-view-grid"></i>

                                    <span class="nav-title">Dashboard</span>

                                    

                                </a>

                               

                            </li>

                            

                            <li class="{{ (Route::currentRouteName() == 'banner' || Route::currentRouteName() == 'addBanner' || Route::currentRouteName() == 'editBanner' || Route::currentRouteName() == 'deleteBanner') ? 'selected' : '' }} active">

                                <a  href="{{ route('banner') }}" aria-expanded="false">

                                <i class="fa fa-picture-o" aria-hidden="true"></i>

                                    <span class="nav-title">Banner</span>   

                                </a>

                            </li>
                            <li class="{{ (Route::currentRouteName() == 'page' || Route::currentRouteName() == 'addPage' || Route::currentRouteName() == 'editPage' || Route::currentRouteName() == 'deletePage') ? 'selected' : '' }} active">

                                <a  href="{{ route('page') }}" aria-expanded="false">

                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                    <span class="nav-title">CMS Pages</span>   

                                </a>

                            </li>
                            <li class="{{ (Route::currentRouteName() == 'product' || Route::currentRouteName() == 'addproduct' || Route::currentRouteName() == 'editproduct' || Route::currentRouteName() == 'deleteproduct' || Route::currentRouteName() == 'productimage') ? 'selected' : '' }} active">

                                <a  href="{{ route('product') }}" aria-expanded="false">

                                <i class="fa fa-product-hunt" aria-hidden="true"></i>

                                    <span class="nav-title">Product</span>   

                                </a>

                            </li>
                            <li class="{{ (Route::currentRouteName() == 'category' || Route::currentRouteName() == 'addCategory' || Route::currentRouteName() == 'editCategory' || Route::currentRouteName() == 'deleteCategory') ? 'selected' : '' }} active">

                                <a  href="{{ route('category') }}" aria-expanded="false">
    
                                <i class="fa fa-th-large" aria-hidden="true"></i>
    
                                    <span class="nav-title">Industry</span>   
    
                                </a>
    
                            </li>
                            <li class="{{ (Route::currentRouteName() == 'application' || Route::currentRouteName() == 'addapplication' || Route::currentRouteName() == 'editapplication' || Route::currentRouteName() == 'deleteapplication') ? 'selected' : '' }} active">

                                <a  href="{{ route('application') }}" aria-expanded="false">

                                <i class="fa fa-check-square" aria-hidden="true"></i>

                                    <span class="nav-title">Application</span>   

                                </a>

                            </li>
                            <li class="{{ Route::currentRouteName() == 'infrastructure' ? 'selected' : '' }} active">

                                <a  href="{{ route('infrastructure') }}" aria-expanded="false">

                                <i class="fa fa-building" aria-hidden="true"></i>
                                    <span class="nav-title">Infrastructure</span>   

                                </a>

                            </li>
                            <li class="{{ (Route::currentRouteName() == 'client' || Route::currentRouteName() == 'addclient' || Route::currentRouteName() == 'editclient' || Route::currentRouteName() == 'deleteclient') ? 'selected' : '' }} active">

                                <a  href="{{ route('client') }}" aria-expanded="false">

                                <i class="fa fa-users" aria-hidden="true"></i>

                                    <span class="nav-title">Clientele</span>   

                                </a>

                            </li>
                            <li class="{{ (Route::currentRouteName() == 'clientcategory' || Route::currentRouteName() == 'addclientCategory' || Route::currentRouteName() == 'editclientCategory' || Route::currentRouteName() == 'deleteclientCategory') ? 'selected' : '' }} active">

                                <a  href="{{ route('clientcategory') }}" aria-expanded="false">

                                <i class="fa fa-industry" aria-hidden="true"></i>

                                    <span class="nav-title">Clientele Industry</span>   

                                </a>

                            </li>
                            
                            <li class="{{ (Route::currentRouteName() == 'certificate' || Route::currentRouteName() == 'addcertificate' || Route::currentRouteName() == 'editcertificate' || Route::currentRouteName() == 'deletecertificate') ? 'selected' : '' }} active">

                                <a  href="{{ route('certificate') }}" aria-expanded="false">

                                <i class="fa fa-certificate" aria-hidden="true"></i>

                                    <span class="nav-title">Certificate</span>   

                                </a>

                            </li>
                            <li class="{{ Route::currentRouteName() == 'gallery' ? 'selected' : '' }} active">

                                <a  href="{{ route('gallery') }}" aria-expanded="false">

                                <i class="ti ti-gallery" aria-hidden="true"></i>
                                    <span class="nav-title">Gallery</span>   

                                </a>

                            </li>
                            
                            
                            
                            
                            
                          
                            <li class="{{ Route::currentRouteName() == 'contactus' ? 'selected' : '' }} active">

                                <a  href="{{ route('contactus') }}" aria-expanded="false">

                                <i class="fa fa-address-book" aria-hidden="true"></i>

                                    <span class="nav-title">Contact</span>   

                                </a>

                            </li>

                            <li class="{{ Route::currentRouteName() == 'career' ? 'selected' : '' }} active">

                                <a  href="{{ route('career') }}" aria-expanded="false">

                                <i class="fa fa-briefcase" aria-hidden="true"></i>

                                    <span class="nav-title">Career</span>   

                                </a>

                            </li>
                                 
                        </ul>

                    </div>

                    <!-- end sidebar-nav -->

                </aside>

                <!-- end app-navbar -->