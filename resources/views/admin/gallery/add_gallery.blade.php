@extends('admin_layout') 
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Products</h2> 
        <ol class="breadcrumb">
            <li>
                <a href="{{URL::to('/dashboard')}}">Home</a>
            </li>
            <li>
                <a>Products</a>
            </li>
            <li class="active">
                <strong>Add Gallery</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>General Information <small>Add gallery for product.</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="status-add">
                        <?php
                        $message = Session::get("message") ;
                        if($message) {
                            echo "<span>". $message ."</span>" ;
                            Session::put("message" , null) ;
                        } 
                        ?>
                    </div>
                    <form method="POST" class="form-horizontal" id="productForm" action="{{URL::to('/insert-gallery/'.$pro_id)}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group"><label class="col-sm-2 control-label">Product Image</label>
                            <div class="col-sm-10"><input required type="file" id="file" class="form-control" name="file[]" accept="image/*" multiple></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                           <div class="col-sm-10">
                            <span id="error_gallery" style="font-weight: 600 ; color: red"></span>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit" name="">Cancel</button>
                                <button class="btn btn-primary" type="submit" name="upload">Upload Gallery</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <input type="hidden" name="pro_id" value="{{$pro_id}}" class="pro_id">
                        <form action="">
                            @csrf
                        <div id="gallery-load">
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection 