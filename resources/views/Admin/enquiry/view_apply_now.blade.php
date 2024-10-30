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

                  <h1>Manage Apply Now</h1>

               </div>

               <div class="ml-auto d-flex align-items-center">
                    <input type="hidden" value="0" name="export">
              
               </div>

            </div>

            <!-- end page title -->

         </div>

      </div>
<div class="row">
    <form action="{{ route('applynow') }}" method="GET" id="filter-form" class="w-100">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $start_date) }}" id="start_date">
            </div>
            <div class="col-md-4 mb-3">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $end_date) }}" id="end_date">
            </div>
            <div class="col-md-4 mb-3">
                <label for="search_text">Search By Name</label>
                <input type="text" name="search_text" placeholder="Please Enter Name" class="form-control" value="{{ old('search_text', $search_text) }}" id="search_text">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary">Filter Data</button>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('applynow') }}" class="btn btn-primary">Reset</a>
            </div>
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-success" name="export" value="1">Export CSV</button>
            </div>
        </div>
    </form>
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
                              <th scope="col">Phone No</th>
                                <th scope="col">Designation</th>
                              <th scope="col">Qualification</th>
                                <th scope="col">Job Experience</th>
                                 <th scope="col">City</th>
                              <th scope="col">Country</th>
                             <th scope="col">Salary</th>
                             <th scope="col">Date</th>
                              <th scope="col">Time</th>
                           </tr>

                        </thead>

                        <tbody>

                        @if(!$enquiry_arr->isEmpty())

                        @foreach($enquiry_arr as $key => $data)

                           <tr>

                              <th scope="row">{{ ($key+1) }}</th>

                              <td>{{ $data->full_name }}</td>

                              <td>{{ $data->email }}</td>
                              
                              <td>{{ $data->phone_number }}</td>
                               <td>{{ $data->designation }}</td>
                              <td>{{ $data->qualification }}</td>	
                                <td>{{ $data->job_experience }}</td>
                                  <td>{{ $data->city }}</td>
                              <td>{{ $data->country }}</td>
                                 <td>{{ $data->salary }}</td>
                            
                                <td>{{  date('Y-m-d', strtotime($data->created_at)) }}</td>
                                  <td>{{ date('h:i A', strtotime($data->created_at)) }}</td>
                           </tr>

                           @endforeach  

                           @else

                           <p class="text-danger mt-2" style="padding-left:450px;">No Apply Now Available</p>

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