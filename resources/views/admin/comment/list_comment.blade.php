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
            <strong>Data Tables Comment</strong>
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
                        <h5>Comments</h5>
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
                        <th>Name Customer</th>
                        <th>Comment</th>
                        <th>Reply</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Comment Status</th>
                        <th>Options</th>
                    </tr>
                    </thead>    
                    <tbody>
                    @foreach ($comment as $key => $comm)
                    <tr class="gradeX">
                        <td>{{ $comm->comment_name }}</td>
                        <td>{{ $comm->comment }}
                            <ul style="padding-left: 9px ; list-style: none;">
                                @foreach ($comment_rep as $key => $comm_reply)
                                    @if($comm_reply->comment_parent_comment == $comm->comment_id)
                                        <li>
                                            <i class="fa-solid fa-share" style="font-size: 0.9rem"></i>  {{ $comm_reply->comment }} </li> 
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                        <td>
                             @if ($comm->comment_status == 0 ) 
                                 <input type="text" class="form-control reply_comment_{{$comm->comment_id}}" name="reply_comment">
                                 <input type="button" value="Reply" class="btn btn-info btn-xs btn-reply_comment" data-comment_id="{{$comm->comment_id}}"  data-product_id="{{$comm->comment_product_id}}">
                             @else
                                  Approve to enter reply
                            @endif 
                        </td>
                        <td>
                            {{ $comm->comment_date }}
                        </td>
                        <td>
                            <a href="{{url('/product-detail/'. $comm->product->product_id)}}" target="_blank">{{ $comm->product->product_name }}</a>
                        </td>
                        <td>
                          <?php     
                            if($comm->comment_status == 0){
                                ?>
                                  <input type="button" value="Approve" class="btn btn-primary btn-xs comment_approve_btn" data-comment_status="1" data-comment_id="{{$comm->comment_id}}" 
                                  id="{{$comm->comment_product_id}}">
                                <?php
                            }else{
                                ?>
                                <input type="button" value="Unapprove" class="btn btn-danger btn-xs comment_approve_btn" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" 
                                  id="{{$comm->comment_product_id}}">
                                <?php
                            }
                          ?>
                        </td>
                        <td class="center"> 
                            <span>
                             <button class="buttonOptions" style="background-color: transparent;  border: none">
                                 <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('/delete-coupon/'.$comm->comment_id)}}">
                                    Delete
                                 </a>
                             </button>
                            </span>
                        </td>
                    </tr>
                     @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name Customer</th>
                        <th>Comment</th>
                        <th>Reply</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Comment Status</th>
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
