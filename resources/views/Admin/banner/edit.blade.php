@extends('Admin.Layout.main_layout') 	

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

                  <h1>Banner</h1>

               </div>

               <div class="ml-auto d-flex align-items-center">

                  <a class="btn btn-dark text-white" href="{{ route('banner') }}">Manage Banner</a>

               </div>

            </div>

            <!-- end page title -->

         </div>

      </div>

      <!-- end row -->

      <!--mail-Compose-contant-start-->

      <div class="row account-contant">

         <div class="col-12">

            <div class="card card-statistics">

               <div class="card-body p-0">

                  <div class="page-account-form">

                     <div class="form-titel border-bottom p-3">

                        <h5 class="mb-0 py-2">Update Banner</h5>

                     </div>

                     <div class="p-3">

                        <form role="form" method="POST" id="Bannereditform" enctype="multipart/form-data" action="{{ route('updateBanner', $banner->banner_id) }}">

                           @csrf

                           <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="form-group">

                                <label>Banner Name<span style="color:#ff0000">*</span></label>

                                <input class="form-control" name="banner_name"  placeholder="Enter Banner Name" value="{{  $banner->banner_name }}" type="text" required>

                                @error('banner_name')

                                <p class="text-danger"><small>{{ $message }}</small></p>

                                @enderror

                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                              <div class="form-group">

                              <label>Alt Tag</label>

                              <input class="form-control" value="{{ $banner->alt_tag }}" name="alt_tag" placeholder="Enter Alt Tag" type="text">

                              </div>

                          </div>
                            

                        </div>

                        <div class="row">

                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                              <div class="form-group">

                              <label>Order By</label>

                              <input class="form-control" value="{{ $banner->orderby }}" name="orderby" placeholder="Enter Order By" type="number">

                              </div>

                          </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="form-group">

                                <label>Banner Link</label>

                                <input class="form-control" value="{{ $banner->banner_link }}" name="banner_link" placeholder="Enter Banner link" type="text">

                                </div>

                            </div>

                        </div>
                       
                        <div class="row">

                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                              <div class="form-group">

                              <label>Desktop Image</label>

                              <input class="form-control" name="desktop_image" type="file"><br>

                              @if($banner->desktop_image)

                              <img src="{{ URL('public/upload/banner') }}/{{ $banner->desktop_image }}" alt="" height="100px" width="100px">

                              @endif

                              @error('desktop_image')

                              <p class="text-danger"><small>{{ $message }}</small></p>

                              @enderror

                              </div>

                          </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="form-group">

                                <label>Mobile Image</label>

                                <input class="form-control" name="mobile_image" type="file"><br>

                                @if($banner->mobile_image)

                                <img src="{{ URL('public/upload/banner') }}/{{ $banner->mobile_image }}" alt="" height="100px" width="100px">

                                @endif

                                @error('mobile_image')

                                <p class="text-danger"><small>{{ $message }}</small></p>

                                @enderror

                                </div>

                            </div>

                        </div>

                          

                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                              <div class="form-group">

                              <label>Banner Heading</label>

                              <div class="quill-editor">

                                 <div id="banner_edit_desc" class="banner_edit_desc"><?php echo $banner->banner_desc; ?></div>

                              </div>

                              <input type="hidden" class="form-control" id="banner_edit_des" name="banner_desc" >
                              
                              </div>

                          </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                <div class="form-group">

                                <label>Banner Sub Heading</label>

                                <div class="quill-editor">

                                    <div id="banner_edit_sub_heading" class="banner_edit_sub_heading"><?php echo $banner->banner_sub_heading; ?> </div>

                                 </div>

                                 <input type="hidden" class="form-control" id="banner_edit_sub_head"  name="banner_sub_heading" >
                               
                                </div>

                            </div>

                        </div>

                           <div class="row">

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                 <div class="text-left">

                                    <button type="submit" id="submit" class="btn btn-dark text-white my-4">Update</button>

                                    <a href="{{ route('banner') }}" class="btn btn-danger my-4">Cancel</a>

                                 </div>

                              </div>

                           </div>

                        </form>

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


@endsection
