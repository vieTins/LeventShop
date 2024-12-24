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
                <strong>Add Product</strong>
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
                    <h5>General Information <small>Add information for product.</small></h5>
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
                    <form method="post" class="form-horizontal" id="productForm" action="{{URL::to('/save-product')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group"><label class="col-sm-2 control-label">Product Name</label>
                            <div class="col-sm-10"><input required type="text" class="form-control" name="product_name"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Product Quantity</label>
                            <div class="col-sm-10"><input required type="text" class="form-control" name="product_quantity"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Product Image</label>
                            <div class="col-sm-10"><input required type="file" class="form-control" name="product_image"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Product Description</label>
                            <div class="col-sm-10"><input required type="text" class="form-control" name="product_desc"> <span class="help-block m-b-none">Product description information. </span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>  
                        <div class="form-group"><label class="col-sm-2 control-label">Display</label>
                            <div class="col-sm-10"><select class="form-control m-b" name="product_status" required>
                                <option value="1">Appear</option>
                                <option value="0">Hidden</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Product Content</label>
                            <div class="col-sm-10">
                                   <textarea rows="8"  name="product_content" class="form-control" style="resize: none" id="ckeditor1" required></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Product Tags</label>
                            <div class="col-sm-10">
                                <input type="text" data-role="tagsinput" class="form-control" name="product_tags">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Product Price</label>
                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input required type="number" class="form-control" name="product_price" min="0"> <span class="input-group-addon">.00</span></div>
                                    </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Product Catalog</label>
                            <div class="col-sm-10"><select class="form-control m-b" name="product_cate">
                                 @foreach ($cate_product as $key => $cate)  
                                  <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                 @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Brands Product</label>
                            <div class="col-sm-10"><select class="form-control m-b" name="product_brand">
                                @foreach ($brand_product as $key => $brand)  
                                  <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                 @endforeach
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