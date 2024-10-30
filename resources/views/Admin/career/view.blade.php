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

                  <h1>Manage Career</h1>

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

                              <th scope="col">Name</th>

                              <th scope="col">Email</th>

                              <th scope="col">Mobile No</th>

                              <th scope="col">Qualification</th>

                              <th scope="col">Job Experience</th>

                              <th scope="col">CV</th>
                           </tr>

                        </thead>

                        <tbody>

                           @if(!$career_arr->isEmpty())

                           @foreach($career_arr as $key => $data)

                           <tr>

                              <th scope="row">{{ ($key+1) }}</th>

                              <td>{{ $data->full_name }}</td>

                              <td>{{ $data->email }}</td>

                              <td>{{ $data->phone_number }}</td>

                              <td>{{ $data->qualification }}</td>

                              <td>{{ $data->job_experience }}</td>

                              <td><a href="{{ URL('public/upload/career') }}/{{ $data->document }}" target="_blank">View</a></td>

                           </tr>

                           @endforeach  

                           @else

                           <p class="text-danger mt-2" style="padding-left:450px;">No Career Available</p>

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