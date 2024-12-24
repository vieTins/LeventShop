@extends('admin_layout') 
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Brands</h2> 
        <ol class="breadcrumb">
            <li>
                <a href="{{URL::to('/dashboard')}}">Home</a>
            </li>
            <li>
                <a>Brands</a>
            </li>
            <li class="active">
                <strong>Add Brand</strong>
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
                    <h5>General Information <small>Add information for brand.</small></h5>
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
                    <form class="form-horizontal">
                        @csrf
                        <div class="form-group"><label class="col-sm-2 control-label">Select City</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b choose city" name="city" id="city">
                                <option value="">City</option>
                                @foreach ($city as $key => $item)
                                         <option value="{{$item->matp}}">{{$item->name_city}}</option>
                                @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Select District</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b choose province" name="district" id="district">
                                <option value="">District</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Select Ward</label>
                            <div class="col-sm-10"><select class="form-control m-b ward" name="ward" id="ward">
                                <option value="">Ward</option>
                            </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Fee Ship</label>
                            <div class="col-sm-10"><input type="text" class="form-control fee_ship" name="fee_ship" required minlength="3" placeholder="Enter fee ship"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit" name="">Cancel</button>
                                <button class="btn btn-primary add_delivery" type="button" name="add_delivery">Add Fee</button>
                            </div>
                        </div>
                    </form>
                    <div id="load_delivery">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 