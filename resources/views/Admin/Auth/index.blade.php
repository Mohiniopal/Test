@extends('Admin.Layout.main_layout') 	
@section('main_container')
<style>
    .span-index{
        color: #ef2b5d !important;
    }
</style>             
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                        <div class="col-xl-3 col-lg-6">
                                          <div class="card card-stats mb-4 mb-xl-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('product') }}">
                                                        <h5 class="card-title text-uppercase text-muted mb-0">Product</h5></a>
                                                        <a href="{{ route('product') }}"><span class="h2 font-weight-bold mb-0 span-index">{{ $total_product }}</span></a>
                                                        
                                                    </div>
                                                    <div class="col-auto">
                                                        <a class="icon icon-shape bg-gray text-black rounded-circle shadow" href="{{ route('product') }}"><i class="fa fa-product-hunt" style="font-size: 2em;color: #3e4095;" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                          <div class="card card-stats mb-4 mb-xl-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                    <a href="{{ route('page') }}"><h5 class="card-title text-uppercase text-muted mb-0">CMS Pages</h5></a>
                                                    <a href="{{ route('page') }}"> <span class="h2 font-weight-bold mb-0 span-index">{{ $total_cms }}</span></a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a class="icon icon-shape bg-gray text-black rounded-circle shadow" href="{{ route('page') }}"><i class="fa fa-file-text" style="font-size: 2em;color: #3e4095;" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        

                                        <div class="col-xl-3 col-lg-6">
                                          <div class="card card-stats mb-4  mb-xl-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                    <a href="{{ route('contactus') }}"><h5 class="card-title text-uppercase text-muted mb-0">Contact Us</h5></a>
                                                    <a href="{{ route('contactus') }}"><span class="h2 font-weight-bold mb-0 span-index">{{ $total_contact }}</span></a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a class="icon icon-shape bg-gray text-black rounded-circle shadow" href="{{ route('contactus') }}"> <i class="fa fa-address-book" style="font-size: 2em;color: #3e4095;" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-3 col-lg-6">
                                          <div class="card card-stats mb-4  mb-xl-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                    <a href="{{ route('category') }}"><h5 class="card-title text-uppercase text-muted mb-0">Industry</h5></a>
                                                    <a href="{{ route('category') }}"> <span class="h2 font-weight-bold mb-0 span-index">{{ $total_category }}</span></a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a class="icon icon-shape bg-gray text-black rounded-circle shadow" href="{{ route('category') }}"><i class="fa fa-th-large" style="font-size: 2em;color: #3e4095;" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        
                                    
                        </div>
                    
                        <!-- end row -->
                 
                  
               
                      
                        <!-- event Modal -->
                        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="verticalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="verticalCenterTitle">Add New Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="modelemail">Event Name</label>
                                                <input type="email" class="form-control" id="modelemail">
                                            </div>
                                            <div class="form-group">
                                                <label>Choose Event Color</label>
                                                <select class="form-control">
                                                    <option>Primary</option>
                                                    <option>Warning</option>
                                                    <option>Success</option>
                                                    <option>Danger</option>
                                                </select>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
@endsection