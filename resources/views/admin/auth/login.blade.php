<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome Admin</title>

    <link href="{{asset('public/frontend/css/admincss/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('public/frontend/css/admincss/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/admincss/style.css')}}" rel="stylesheet">
    <style>
    .message-alert {
        padding: 5px 0px;
    }
    .message-alert span {
         color: red;
    }
    </style>
</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Levents Admin</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="{{URL::to('/login')}}" method="POST">
                        @csrf  
                        {{-- tránh các cuộc tấn công csrf --}}
                        <div class="message-alert">
                            <?php
                              $message = Session::get('message') ;
                              if ($message) {
                                 echo "<span>" . $message ."</span>" ;
                                  Session::put('message' , null) ;
                              }
                            ?>
                        </div>
                        <div class="form-group">
                            <center>
                                <h3>
                                LOGIN AUTHENTICATION
                                </h3>
                            </center>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required="" value="{{old('admin_email')}}" name="admin_email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="admin_password">
                        </div>
                        <button name="Register" type="submit" class="btn btn-primary block full-width m-b" style="background-color: black">Login</button>

                        <div class="options" style="display: flex ; justify-content: space-between" >
                            <a href="{{URL::to('/admin')}}">
                            <small>Back</small>
                            </a>
                            <a href="{{URL::to('/register-auth')}}">
                            <small>Register Auth</small>
                            </a>
                        </div>
                    </form>
                    <p class="m-t">
                        <small>Levents Fashion - Modern Simplicity &copy; 2024</small>
                    </p>
                </div>
            </div>
        </div>  
        <hr />
        <div class="row">
            <div class="col-md-6">
                Copyright Levents Company 
            </div>
            <div class="col-md-6 text-right">
                <small>© 2024 - NguyenVietTin</small>
            </div>
        </div>
    </div>

</body>

</html> 