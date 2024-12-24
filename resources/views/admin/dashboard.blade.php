@extends("admin_layout")
@section('admin_content')
<div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Annual</span>
                                <h5>Sales</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"> ${{ number_format($total_sales, 2) }}</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Total Sales</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Annual</span>
                                <h5>Orders</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    {{ $total_orders }}
                                </h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>Total orders</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Customers</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    {{ $total_customer }}
                                </h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>Total Customers</small>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">Annual</span>
                                <h5>Users</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">
                                    {{ $total_users }}
                                </h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>Total Users</small>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-9">
                                <h5 style="margin-left: 15px">
                                    Thong ke don hang doanh so
                                </h5>
                                <form action="" autocomplete="off">
                                    @csrf
                                    <div class="col-md-2">
                                        <p>
                                            From Date : 
                                            <input type="text" name="" id="datepicker" class="form-control">
                                        </p>
                                        <input type="button" value="Filter" class="btn btn-primary btn-sm" id="btn-dashboard-filter">
                                    </div>
                                    <div class="col-md-2">
                                        <p>
                                            To Date : 
                                            <input type="text" name="" id="datepicker2" class="form-control">
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <p>
                                            Filter By : 
                                            <select name="" id="" class="dashboard-filter form-control">
                                               <option value="">Select One</option>
                                               <option value="7dayleft">7 Day Left</option> 
                                               <option value="monthleft">Month Left</option>
                                               <option value="thismonth">This Month</option>
                                               <option value="365dayleft">365 Day Left</option>    
                                            </select> 
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Orders</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-md-12">
                                    <div id="myfirstchart" style="height: 250px;">

                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                {{-- <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Visits</h5>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-md-12">
                                     <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>Online</th>
                                            <th>Total Of Last Month</th>
                                            <th>Total Of This Month</th></th>
                                            <th>Total Of Year</th>
                                            <th>Total Visits</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             <tr class="gradeX">
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    1
                                                </td>

                                             </tr>
                                        </tbody>
                                        <tfoot>
                                            <th>Online</th>
                                            <th>Total Of Last Month</th>
                                            <th>Total Of This Month</th></th>
                                            <th>Total Of Year</th>
                                            <th>Total Visits</th>
                                        </tfoot>
                                     </table>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div> --}}

</div>
@endsection