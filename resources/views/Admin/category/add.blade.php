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
                  <a class="btn btn-dark text-white" href="{{ route('category') }}">Manage Industry</a>
               </div>
            </div>
            <!-- end page title -->
         </div>
      </div>
      <!-- end row -->
      <!--mail-Compose-contant-start-->
      @php
      function categoryTree($parent_id = 0, $sub_mark = ''){
      
          $query =  DB::table('category')->where('parent_id','=', $parent_id)->get();
         
          if(count($query) > 0){
              foreach($query as $value){
                  echo '<option value="'.$value->cat_id.'">'.$sub_mark.$value->cat_name.'</option>';
                  categoryTree($value->cat_id, $sub_mark.'---');
              }
          }
      }
      @endphp
      <div class="row account-contant">
         <div class="col-12">
            <div class="card card-statistics">
               <div class="card-body p-0">
                  <!-- <div class="row no-gutters"> -->
                  <div class="page-account-form">
                     <div class="form-titel border-bottom p-3">
                        <h5 class="mb-0 py-2">Add Industry</h5>
                     </div>
                     <div class="p-3">
                        <form role="form" method="POST" id="categoryForm" enctype="multipart/form-data" action="{{ route('createCategory') }}">
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
                                    <label>Parent Industry</label>
                                    <select name="parent_id" class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true">
                                       <option value="">Please Select</option>
                                       @php
                                          echo categoryTree();
                                       @endphp
                                    </select>
                                 </div>
                              </div>
                              
                           </div>

                           <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                          <label>Sub Title</label>
                                          <input class="form-control" value="{{ old('subtitle') }}" name="subtitle" placeholder="Enter Sub Title" type="text">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                          <label>Alt Tag</label>
                                          <input class="form-control" value="{{ old('atl_tag') }}" name="atl_tag" placeholder="Enter Alt Tag" type="text">
                                    </div>
                                 </div>
                              </div>

                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                       <label>Industry Order</label>
                                       <input class="form-control" name="cat_order"  placeholder="Enter Category Order" value="{{  old('cat_order') }}" type="text">
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                       <label>Color</label>
                                       <input class="form-control" name="color"  value="{{  old('color') }}" type="color">
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Industry Image</label>
                                    <input class="form-control" name="category_image" type="file">
                                    @error('category_image')
                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                       <label>Home Industry</label>
                                       <select name="home" class="form-control">
                                          <option value="">Please Select</option>
                                          <option value="0" selected>No</option>
                                          <option value="1">Yes</option>
                                       </select>
                                 </div>
                              </div>
                              
                           </div>
                              
                           <div class="row">

                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
   
                                 <div class="form-group">

                                    <label>Rubric Field</label>

                                    <div class="quill-editor">

                                       <div id="cate_rubric" class="cate_rubric">{{ old('rubric') }}</div>
      
                                    </div>
      
                                    <input type="hidden" class="form-control" id="cate_rub" name="rubric" >

                                 
                                 </div>

                              </div>

                           </div>

                           {{-- <div class="row">

                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                 <div class="form-group">

                                    <label>Description</label>

                                    <textarea id="editor_desc" class="ckeditor form-control"  value="{{ old('full_desc') }}" name="full_desc" cols="50" rows="15" style="width:100%;px; height:300px;" mce_editable="true"></textarea>

                                 </div>

                              </div>

                           </div> --}}
                           

              
                           <h2 class="p-1  text-black">SEO Filed</h2>
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Meta Title</label>
                                    <input class="form-control" value="{{ old('meta_title') }}"  placeholder="Enter Meta Title" name="meta_title" type="text">                       
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Meta keyword</label>
                                    <input class="form-control" value="{{ old('meta_keyword') }}" name="meta_keyword" placeholder="Enter Keyword" type="text">
                                 </div>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="form-group">
                                    <label>Meta Description</label> 
                                    <textarea class="form-control"  name="meta_desc" cols="50" rows="15" style="width:100%;px; height:300px;" mce_editable="true"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                 <div class="text-left">
                                    <button type="submit" id="submit" class="btn btn-dark text-white my-4">Add</button>
                                    <a href="{{ route('category') }}"  class="btn btn-danger my-4">Cancel</a>
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