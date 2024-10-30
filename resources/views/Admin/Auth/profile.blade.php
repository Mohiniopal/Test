@extends('Admin.Layout.main_layout') 	
@section('title','Profile')
@section('main_container')
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>Profile</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                Profile
                                                </li>
                                               
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->

                       <!--mail-Compose-contant-start-->
                       <div class="row account-contant">
                            <div class="col-8" style="padding-left:250px;">
                                <div class="card card-statistics">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters" style="padding-left:50px;">
                                            <div class="col-xl-10 pb-xl-0 pb-5 ">
                                                <div class="page-account-profil pt-5">
                                                    <div class="profile-img text-center rounded-circle">
                                                        <div class="pt-5">
                                                        <form action="{{url('/admin/profile/'.$fetch->id )}}" method="post" enctype="multipart/form-data">
															@csrf
                                                            <div class="bg-img m-auto">
                                                                <img src="{{asset('Admin/upload/admin/'.$fetch->profile_img)}}" class="img-fluid" alt="users-avatar" name="profile_img">
                                                            </div>
                                                            <h4 class="mb-1">Profile Img</h4>
                                                            <input type="file" class="form-control"  name="profile_img" value="{{asset('Admin/upload/admin/'.$fetch->profile_img)}}">
                                                            <div class="profile pt-4">
                                                            <h4 class="mb-1"><input type="text"  class="form-control" name="first_name" value="<?php echo $fetch->first_name;?>"></h4>
                                                                <h4 class="mb-1"><input type="text"  class="form-control" name="last_name" value="<?php echo $fetch->last_name;?>"></h4> 
                                                                
                                                                <p><input type="text"  class="form-control" name="email" value="<?php echo $fetch->email;?>"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                   
                                                    <br><br>
                                                    <div class="profile-btn text-center">
                                                        <div><button name="submit" class="btn btn-primary" value="Send">Update</button></div><br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mail-Compose-contant-end-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
           @endsection