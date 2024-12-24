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
            <strong>Data Tables Outfits</strong>
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
                        <h5>Data Outfits</h5>
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
                        <th>Outfit Name</th>
                        <th>Product of Outfit</th>
                        <th>Outfit Image</th>
                        <th>Outfit Description</th>
                        <th>Outfit Status</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_outfit as $key => $outfit)
                    <tr class="gradeX">
                        <td >{{ $outfit->product_name }}</td>
                        <td >
                            @if(isset($outfit->product_image))
                                <img src="{{URL::to('public/uploads/product/'.$outfit->product_image)}}" style="height: 120px; width: auto">
                            @else
                                <span>No image available</span>
                            @endif
                        </td>
                        <td>
                            <img src="{{URL::to('public/uploads/outfit/'.$outfit->outfit_image_first)}}" style="height: 150px; width: auto">
                            <img src="{{URL::to('public/uploads/outfit/'.$outfit->outfit_image_second)}}" style="height: 150px; width: auto">
                        </td>
                       <td>{!! $outfit->outfit_desc !!}</td>
                        <td >
                          <?php 
                            if($outfit->outfit_status==0){
                                ?>
                                <a href="{{URL::to('/unactive-outfit/'.$outfit->outfit_id)}}"><span class="">Hide
                                    <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                <?php
                            }else{
                                ?>
                                <a href="{{URL::to('/active-outfit/'.$outfit->outfit_id)}}"><span class="">Appear
                                    <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                <?php
                            }
                          ?>
                        </td>
                        <td class="center"> 
                            <span>
                             <button class="buttonOptions" style="background-color: transparent;  border: none">
                                 <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('/delete-outfit/'.$outfit->outfit_id)}}">
                                    Delete
                                 </a>
                             </button>
                            </span>
                            <br>
                        </td>
                    </tr>
                     @endforeach                   
                    </tbody>
                    <tfoot>
                    <tr>
                       <th>Outfit Name</th>
                        <th>Product of Outfit</th>
                        <th>Outfit Image</th>
                        <th>Outfit Description</th>
                        <th>Outfit Status</th>
                        <th>Options</th>
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
