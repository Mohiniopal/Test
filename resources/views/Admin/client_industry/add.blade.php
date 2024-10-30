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
                  <h1>Industry</h1>
               </div>
               <div class="ml-auto d-flex align-items-center">
                  <a class="btn btn-dark text-white" href="{{ route('clientcategory') }}">Manage Client Industry</a>
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
                        <h5 class="mb-0 py-2">Add Client Industry</h5>
                     </div>
                     <div class="p-3">
                        <form role="form" method="POST" id="categoryForm" enctype="multipart/form-data" action="{{ route('createclientCategory') }}">
                           @csrf
                          
                           <div class="row">
                              
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Industry Name<span style="color:#ff0000">*</span></label>
                                       <input class="form-control" value="{{ old('category_name') }}" name="category_name" placeholder="Enter Category Name" type="text" required>
                                       @error('category_name')
                                       <p class="text-danger"><small>{{ $message }}</small></p>
                                       @enderror
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                       <label>Industry Order</label>
                                       <input class="form-control" name="orderby"  placeholder="Enter Industry Order" value="{{  old('orderby') }}" type="text">
                                 </div>
                              </div>
                              
                           </div>

                           
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="text-left">
                                    <button type="submit" id="submit" class="btn btn-dark text-white my-4">Add</button>
                                    <a href="{{ route('clientcategory') }}"  class="btn btn-danger my-4">Cancel</a>
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