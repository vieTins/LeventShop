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

                            <th data-toggle="true">ID</th>
                            <th data-hide="phone">Order Code</th>
                            <th data-hide="all">Order Status</th>
                            <th data-hide="all">Order Date</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0 ;
                            @endphp
                           @foreach ($order as $key => $ord )
                            @php
                                 $i++ ;
                            @endphp
                            <tr>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                {{ $ord->order_code }}
                            </td>
                            <td>
                                @if ($ord->order_status == 1)
                                   Unprocessed
                                @elseif ($ord->order_status == 2)
                                     Processed - Delivered 
                                @elseif ($ord->order_status == 3)
                                    Cancel order - Hold
                                @endif
                            </td>
                            <td>
                                {{ $ord->order_date }}
                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs">
                                        <a href="{{URL::to('/view-order/'. $ord->order_code)}}" style="text-decoration: none ; color: black"> View </a>
                                    </button>
                                    <button class="btn-white btn btn-xs">
                                        <a href="{{URL::to('/delete-order/'. $ord->order_code)}}" style="text-decoration: none ; color: black"> Delete </a>
                                    </button>
                                </div>
                            </td>
                            </tr>
                           @endforeach
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
@endsection