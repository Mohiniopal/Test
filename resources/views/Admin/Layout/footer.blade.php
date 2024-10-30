<!-- begin footer -->

            <footer class="footer">

                <div class="row">

                    <div class="col-12 col-sm-6 text-center text-sm-left">

                         <span class="nav-title">Copyright <?php echo date('Y'); ?>. All rights reserved.</span>

                    </div>

                   <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">

                        <p><a target="_blank">Yogeshwar Polymers</a></p>

                    </div>

                </div>

            </footer>

            <!-- end footer -->

        </div>

        <!-- end app-wrap -->

    </div>

    <!-- end app -->



    <!-- plugins -->

    <script src="{{url('Admin/assets/js/vendors.js')}}"></script>



    <!-- custom app -->

    <script src="{{url('Admin/assets/js/app.js')}}"></script>

</body>

<script type="text/javascript">

  $("#Bannerform").on("submit",function() {
  
     var bn_desc = $("#banner_desc").summernote('code');
  
     var bn_sdesc = $("#banner_sub_heading").summernote('code');
  
     $("#banner_des").val(bn_desc);
  
     $("#banner_sub_head").val(bn_sdesc);
  
  });

  $("#Bannereditform").on("submit",function() {
  
    var bn_ed_desc = $("#banner_edit_desc").summernote('code');

    var bn_ed_sdesc = $("#banner_edit_sub_heading").summernote('code');

    $("#banner_edit_des").val(bn_ed_desc);

    $("#banner_edit_sub_head").val(bn_ed_sdesc);

  });

  $("#cmsForm").on("submit",function() {
  
    var cms_rub = $("#cms_rubric").summernote('code');

    var cms_sdec = $("#cms_shrt_desc").summernote('code');

    var cms_fdec = $("#cms_full_desc").summernote('code');

    $("#cms_rub").val(cms_rub);

    $("#cms_shrt_des").val(cms_sdec);

    $("#cms_full_des").val(cms_fdec);

  });

  $("#categoryForm").on("submit",function() {
  
    var cate_rub = $("#cate_rubric").summernote('code');

    $("#cate_rub").val(cate_rub);

  });

  $("#productForm").on("submit",function() {
  
    var pro_rub = $("#prod_rubric").summernote('code');

    var pro_des = $("#prod_desc").summernote('code');

    var pro_prop = $("#prod_prop").summernote('code');

    var prod_sol = $("#prod_sol").summernote('code');

    var prod_spe = $("#prod_spec").summernote('code');

    $("#prod_rub").val(pro_rub);

    $("#prod_des").val(pro_des);

    $("#prod_pro").val(pro_prop);

    $("#prod_sl").val(prod_sol);

    $("#prod_spe").val(prod_spe);

  });

  
  
  </script>

<script>



$('.btnDelete').click(function(e) {

  e.preventDefault();

  var url = $(this).data('delete_url');

  Swal.fire({

    title: 'Are you sure?',

    text: "You won't be able to revert this!",

    type: 'warning',

    showCancelButton: true,

    confirmButtonColor: '#3085d6',

    cancelButtonColor: '#d33',

    confirmButtonText: 'Yes, delete it!'

  }).then((result) => {

    if (result.value) {

      window.location = url;

    }

  });

});





</script>

</html>