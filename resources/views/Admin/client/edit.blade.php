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

                  <h1>Clientele</h1>

               </div>

               <div class="ml-auto d-flex align-items-center">

                  <a class="btn btn-dark text-white" href="{{ route('client') }}">Manage Clientele</a>

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

                        <h5 class="mb-0 py-2">Update Clientele</h5>

                     </div>

                     <div class="p-3">

                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('updateclient', $Client->client_id) }}">

                           @csrf

                           <div class="row">

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                 <div class="form-group">

                                    <label>Client Title<span style="color:#ff0000">*</span></label>

                                    <input class="form-control" value="{{ $Client->client_title }}" name="client_title" placeholder="Enter Client Title" type="text" required>

                                    @error('client_title')

                                    <p class="text-danger"><small>{{ $message }}</small></p>

                                    @enderror

                                 </div>

                              </div>

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Industry</label>
                                        <select name="category_id" class="form-control  selectpicker " data-show-subtext="true" data-live-search="true">
                                            <option value="">Please Select</option>
                                            @foreach($Category as $ct)
                                            <option value="{{$ct->id}}" {{ ($ct->id == $Client->category_id) ? 'selected' : '' }}>{{$ct->category_name}}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                 <div class="form-group">

                                    <label>Alt Tag</label>

                                    <input class="form-control" value="{{ $Client->alt_tag }}" name="alt_tag" placeholder="Enter Alt Tag" type="text">

                                 </div>

                              </div>

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                 <div class="form-group">

                                    <label>OrderBy</label>

                                    <input class="form-control" value="{{ $Client->orderby }}" name="orderby" min="0" placeholder="Enter Alt Tag" type="number">

                                 </div>

                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                       <label>Export Client</label>
                                       <select name="export_client" class="form-control">
                                          <option value="">Please Select</option>
                                          <option value="1" {{ ('1' == $Client->export_client) ? 'selected' : '' }}>Yes</option>
                                          <option value="0" {{ ('0' == $Client->export_client) ? 'selected' : '' }}>No</option>
                                       </select>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                       <label>Home Client</label>
                                       <select name="home" class="form-control">
                                          <option value="">Please Select</option>
                                          <option value="0" {{ ($Client->home == '0') ? 'selected' : '' }}>No</option>
                                          <option value="1" {{ ($Client->home == '1') ? 'selected' : '' }}>Yes</option>
                                       </select>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                 <div class="form-group">

                                    <label>Client Image</label>

                                    <input class="form-control"   name="client_logo" type="file">

                                    @if($Client->client_logo)

                                    <img src="{{ URL('public/upload/client') }}/{{ $Client->client_logo }}" alt="" height="100px" width="100px">

                                    @endif

                                    @error('client_logo')

                                    <p class="text-danger"><small>{{ $message }}</small></p>

                                    @enderror

                                 </div>

                              </div>

                           </div>

   

                         



                           <div class="row">

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                 <div class="text-left">

                                    <button type="submit" id="submit" class="btn btn-dark text-white my-4">Update</button>

                                    <a href="{{ route('client') }}" class="btn btn-danger my-4">Cancel</a>

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

<!-- end app-container -->

@endsection