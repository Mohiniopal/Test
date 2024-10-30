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

                  <h1>CMS Page</h1>

               </div>

               <div class="ml-auto d-flex align-items-center">

                 <a class="btn btn-dark text-white" href="{{ route('page') }}">Manage CMS Pages</a>

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

                           <h5 class="mb-0 py-2">Edit CMS Page</h5>

                        </div>

                        <div class="p-3">

                           <form role="form" method="POST" id="cmsForm" enctype="multipart/form-data" action="{{ route('updatePage', $page->pg_id) }}">

                              <input type="hidden" name="page_id" id="pageId" value="{{ $page->pg_id }}" />

                              @csrf

                              <div class="row">

                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Page Name<span style="color:#ff0000">*</span></label>

                                       <input class="form-control" value="{{ $page->pg_name }}" name="page_name" type="text" required>

                                       @error('page_name')

                                       <p class="text-danger"><small>{{ $message }}</small></p>

                                       @enderror

                                    </div>

                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                       <label>Page Footer</label>
                                       <select name="page_footer" class="form-control">
                                          <option value="">Please Select</option>
                                          <option value="1" {{ $page->page_footer == '1' ? 'selected' : '' }}>Yes</option>
                                          <option value="0" {{ $page->page_footer == '0' ? 'selected' : '' }}>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 
                              </div>

                               <div class="row">

                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Page Slug</label>

                                       <input class="form-control" value="{{ $page->slug }}" name="slug" type="text">


                                    </div>

                                 </div>
                                   <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Alt Tag</label>

                                       <input class="form-control" value="{{ $page->alt_tag }}" name="alt_tag" type="text">


                                    </div>

                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Banner Image</label>

                                       <input class="form-control" name="banner_image" type="file">

                                       @if($page->banner_image)

                                       <img src="{{ URL('public/upload/page') }}/{{ $page->banner_image }}" alt="" height="100px" width="100px">

                                       @endif

                                       @error('banner_image')

                                       <p class="text-danger"><small>{{ $message }}</small></p>

                                       @enderror

                                    </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                       <div class="form-group">
   
                                          <label>Mobile Banner Image</label>
   
                                          <input class="form-control" name="mobile_banner" type="file">
   
                                          @if($page->mobile_banner)
   
                                          <img src="{{ URL('public/upload/page') }}/{{ $page->mobile_banner }}" alt="" height="100px" width="100px">
   
                                          @endif
   
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

                                          <div id="cms_rubric" class="cms_rubric"><?php echo $page->rubric ?></div>
         
                                       </div>
         
                                       <input type="hidden" class="form-control" id="cms_rub" name="rubric" >
                                                          

                                    </div>

                                 </div>

                              </div>
                              <div class="row">

                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Short Description</label>

                                       <div class="quill-editor">

                                          <div id="cms_shrt_desc" class="cms_shrt_desc"><?php echo $page->shrt_desc ?> </div>
         
                                       </div>
         
                                       <input type="hidden" class="form-control" id="cms_shrt_des" name="shrt_desc" >

                                    
                                    </div>

                                 </div>

                              </div>

                              <div class="row">

                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Full Description</label>

                                       <div class="quill-editor">

                                          <div id="cms_full_desc" class="cms_full_desc"><?php echo $page->full_desc ?></div>
         
                                       </div>
         
                                       <input type="hidden" class="form-control" id="cms_full_des" name="full_desc" >

                                    
                                    </div>

                                 </div>

                              </div>

                              <h2 class="p-1  text-black">SEO Filed</h2>

                              <div class="row">

                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Meta Title</label>

                                       <input class="form-control" value="{{ $page->meta_title }}" placeholder="Enter Meta Title" name="meta_title" type="text">

                                    </div>

                                 </div>

                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>keyword</label>

                                       <input class="form-control" value="{{ $page->meta_keyword }}" name="meta_keyword" placeholder="Enter Keyword" type="text">

                                    </div>

                                 </div>

                              </div>

                              <div class="row">

                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                    <div class="form-group">

                                       <label>Meta Description</label>

                                       <textarea class="form-control" name="meta_desc" cols="50" rows="15" style="width:100%;px; height:300px;" mce_editable="true">{{ $page->meta_desc  }}</textarea>

                                    </div>

                                 </div>

                              </div>

                              <div class="row">

                                 <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                    <div class="text-left">

                                       <button type="submit" id="submit" class="btn btn-dark text-white my-4">Update</button>

                                       <a href="{{ route('page') }}" class="btn btn-danger my-4">Cancel</a>

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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">

    $(document).ready(function () {

      var my_desc = CKEDITOR.replace('editor_desc');

      my_desc.config.allowedContent = true;

      //   my_desc.config.extraAllowedContent = 'div(*)';

      //   my_desc.config.extraAllowedContent = 'div(col-md-*,container-fluid,row)';

      var my_desc1 = CKEDITOR.replace('editor_desc1');

      my_desc1.config.allowedContent = true;

      var my_desc2 = CKEDITOR.replace('editor_desc2');

      my_desc2.config.allowedContent = true;

    });

</script>

@endsection

