@extends('admin_layout') 
@section('admin_content')
@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif
<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
                <div class="mail-box-header">
                    <div class="pull-right tooltip-demo">
                        <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                        <a href="" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                    </div>
                    <h2>
                        Compose mail
                    </h2>
                </div>
                <style>
                    /* Loại bỏ viền của note-editor */
                    .note-editor {
                        border: none !important;
                        box-shadow: none !important;
                    }

                    /* Loại bỏ viền của note-frame */
                    .note-frame {
                        border: none !important;
                        box-shadow: none !important;
                    }

                    /* Loại bỏ viền của panel panel-default */
                    .panel.panel-default {
                        border: none !important;
                        box-shadow: none !important;
                    }
                </style>

                <div class="mail-box">


                <div class="mail-body">

                    <form class="form-horizontal" method="post" action="{{URL::to('/send-mail')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_code" value="{{$order_code}}">
                        <div class="form-group"><label class="col-sm-2 control-label">Customer :</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="name_to" value="{{$customer->customer_name}}" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">To:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email_to" value="{{$customer->customer_email}}" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Subject:</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value="" name="email_subject"></div>
                        </div>
                                           <div class="mail-text h-200">
                         <textarea class="summernote" name="email_content" required></textarea>
                        <div class="clearfix"></div>
                    </div>
                    <div class="mail-body text-right tooltip-demo">
                        <button class="btn btn-sm btn-primary" type="submit" name="send_mail"><i class="fa fa-reply"></i> Send</button>  
                        <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                        <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                    </div>
                    <div class="clearfix"></div>
                    </form>

                </div> 


                </div>
            </div>
        </div>
</div>
@endsection