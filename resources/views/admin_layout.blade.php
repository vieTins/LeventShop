<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Dashboard</title>
    <link href="{{asset('public/frontend/css/admincss/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/fonts/font-awesome/css/font-awesome.css')}}" />

    <!-- Toastr style -->
    <link href="{{asset('public/frontend/css/admincss/plugins/toastr/toastr.min.css')}}" rel="stylesheet" />
    <meta name="csrf-token" content = "{{csrf_token()}}">
    <!-- Gritter -->
    <link href="{{asset('public/frontend/js/adminjs/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet" />

    <link href="{{asset('public/frontend/css/admincss/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/css/admincss/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="{{asset('public/frontend/css/admincss/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/admincss/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/admincss/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/admincss/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/admincss/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="{{asset('public/frontend/img/profile_small.jpg')}}" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                    <?php 
                                    $name = Auth::user()->admin_name;
                                    if ($name) {
                                        echo $name ;
                                    }
                                    ?>
                                </strong>
                                    </span> <span class="text-muted text-xs block">
                                    @php
                                    $role = Auth::user() ;
                                    if ($role->hasRole('admin')) {
                                        echo "Admin" ;
                                    } elseif ($role->hasRole('staff')) {
                                        echo "Staff" ;
                                    }
                                    else {
                                        echo "Manager" ;
                                    }
                                    
                                    @endphp    
                                    <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="{{URL::to('/logout-auth')}}">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            LV+
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{URL::to('/dashboard')}}"><i class="fa-solid fa-gauge"></i> <span class="nav-label">Dashboards</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-box-archive"></i> <span class="nav-label">Product Catalog</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/add-category-product')}}">Add Category Product</a></li>
                            <li><a href="{{URL::to('/all-category-product')}}">List Category Product</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-boxes-stacked"></i> <span class="nav-label">Brands </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/add-brand-product')}}">Add Brand Product</a></li>
                            <li><a href="{{URL::to('/all-brand-product')}}">List Brand Product</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-cart-flatbed"></i> <span class="nav-label">Order </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/manage-order')}}">Manage Order</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-boxes-packing"></i><span class="nav-label">Products </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/add-product')}}">Add New Product</a></li>
                            <li><a href="{{URL::to('/all-product')}}">List Brand Product</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-ticket"></i> <span class="nav-label">Coupon </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/insert-coupon')}}">Manage Coupon</a></li>
                            <li><a href="{{URL::to('/list-coupon')}}">List Coupon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-truck-fast"></i> <span class="nav-label">Delivery </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/delivery')}}">Manage Delivery</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-regular fa-images"></i> <span class="nav-label">Banner </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/manage-banner')}}">Manage Banner</a></li>
                            <li><a href="{{URL::to('/add-slider')}}">Add Banner</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-comment"></i><span class="nav-label">Comment </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/comment')}}">Manage Comment</a></li>
                        </ul>
                    </li>
                    @hasrole('admin' , 'staff' , 'manager')
                    <li>
                        <a href="#"><i class="fas fa-tshirt"></i><span class="nav-label">Outfits </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/manage-outfits')}}">Manage Outfit</a></li>
                            <li><a href="{{URL::to('/add-outfits')}}">Add Outfits</a></li>
                        </ul>
                    </li>
                    @endhasrole
                    @hasrole('admin')
                    <li>
                        <a href="#"><i class="fa-solid fa-user"></i><span class="nav-label">Users   </span></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('/users')}}">Manage Users</a></li>
                        </ul>
                    </li>
                    @endhasrole
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to Levent admin.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="{{URL::to('/logout-auth')}}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="container-componet">
               @yield('admin_content')
            </div>
            <div class="footer">
                <div class="pull-right">
                    Nguyen Viet Tin.
                </div>
                <div>
                    <strong>Copyright</strong> Levents Company &copy; 2024
                </div>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('public/frontend/js/adminjs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('public/frontend/js/adminjs/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/flot/jquery.flot.pie.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('public/frontend/js/adminjs/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
     <script src="{{asset('public/frontend/js/adminjs/bootstrap-tagsinput-angular.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/inspinia.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('public/frontend/js/adminjs/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- GITTER -->
    <script src="{{asset('public/frontend/js/adminjs/plugins/gritter/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('public/frontend/js/adminjs/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->   
    <script src="{{asset('public/frontend/js/adminjs/demo/sparkline-demo.js')}}"></script>

    <!-- ChartJS-->
    <script src="{{asset('public/frontend/js/adminjs/plugins/chartJs/Chart.min.js')}}"></script>
    
    <!-- Toastr -->
    <script src="{{asset('public/frontend/js/adminjs/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/ajax.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/adminjs/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function() {
    $('.summernote').summernote({
      placeholder: 'Enter content....',
      tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      focus: true,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      popover: {
        image: [
          ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
          ['float', ['floatLeft', 'floatRight', 'floatNone']],
          ['remove', ['removeMedia']]
        ],
        link: [
          ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
          ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
          ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
          ['color', ['color']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']]
        ]
      },
      codemirror: {
        theme: 'monokai'
      }
    });
  
});
    </script>
    {{-- Ajax--}}
    {{-- CkEditor --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('ckeditor1');
    </script>
    <script>
        $(document).ready(function(){
        load_gallery() ;
           function load_gallery() {
            var pro_id = $(".pro_id").val() ;
            var _token = $("input[name='_token']").val() ;
            $.ajax({
                url: "{{URL::to('/select-gallery')}}",
                method: "GET",
                data: {pro_id: pro_id , _token: _token},
                success: function(data) {
                    $("#gallery-load").html(data) ;
                }
            });
           }
           $('#file').change(function(){
            var error = '' ;
            var files = $('#file')[0].files ;
            var error_gallery = $('#error_gallery') ;
            if(files.length > 4) {
                error += '<p>Only 4 images are allowed</p>' ;
                error_gallery.html(error) ;
                return false ;  
            } else if (files.length == 0) {
                error += '<p>Please select image</p>' ;
                error_gallery.html(error) ;
                return false ;
            }
            else if (files.size >2000000){
                error += '<p>Image size must be less than 2MB</p>' ;
                error_gallery.html(error) ;
                return false ;
            }
            else {
                error_gallery.html('') ;
            }
           });
          $(document).on('blur', '.edit_gal_name' , function(){
               var gal_id = $(this).data('gal_id') ;
               var gal_text = $(this).text() ;
               var _token = $("input[name='_token']").val() ;
               $.ajax({
                url: "{{URL::to('/update-gallery-name')}}",
                method: "POST",
                data: {gal_id:gal_id , gal_text:gal_text , _token:_token},
                success: function(data) {
                   load_gallery() ;
                   $('#error_gallery').html('<span style="color: green">Gallery name has been updated</span>') ;
                }
            });
          });
          $(document).on('click', '.delete-gallery' , function(){
               var gal_id = $(this).data('gal_id') ;
               var _token = $("input[name='_token']").val() ;
               if(confirm('Are you sure you want to delete?')) {
               $.ajax({
                url: "{{URL::to('/delete-gallery')}}",
                method: "POST",
                data: {gal_id:gal_id , _token:_token},
                success: function(data) {
                   load_gallery() ;
                   $('#error_gallery').html('<span style="color: green">Gallery has been updated</span>') ;
                        }
                    });
                }
            });
            $(document).on('change', '.file_image' , function(){
               var gal_id = $(this).data('gal_id') ;
               var image = document.getElementById('file-'+ gal_id).files[0] ;
               var form_data = new FormData() ;
               form_data.append('file', image) ;
               form_data.append('gal_id', gal_id) ;
               $.ajax({
                url: "{{URL::to('/update-gallery')}}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                   load_gallery() ;
                   $('#error_gallery').html('<span style="color: green">Gallery has been updated</span>') ;
                        }
                    });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            fetch_delivery() ;
            function fetch_delivery () {
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: '{{url('/select-feeship')}}',
                    method: "POST",
                    data: {  _token: _token  },
                    success: function (data) {
                        console.log("AJAX Success Response:", data);
                        $("#load_delivery").html(data);
                    },
                    error: function (xhr) {
                        console.error("AJAX Error Response:", xhr.responseText);      
                    },
                });
            }
            $(document).on('blur' , '.fee_feeship_edit',function() {
                var feeship_id = $(this).data('feeship_id') ;
                var fee_value = $(this).text() ;
                var _token = $("input[name='_token']").val();
                    $.ajax({
                    url: '{{url('/update-delivery')}}',
                    method: "POST",
                    data: {feeship_id: feeship_id, fee_value: fee_value, _token: _token},
                    success: function (data) {
                        console.log("AJAX Success Response:", data);
                        fetch_delivery() ;
                    },
                    error: function (xhr) {
                        console.error("AJAX Error Response:", xhr.responseText);
                    },
                });
            });
    $('.add_delivery').click(function(){
        var city = $('.city').val();
        var district = $('.province').val();
        var ward = $('.ward').val();
        var fee_ship = $('.fee_ship').val();
        var _token = $("input[name='_token']").val();
        $.ajax({
        url: '{{url('/insert-delivery')}}',
        method: "POST",
        data: { city: city, district: district, _token: _token  , ward : ward , fee_ship : fee_ship},
        success: function (data) {
            console.log("AJAX Success Response:", data);
            fetch_delivery() ;
        },
        error: function (xhr) {
            console.error("AJAX Error Response:", xhr.responseText);
        },
    });
    });
    $(".choose").on("change", function () {
    var action = $(this).attr("id");
    var ma_id = $(this).val();
    var _token = $("input[name='_token']").val();
    var result = "";

    console.log("Action ID:", action);
    console.log("Selected Value (ma_id):", ma_id);
    console.log("Token (_token):", _token);

    if (action == "city") {
        result = "district";
    } else {
        result = "ward";
    }
    console.log("Result ID to update:", result);
    $.ajax({
        url: '{{url('/select-delivery')}}',
        method: "POST",
        data: { action: action, ma_id: ma_id, _token: _token },
        success: function (data) {
            console.log("AJAX Success Response:", data);
            $("#" + result).html(data);
        },
        error: function (xhr) {
            console.error("AJAX Error Response:", xhr.responseText);
            alert("Something went wrong. Please try again.");
        },
    });
});
});
    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: "slideDown",
                    timeOut: 4000,
                };
                toastr.success("Responsive Admin Theme", "Welcome to INSPINIA");
            }, 1300);

            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 30],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 3],
                [15, 3],
                [16, 6],
            ];
            var data2 = [
                [0, 1],
                [1, 0],
                [2, 2],
                [3, 0],
                [4, 1],
                [5, 3],
                [6, 1],
                [7, 5],
                [8, 2],
                [9, 3],
                [10, 2],
                [11, 1],
                [12, 0],
                [13, 2],
                [14, 8],
                [15, 0],
                [16, 0],
            ];
            $("#flot-dashboard-chart").length &&
                $.plot($("#flot-dashboard-chart"), [data1, data2], {
                    series: {
                        lines: {
                            show: false,
                            fill: true,
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4,
                        },
                        points: {
                            radius: 0,
                            show: true,
                        },
                        shadowSize: 2,
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: "#d5d5d5",
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis: {},
                    yaxis: {
                        ticks: 4,
                    },
                    tooltip: false,
                });

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"],
                }, ],
            };

            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false,
                },
            };

            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {
                type: "doughnut",
                data: doughnutData,
                options: doughnutOptions,
            });

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [70, 27, 85],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"],
                }, ],
            };

            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false,
                },
            };

            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {
                type: "doughnut",
                data: doughnutData,
                options: doughnutOptions,
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    <script>
        $('.comment_approve_btn').click(function(){
                var comment_status = $(this).data('comment_status') ;
                var comment_id = $(this).data('comment_id') ;
                var comment_product_id = $(this).attr('id') ;
                $.ajax({
                    url: "{{url('/allow-comment')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    } ,
                    data: {comment_status: comment_status , comment_id: comment_id , comment_product_id: comment_product_id},
                    success: function(data) {
                        window.location.reload() ;
                        toastr.success('Success', 'Comment has been updated') ;
                    }
                });
        });
        $('.btn-reply_comment').click(function(){
                var comment_id = $(this).data('comment_id') ;
                var comment = $('.reply_comment_' + comment_id).val() ;
                var comment_product_id = $(this).data('product_id') ;
                $.ajax({
                    url: "{{url('/reply-comment')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    } ,
                    data: {comment: comment , comment_id: comment_id , comment_product_id: comment_product_id},
                    success: function(data) {
                        $('.reply_comment_' + comment_id).val('') ; 
                        toastr.success('Success', 'Reply comment success') ;
                    }
                });
        });
    </script>
    <script>
        $('.order_details').change(function() {
           var order_status  = $(this).val() ;
           var order_id  = $(this).children(":selected").attr("id") ;
           var _token = $("input[name='_token']").val() ;
           
        //    lấy ra số lượng 
        quantity = [] ;
        $("input[name='product_sales_quantity']").each(function() {
            quantity.push($(this).val()) ;
        })
        // lấy ra product id 
        order_product_id  = [] ;
        $("input[name='order_product_id']").each(function() {
            order_product_id.push($(this).val()) ;
        })
        j = 0 ;
        for(i = 0 ; i < order_product_id.length ; i++) {
             var order_qty  = $('.order_qty_'+order_product_id[i]).val() ;
             var order_qty_storage = $('.order_qty_storage_'+ order_product_id[i]).val() ;
             if (parseInt(order_qty) >  parseInt(order_qty_storage)) {
                j++ ;
                if (j == 1) {
                    toastr.error('Error', 'Quantity must be less than storage') ;
                }
                 $('.color_qty_' + order_product_id[i]).css('color', 'red') ;
             }
        }
        if (j == 0 ) {
            $.ajax({
                url: "{{url('/update-order-qty')}}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
                data: {order_status: order_status , order_id: order_id , _token: _token , quantity: quantity , order_product_id: order_product_id},
                success: function(data) {
                    toastr.success('Success', 'Order status has been updated') ;
                    location.reload() ;
                }
            });
        }
        })
    </script>
    <script>
        $('.update_quantity_order').click(function() {
             var order_product_id = $(this).data('product_id') ;
             var order_qty = $('.order_qty_' + order_product_id).val() ;
             var order_code =  $('.order_code').val() ;
             var _token = $("input[name='_token']").val() ;
             $.ajax({
                url: "{{url('/update-qty')}}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
                data: {order_product_id: order_product_id , order_qty: order_qty , order_code: order_code , _token: _token},
                success: function(data) {
                    toastr.success('Success', 'Updated Successfully') ;
                    location.reload() ;
                }
            });
        })
    </script>
<script>
$(function() {
    $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
    });
});
$(function() {
    $("#datepicker2").datepicker({
            dateFormat: 'yy-mm-dd'
    });
});
  </script>
  <script>
      
  </script>
  <script>
     $(document).ready(function(){

      chart30daysorder() ;

        var chart =  new Morris.Area({   
        element: 'myfirstchart',
        lineColors : ['#1ab394', '#1C84C6', '#1C84C6', '#1C84C6', '#1C84C6'],
        pointFillColors: ['ffffff'],
        pointStrokeColors: ['black'],
        fillOpacity: 0.3,
        hideHover: 'auto',
        parseTime: false,
        behaveLikeLine: true,
        xkey: 'period',
        ykeys: ['order' , 'sales' , 'profit' , 'quantity'],
        labels: ['Order Count' , 'Sales' , 'Profit' , 'Quantity'],
        });
        function chart30daysorder() {
            var _token = $("input[name='_token']").val() ;
            $.ajax({
                url: "{{url('/days-order')}}",
                method: "POST",
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
                data: {_token: _token},
                success: function(data) {
                    chart.setData(data) ;
                }
            });
        }

        $('.dashboard-filter').change(function(){
            var dashboard_value = $(this).val() ;
            var _token = $("input[name='_token']").val() ;
            $.ajax({
                url: "{{url('/dashboard-filter')}}",
                method: "POST",
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
                data: {dashboard_value: dashboard_value , _token: _token},
                success: function(data) {
                    chart.setData(data) ;
                }
                
            });
        })
        $('#btn-dashboard-filter').click(function(){
        var _token = $("input[name='_token']").val() ;
        var from_date = $('#datepicker').val() ;
        var to_date = $('#datepicker2').val() ;
        $.ajax({
            url: "{{url('/filter-by-date')}}",  
            method: "POST",
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } ,
            data: {from_date: from_date , to_date: to_date , _token: _token},
            success: function(data) {
               chart.setData(data) ;
            }
        });
     });
     });
  </script>
</body>

</html>