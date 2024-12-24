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
            <strong>Data Tables Categories</strong>
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
                        <h5>Data Category Products</h5>
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
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Category Display</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach ($all_category_product as $key => $cate_pro)
                                <tr class="gradeX">
                                    <td >{{ $cate_pro->category_name }}</td>
                                    <td >{{ $cate_pro->category_desc }}
                                    </td>
                                    <td >
                                    <?php 
                                        if($cate_pro->category_status==0){
                                            ?>
                                            <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="">Hide
                                                <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                            <?php
                                        }else{
                                            ?>
                                            <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="">Appear
                                                <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                            <?php
                                        }
                                    ?>
                                    </td>
                                    <td class="center"> 
                                        <span>
                                        <button class="buttonOptions" style="background-color: transparent;  border: none">
                                            <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}">
                                                Delete
                                            </a>
                                        </button>
                                        </span>
                                        <br>
                                    <span>
                                        <button class="buttonOptions" style="background-color: transparent;  border: none">
                                            <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}">
                                            Edit 
                                            </a>
                                        </button>
                                    </span>
                                    </td>
                                </tr>
                                @endforeach                   
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Category Display</th>>
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
