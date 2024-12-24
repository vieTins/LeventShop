@extends('admin_layout')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
    <h2>Data Tables</h2>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>
            <a>Tables</a>
        </li>
        <li class="active">
            <strong>Data Tables Coupons</strong>
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
                        <h5>Coupons</h5>
                        <div class="status-add">
                        <?php
                        $message = Session::get("message") ;
                        if($message) {
                            echo "<span style='color:red' ; font-weight : 600>" . $message . "</span>";
                            Session::put("message" , null) ;
                        } 
                        ?>
                    </div>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Coupon Name</th>
                        <th>Coupon Code</th>
                        <th>Coupon Times</th>
                        <th>Coupon Types</th>
                        <th>Coupon Number</th>
                        <th>Coupon Display</th>
                        <th>Options</th>
                        <th>Send Mail </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list_coupon as $key => $coupon)
                    <tr class="gradeX">
                        <td>{{ $coupon->coupon_name }}</td>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td>{{ $coupon->coupon_times }}</td>
                        <td>
                            @if ($coupon->coupon_condition == 1)
                                <span>Decrease by percentage</span>
                            @else
                                <span>Decrease by amount</span>
                            @endif
                        </td>
                        <td>{{ $coupon->coupon_number }}</td>
                        <td>
                          <?php 
                            if($coupon->coupon_status == 0){
                                ?>
                                <a href="{{URL::to('/unactive-coupon/'.$coupon->coupon_id)}}"><span class="">Hide
                                    <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                <?php
                            }else{
                                ?>
                                <a href="{{URL::to('/active-coupon/'.$coupon->coupon_id)}}"><span class="">Appear
                                    <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                <?php
                            }
                          ?>
                        </td>
                        <td class="center"> 
                            <span>
                             <button class="buttonOptions" style="background-color: transparent;  border: none">
                                 <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('/delete-coupon/'.$coupon->coupon_id)}}">
                                    Delete
                                 </a>
                             </button>
                            </span>
                            <br>
                           <span>
                             <button class="buttonOptions" style="background-color: transparent;  border: none">
                                <a href="{{URL::to('/edit-coupon/'.$coupon->coupon_id)}}">
                                   Edit 
                                </a>
                             </button>
                           </span>
                        </td>
                         <td class="center"> 
                            <span>
                             <button class="buttonOptions" style="background-color: transparent;  border: none">
                                 <a class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to send mail ?')" href="{{URL::to('/send-coupon/'.$coupon->coupon_id)}}">
                                    Send Mail
                                 </a>
                             </button>
                            </span>
                        </td>
                    </tr>
                     @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Coupon Name</th>
                        <th>Coupon Code</th>
                        <th>Coupon Times</th>
                        <th>Coupon Types</th>
                        <th>Coupon Number</th>
                        <th>Coupon Display</th>
                        <th>Options</th>
                        <th>Send Mail</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
</div>  
@endsection
