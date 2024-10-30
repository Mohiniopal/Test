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
                  <h1>Manage Certificate</h1>
               </div>
               <div class="ml-auto d-flex align-items-center">
                  <a class="btn btn-dark text-white" href="{{ route('addcertificate') }}">Add Certificate</a>
               </div>
            </div>
            <!-- end page title -->
         </div>
      </div>
      <!-- end row -->
      <!-- begin row -->
      <div class="row editable-wrapper">
         <div class="col-lg-12 ">
            <div class="card card-statistics">
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="table" class="table display responsive nowrap table-light table-bordered">
                        <thead class="thead-light">
                           <tr>
                              <th scope="col">id</th>
                              <th scope="col">Title</th>
                              <th scope="col">Image</th>
                              <th scope="col">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(!$client_arr->isEmpty())
                           @foreach($client_arr as $key => $data)
                           <tr>
                              <th scope="row">{{ ($key+1) }}</th>
                              <td>{{ $data->name }}</td>
                              <td><img src="{{ URL('public/upload/certificate') }}/{{ $data->image }}" alt="" height="100px" width="100px"></td>
                              <td>
                                 <div class="actions">
                                    <a class="btn btn-sm bg-success-light"  href="{{ route('editcertificate', $data->id)}}">
                                    <i class="fe fe-edit" style="font-size: 2em;color: #3e4095;"></i> 
                                    </a>
                                    <a  href="javascript:void(0)" data-delete_url="{{url('certificate/delete/'.$data->id)}}"   class="btnDelete btn btn-sm bg-danger-light">
                                    <i class="fe fe-trash" style="font-size: 2em;color: #3e4095;"></i> 
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @endforeach  
                           @else
                           <p class="text-danger mt-2" style="padding-left:450px;">No Certificate Available</p>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- end container-fluid -->
</div>
<!-- end app-main -->
</div>
<!-- end app-container -->
@endsection