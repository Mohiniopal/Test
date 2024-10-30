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
                  <h1>Image</h1>
               </div>
               <div class="ml-auto d-flex align-items-center">
                  <a class="btn btn-dark text-white" href="{{ route('image') }}">Manage Image</a>
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
                  <!-- <div class="row no-gutters"> -->
                  <div class="page-account-form">
                     <div class="form-titel border-bottom p-3">
                        <h5 class="mb-0 py-2">Add Image</h5>
                     </div>
                     <div class="p-3">
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('createimage') }}">
                           @csrf
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Title<span style="color:#ff0000">*</span></label>
                                    <input class="form-control" value="{{ old('title') }}" name="title" placeholder="Enter Title" type="text" required>
                                    @error('title')
                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                   <label>Alt Tag<span style="color:#ff0000">*</span></label>
                                   <input class="form-control" value="{{ old('alt_tag') }}" name="alt_tag" placeholder="Enter Alt Tag" type="text" >
                                   @error('alt_tag')
                                   <p class="text-danger"><small>{{ $message }}</small></p>
                                   @enderror
                                </div>
                             </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control"   name="image" type="file">
                                    @error('image')
                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                          
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="text-left">
                                    <button type="submit" id="submit" class="btn btn-dark text-white my-4">Add</button>
                                    <a href="{{ route('image') }}"  class="btn btn-danger my-4">Cancel</a>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- </div> -->
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