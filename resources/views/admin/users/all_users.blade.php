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
            <strong>Data Tables Users</strong>
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
                        <h5>Data Users</h5>
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
                        <th>
                           Check
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Staff</th>
                        <th>Admin</th>
                        <th>Manager</th>
                        <th>
                            Options
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($admin as $key => $user)
                       <tr class="gradeX">  
                            <form method="post" class="form-horizontal" action="{{ URL::to('/assign-roles') }}">
                                @csrf
                                <td>
                                    <input type="checkbox" name="post[]" id="">
                                </td>
                                <td>{{ $user->admin_name }}</td>
                                <td>
                                    {{ $user->admin_email }}
                                    <input type="hidden" name="admin_email" value="{{ $user->admin_email }}">
                                </td>
                                <td>{{ $user->admin_phone }}</td>
                                <td>{{ $user->admin_password }}</td>
                                <td>
                                    <input type="checkbox" class="i-checks" name="author_role" {{ $user->hasRole('staff') ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="checkbox" class="i-checks" name="admin_role" {{ $user->hasRole('admin') ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="checkbox" class="i-checks" name="user_role" {{ $user->hasRole('manager') ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-sm">Assign Roles</button>
                                    <a class="btn btn-danger btn-sm" href="{{URL::to('/delete-user-roles/'. $user->admin_id)}}">Delete User</a>
                                </td>
                            </form>
                        </tr>
                     @endforeach                   
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>
                           Check
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Author</th>
                        <th>Admin</th>
                        <th>User</th>
                        <th>
                            Options
                        </th>
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
