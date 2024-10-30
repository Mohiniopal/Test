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
                  <h1>Manage Gallery</h1>
               </div>
           
            </div>
            <!-- end page title -->
         </div>
      </div>
      
      <div class="row mb-2">
             <div class="col-12 droupzone">
             <form action="{{ route('savegallerimage') }}" class="dropzone" id="my-awesome-dropzone">
             @csrf
            </form>
                                  
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
                              <th scope="col">Image Path</th>
                              <th scope="col">Image</th>
                              <th class="text-right">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(!$gallery->isEmpty())
                           @foreach($gallery as $key => $data)
                           <tr>
                              <th style="width:25px" scope="row">{{ ($key+1) }}</th>
                              <td>
                                 <div class="copy-td">
                                    <input class="linkToCopy w-100 form-control" value="{{ URL('public/upload/media_images') }}/{{ $data->image }}" readonly="">
                                 </div>
                                 <div class="mt-2">
                                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('tag_update', $data->id)}}">
                                       @csrf
                                       <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                             <div class="form-group">
                                                <label>Alt Tag</label>
                                                <input class="form-control" value="{{ $data->alt_tag }}" name="alt_tag" placeholder="Enter Alt Tag" type="text">
                                             </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                             <div class="form-group">
                                                <label>OrderBy</label>
                                                <input class="form-control" value="{{ $data->orderby }}" name="orderby" min="0" type="number">
                                             </div>
                                          </div>
                                          
                                       </div>
                                       <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                             <div class="text-left">
                                                <button type="submit" id="submit" class="btn btn-dark text-white my-4">Update</button>
                                              
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </td>
                              
                              <td style="width:120px"><img src="{{ URL('public/upload/media_images') }}/{{ $data->image }}" alt="" height="100px" width="100px"></td>
                              <td class="text-left" style="width:25px">
                                 <div class="actions">
                                
                                    <a  href="javascript:void(0)" data-delete_url="{{url('gallery/delete/'.$data->id)}}"   class="btnDelete btn btn-sm bg-danger-light">
                                    <i class="fe fe-trash" style="font-size: 2em;color: #3e4095;"></i> 
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @endforeach  
                           @else
                           <p class="text-danger mt-2" style="padding-left:450px;">No Gallery Available</p>
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
<script type="text/javascript">
	$( document ).ready(function() {
	  // Handler for .ready() called.
		$('.copy-td').click(function(){
		    $(this).find('input.linkToCopy').select();
		    document.execCommand("copy");
		});
	});
</script>
@endsection