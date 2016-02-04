
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RemittanceUK</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
    
    <!-- Font-Awesome Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap css form cdn -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link href="{{ asset('assets/css/simple-sidebar.css') }}" rel="stylesheet">
        <link href="{{ url("dist/css/sb-admin-2.css") }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 <style>
  .navbar{ margin-bottom: 0px !important;}
 </style>   
    </head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                    		
                    		<?php
                    		
                    		$email = Auth::user()->email;
							$isAdmin = Auth::user()->admin;
							if($isAdmin != 0)
							{
								?>
								<h3 class="panel-title"><span class="fa fa-sign-in"></span>   Your Email is : <?php echo $email; ?></h3>
								<h3 class="panel-title"><span class="fa fa-sign-in"></span>   Your Have Admin Privilege</h3>
								<?php
							}
							else
							{
								?>
								<h3 class="panel-title"><span class="fa fa-sign-in"></span>   Your Email is : <?php echo $email; ?></h3>
								<h3 class="panel-title"><span class="fa fa-sign-in"></span>   Your Don't Have Admin Privilege</h3>
								<?php
							}

							?>
                    </div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                    
                        <form method="POST" action="/auth/login">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                
                                <a href="auth/logout" class="btn btn-danger fa fa-check-circle btn-block" type="submit">
                                Please Logout
                                </a>

                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

