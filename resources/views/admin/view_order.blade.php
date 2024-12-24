@extends('admin_layout')
@section('admin_content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Order</h2> 
        <ol class="breadcrumb">
            <li>
                <a href="{{URL::to('/dashboard')}}">Home</a>
            </li>
            <li>
                <a>Order</a>
            </li>
            <li class="active">
                <strong>Order details</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce" style="padding-bottom: 0px">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name" style="font-size: 15px">Customer Information</label>    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>

                            <th data-toggle="true">Name Customer</th>
                            <th data-hide="phone">Phone Customer</th>
                            <th data-hide="all">Email Customer</th>
                            <th data-hide="phone,tablet" >Send Mail</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                              {{ $customer->customer_name }}
                            </td>
                            <td>
                               {{ $customer->customer_phone }}
                            </td>
                            <td>
                                {{ $customer->customer_email }}
                            </td>
                            <td>
                                <a href="{{URL::to('/view-mail/'.$customer->customer_id.'/'.$order_detail[0]->order_code)}}" class="btn btn-sm btn-primary">
                                   <i class="fa-solid fa-paper-plane"></i> Send Now
                                </a>    
                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs">View</button>
                                    <button class="btn-white btn btn-xs">Edit</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce" style="padding-bottom: 0px">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name" style="font-size: 15px">Shipping Information</label>    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>

                            <th data-toggle="true">Recipient Name</th>
                            <th data-hide="phone">Recipient Email</th>
                            <th data-hide="phone">Recipient Phone</th>
                            <th data-hide="phone">Recipient Method</th>
                            <th data-hide="phone,tablet" >Recipient Address</th>
                            <th data-hide="all">Recipient Notes</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{ $shipping->shipping_name }}
                            </td>
                            <td>
                                {{ $shipping->shipping_email }}
                            </td>
                            <td>
                                {{ $shipping->shipping_phone }}
                            </td>
                            <td>
                                 @if ( $shipping->shipping_method  == 0)
                                       Bank Transfer
                                @else
                                        COD
                                 @endif
                            </td>
                            <td>
                                {{ $shipping->shipping_address }}
                            </td>
                            <td>
                                {{ $shipping->shipping_notes }}
                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs">View</button>
                                    <button class="btn-white btn btn-xs">Edit</button>
                                </div>
                            </td>
                        </tr>
                        </tbody> 
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce" style="padding-bottom: 0px">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name" style="font-size: 15px">Order Information</label>    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>
                            <th data-toggle="true">ID</th>
                            <th data-toggle="true">Product name</th>
                            <th data-toggle="true">Inventory quantity</th>
                            <th data-toggle="true">Product coupon</th>
                            <th data-toggle="true">Product feeship</th>
                            <th data-hide="phone">Product price</th>
                            <th data-hide="phone">Product quantity</th>
                            <th data-hide="phone">Product total</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0 ;
                                $total = 0 ;
                            @endphp
                         @foreach ($order_detail as $key => $item )
                            @php
                                $i++ ;
                                $sub_total = (int)$item->product_price * $item->product_sales_quantity ;
                                $total += $sub_total ;
                            @endphp
                            <tr class="color_qty_{{$item->product_id}}">
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                               {{ $item->product_name }}
                            </td>
                            <td>
                                {{$item->product->product_quantity}}
                            </td>
                            <td>
                                @if ($item->product_coupon !== 'no')
                                    {{ $item->product_coupon }}
                                @else
                                    No Coupon
                                @endif
                            </td>
                            <td>
                                ${{ $item->product_feeship }}
                            </td>
                            <td>
                                ${{ $item->product_price }}
                            </td>
                            <td>
                                <input type="number" name="product_sales_quantity"   {{$order_status == 2 ? 'disabled' : ''}} id=""  min="1" class="order_qty_{{$item->product_id}}"  value="{{ $item->product_sales_quantity}}"> 
                                <input type="hidden" name="order_product_id" class="order_product_id" value="{{$item->product_id}}">
                                <input type="hidden" name="order_code" class="order_code" value="{{$item->order_code}}">
                                <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$item->product_id}}" value="{{$item->product->product_quantity}}">
                                @if($order_status  != 2)
                                <button class="btn btn-success update_quantity_order" 
                                data-product_id = {{$item->product_id}}
                                name="update_quantity_order">
                                    Update
                                </button>
                                @endif
                            </td> 
                            <td>
                                $ {{ $sub_total }}
                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs">View</button>
                                    <button class="btn-white btn btn-xs">Edit</button>
                                </div>
                            </td>
                        </tr>
                         @endforeach
                         <tr>
                           <td colspan="8">
                                <ul class="pagination pull-right">
                                    @foreach ($order as $key => $or)
                                         @if($or->order_status == 1) 
                                            <form action="">
                                                @csrf
                                                <select name="" id="" class="form-control order_details">
                                                <option value="">Select Your Option </option>
                                                <option  id="{{$or->order_id}}" selected value="1">Unprocessed</option>
                                                <option  id="{{$or->order_id}}" value="2">
                                                    Processed - Delivered
                                                </option>
                                                <option  id="{{$or->order_id}}" value="3"> 
                                                    Cancel order - Hold
                                                </option>
                                            </select>
                                        </form>
                                         @elseif ($or->order_status == 2)
                                            <form action="">
                                                @csrf
                                                <option value="">Select Your Option </option>
                                                <select name="" id="" class="form-control order_details">
                                                <option  id="{{$or->order_id}}" value="1">Unprocessed</option>
                                                <option  id="{{$or->order_id}}" selected value="2">
                                                    Processed - Delivered
                                                </option>
                                                <option  id="{{$or->order_id}}" value="3"> 
                                                    Cancel order - Hold
                                                </option>
                                                </select>
                                            </form>
                                        @else  
                                            <form action="">
                                                @csrf
                                                <select name="" id="" class="form-control order_details">
                                                <option value="">Select Your Option </option>
                                                <option  id="{{$or->order_id}}" value="1">Unprocessed</option>
                                                <option  id="{{$or->order_id}}" value="2">
                                                    Processed - Delivered
                                                </option>
                                                <option  id="{{$or->order_id}}" selected value="3"> 
                                                    Cancel order - Hold
                                                </option>
                                            </select>
                                        </form>
                                         @endif
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                         <tr>
                            <td> 
                                <strong>                 
                                     @php
                                         $total_coupon =  0 ;
                                     @endphp
                                     @if ($coupon_condition ==1)
                                         @php
                                              echo 'Voucher Disscount : -$' . $coupon_number . '%' ;
                                              $total_after_coupon = ($total * $coupon_number) / 100 ;
                                              echo "<br>";
                                              $total_coupon = $total - $total_after_coupon + $item->product_feeship ;
                                         @endphp
                                     @else
                                         @php
                                                echo ' Voucher Disscount : -$' . $coupon_number  ;
                                                echo "<br>";
                                                $total_coupon = $total - $coupon_number + $item->product_feeship ;
                                         @endphp
                                     @endif
                                      Fee Ship : ${{ $item->product_feeship }} <br>
                                      Order Total :  ${{ $total_coupon }}
                                </strong>
                            </td>
                         </tr>
                         <tr>
                             <td>
                                 <strong>
                                    <a href="{{URL::to('/print-order/'.$item->order_code)}}" target="_blank">
                                    <i class="fa-solid fa-print"></i> Print Order</a>
                                 </strong>
                             </td>
                         </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="8">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection