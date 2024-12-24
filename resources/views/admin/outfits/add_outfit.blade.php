@extends('admin_layout') 
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Outfits</h2> 
        <ol class="breadcrumb">
            <li>
                <a href="{{URL::to('/dashboard')}}">Home</a>
            </li>
            <li>
                <a>Outfits</a>
            </li>
            <li class="active">
                <strong>Add Outfits</strong>
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
                    <h5>General Information <small>Add information for outfits.</small></h5>
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
                    <form method="post" class="form-horizontal" id="productForm" action="{{URL::to('/save-outfit')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group"><label class="col-sm-2 control-label">Product's Outfits</label>
                            <div class="col-sm-10"><select class="form-control m-b" name="product_outfit">
                                @foreach ($all_product as $key => $product)  
                                  <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                 @endforeach
                            </select>
                            </div>
                        </div>
                         <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Outfits Image</label>
                            <div class="col-sm-10"><input required type="file" class="form-control" name="outfit_image_first"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Outfits Image</label>
                            <div class="col-sm-10"><input required type="file" class="form-control" name="outfit_image_second"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Outfits Content</label>
                            <div class="col-sm-10">
                                   <textarea rows="8"  name="outfit_desc" class="form-control" style="resize: none" id="ckeditor1" required></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>  
                        <div class="form-group"><label class="col-sm-2 control-label">Display</label>
                            <div class="col-sm-10"><select class="form-control m-b" name="outfit_status" required>
                                <option value="1">Appear</option>
                                <option value="0">Hidden</option>
                            </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit" name="">Cancel</button>
                                <button class="btn btn-primary" type="submit" name="add_product">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 