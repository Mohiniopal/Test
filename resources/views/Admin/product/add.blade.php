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

                  <h1>Product</h1>

               </div>

               <div class="ml-auto d-flex align-items-center">

                  <a class="btn btn-dark text-white" href="{{ route('product') }}">Manage Product</a>

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

                        <h5 class="mb-0 py-2">Add Product</h5>

                     </div>

                     <div class="p-3">

                        <form role="form" method="POST" id="productForm" enctype="multipart/form-data" action="{{ route('createproduct') }}">

                           @csrf

                          

                           <div class="row">

                              

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                 <div class="form-group">

                                    <label>Product Name<span style="color:#ff0000">*</span></label>

                                       <input class="form-control" value="{{ old('title') }}" name="title" placeholder="Enter Product Name" type="text" required>

                                       @error('title')

                                       <p class="text-danger"><small>{{ $message }}</small></p>

                                       @enderror

                                 </div>

                              </div>

                              <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="form-group">

                                      <label>Sub Title</label>

                                      <input class="form-control" value="{{ old('subtitle') }}" name="subtitle" placeholder="Enter Sub Title" type="text">

                                </div>

                             </div>

                           

                           </div>



                           <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                    <label>Category</label>

                                    <select name="category_id" class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true">

                                        <option value="">Please Select</option>

                                        @php

                                            echo categoryTree();

                                        @endphp

                                    </select>

                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                        <label>Application</label>

                                        <select name="application_id[]" class="form-control  selectpicker " multiple data-show-subtext="true" data-live-search="true">

                                            <option value="">Please Select</option>

                                            @foreach($apps as $ap)

                                            <option value="{{$ap->id}}">{{$ap->name}}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                            <label>Alt Tag</label>

                                            <input class="form-control" value="{{ old('atl_tag') }}" name="atl_tag" placeholder="Enter Alt Tag" type="text">

                                    </div>

                                </div>

                              

                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                        <label>Product Order</label>

                                        <input class="form-control" name="orderby"  placeholder="Enter Product Order" value="{{  old('orderby') }}" type="text">

                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                        <label>Image</label>

                                        <input class="form-control" name="image" type="file">

                                        @error('image')

                                        <p class="text-danger"><small>{{ $message }}</small></p>

                                        @enderror

                                    </div>

                                </div>

                                

                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                          <label>Banner Alt Tag</label>

                                          <input class="form-control" value="{{ old('banner_alt') }}" name="banner_alt" placeholder="Enter Banner Alt Tag" type="text">

                                    </div>

                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Banner Image</label>

                                       <input class="form-control" name="banner_img" type="file">

                                       @error('banner_img')

                                       <p class="text-danger"><small>{{ $message }}</small></p>

                                       @enderror

                                    </div>

                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Mobile Banner Image</label>

                                       <input class="form-control" name="mobile_banner" type="file">

                                       @error('mobile_banner')

                                       <p class="text-danger"><small>{{ $message }}</small></p>

                                       @enderror

                                    </div>

                                 </div>
                            </div>

                              

                           <div class="row">



                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">

   

                                 <div class="form-group">



                                    <label>Rubric Field</label>



                                    <div class="quill-editor">



                                       <div id="prod_rubric" class="prod_rubric"><?php echo  old('rubric') ?></div>

      

                                    </div>

      

                                    <input type="hidden" class="form-control" id="prod_rub" name="rubric" >



                                 

                                 </div>



                              </div>



                           </div>



                            <div class="row">



                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">



                                 <div class="form-group">



                                    <label>Description</label>



                                    <div class="quill-editor">



                                        <div id="prod_desc" class="prod_desc"><?php echo  old('desc') ?></div>

       

                                    </div>

    

                                    <input type="hidden" class="form-control" id="prod_des" name="desc" >



                                 </div>



                              </div>



                           </div> 



                           <div class="row">



                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">



                               <div class="form-group">



                                  <label>Properties</label>



                                  <div class="quill-editor">



                                      <div id="prod_prop" class="prod_prop"><?php echo  old('property') ?></div>

     

                                  </div>

  

                                  <input type="hidden" class="form-control" id="prod_pro" name="property" >



                               </div>



                            </div>



                         </div>



                         <div class="row">



                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">



                               <div class="form-group">



                                  <label>Solubility</label>



                                  <div class="quill-editor">



                                      <div id="prod_sol" class="prod_sol"><?php echo  old('solubility') ?></div>

     

                                  </div>

  

                                  <input type="hidden" class="form-control" id="prod_sl" name="solubility" >



                               </div>



                            </div>



                         </div>



                         <div class="row">



                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">



                               <div class="form-group">



                                  <label>Specification</label>



                                  <div class="quill-editor">



                                      <div id="prod_spec" class="prod_spec"><?php echo  old('specification') ?></div>

     

                                  </div>

  

                                  <input type="hidden" class="form-control" id="prod_spe" name="specification" >



                               </div>



                            </div>



                         </div>

                           



              

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

                                    <a href="{{ route('product') }}"  class="btn btn-danger my-4">Cancel</a>

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