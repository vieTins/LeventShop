@extends('admin_layout') 
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Coupon</h2> 
        <ol class="breadcrumb">
            <li>
                <a href="{{URL::to('/dashboard')}}">Home</a>
            </li>
            <li>
                <a>Manage Coupon</a>
            </li>
            <li class="active">
                <strong>Add Coupon</strong>
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
                    <form method="post" class="form-horizontal" action="{{URL::to('/insert-code-coupon')}}">
                        @csrf
                        <div class="form-group"><label class="col-sm-2 control-label">Coupon Name</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="coupon_name"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Coupon Code</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="coupon_code"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Coupon Quantity</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="coupon_times">  
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Coupon Feature</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="coupon_condition">
                                    <option value="1">Decrease by percentage</option>
                                    <option value="2">decrease by amount</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Percent or amount of discount</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="coupon_number">  
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Display</label>
                            <div class="col-sm-10"><select class="form-control m-b" name="coupon_status">
                                <option value="1">Appear</option>
                                <option value="0">Hidden</option>
                            </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit" name="">Cancel</button>
                                <button class="btn btn-primary" type="submit" name="add_coupon">Add Coupon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 