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
            <strong>Data Tables Product</strong>
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
                        <h5>Data Products</h5>
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
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Category Product</th>
                        <th>Brand Product</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Description</th>
                        <th>Product Content</th>
                        <th>
                            Product Tags
                        </th>
                        <th>Product Display</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_product as $key => $pro)
                    <tr class="gradeX">
                        <td >{{ $pro->product_name }}</td>
                        <td >{{ $pro->product_quantity }}</td>
                        <td >{{ $pro->category_name }}</td>
                        <td >{{ $pro->brand_name }}</td>
                        <td >{{ $pro->product_price }}</td>
                        <td ><img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="auto" width="150"></td>
                        <td >{{ $pro->product_desc }}</td>
                        <td>{!! $pro->product_content !!}</td>
                        <td>
                             <input type="text" data-role="tagsinput" class="form-control" name="product_tags" value="{{$pro->product_tags}}">
                        </td>
                        <td >
                          <?php 
                            if($pro->product_status==0){
                                ?>
                                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="">Hide
                                    <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                <?php
                            }else{
                                ?>
                                <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="">Appear
                                    <i class="fa-solid fa-pen" style="font-size: 0.8rem"></i></span></a>
                                <?php
                            }
                          ?>
                        </td>
                        <td class="center"> 
                            <span>
                             <button class="buttonOptions" style="background-color: transparent;  border: none">
                                 <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}">
                                    Delete
                                 </a>
                             </button>
                            </span>
                            <br>
                           <span>
                             <button class="buttonOptions" style="background-color: transparent;  border: none">
                                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}">
                                   Edit 
                                </a>
                             </button>
                           </span>
                           <br>
                           <span>
                                <button class="buttonOptions" style="background-color: transparent;  border: none">
                                    <a href="{{URL::to('/add-gallery/'.$pro->product_id)}}">
                                    Image
                                    </a>
                                </button>
                            </span>
                        </td>
                    </tr>
                     @endforeach                   
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Category Product</th>
                        <th>Brand Product</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Description</th>
                        <th>Product Content</th>
                        <th>Product Display</th>
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
{{-- 9:31 --}}