@extends('admin_layout') 
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Product Catalog</h2> 
        <ol class="breadcrumb">
            <li>
                <a href="{{URL::to('/dashboard')}}">Home</a>
            </li>
            <li>
                <a>Product Catalog</a>
            </li>
            <li class="active">
                <strong>Edit Product Category</strong>
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
                    <h5>General Information <small>Edit information for product.</small></h5>
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
                    @foreach ($edit_category_product as $key => $edit_value)
                    <form method="post" class="form-horizontal" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}">
                        @csrf
                        <div class="form-group"><label class="col-sm-2 control-label">Category Name</label>
                            <div class="col-sm-10"><input type="text" value="{{$edit_value->category_name}}" class="form-control" name="category_product_name"></div>
                        </div>
                        <div class="hr-line-dashed"></div> 
                        <div class="form-group"><label class="col-sm-2 control-label">Category Keywords</label>
                            <div class="col-sm-10"><input type="text" value="{{$edit_value->meta_keywords}}"  class="form-control" name="category_product_keywords"></div>
                        </div>
                        <div class="hr-line-dashed"></div> 
                        <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10"><input type="text" value="{{$edit_value->category_desc}}"  class="form-control" name="category_product_desc"> <span class="help-block m-b-none"> Category description information. </span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit" name="">Cancel</button>
                                <button class="btn btn-primary" type="submit" name="update_category_product">Edit Category</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 