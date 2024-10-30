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
                  <h1>Application</h1>
               </div>
               <div class="ml-auto d-flex align-items-center">
                  <a class="btn btn-dark text-white" href="{{ route('application') }}">Manage Application</a>
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
                        <h5 class="mb-0 py-2">Add Application</h5>
                     </div>
                  <div class="p-3">
                     <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('createapplication') }}">
                        @csrf

                           <div class="row">

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Application Name<span style="color:#ff0000">*</span></label>
                                    <input class="form-control" value="{{ old('name') }}"  placeholder="Enter Application Name" name="name" type="text" required>
                                       @error('name')
                                          <p class="text-danger"><small>{{ $message }}</small></p>
                                       @enderror
                                 </div>
                              </div>

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                      <label>Application Order</label>
                                      <input class="form-control" name="orderby"  placeholder="Enter Application Order" value="{{  old('orderby') }}" type="number" min="0" value="0">
                                </div>
                             </div>

                           </div>

                           <div class="row">
                            
                             <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                   <label>Alt Tag</label>
                                   <input class="form-control" placeholder="Enter Alt Tag"  name="alt_tag" value="{{old('alt_tag')}}"type="text">
                                </div>
                             </div>
                             
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                   <label>Image</label>
                                   <input class="form-control"   name="img" type="file">
                                      @error('img')
                                      <p class="text-danger"><small>{{ $message }}</small></p>
                                      @enderror
                                </div>
                             </div>


                              
                              
                           </div>
                           
                            

                          

                        <div class="row">

                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="text-left">
                                 <button type="submit" id="submit" class="btn btn-dark text-white my-4">Add</button>
                                 <a href="{{ route('application') }}"  class="btn btn-danger my-4">Cancel</a>
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