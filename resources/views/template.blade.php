<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>RCS</title>
        <!-- Bootstrap core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- Plugin CSS -->
        <link href="/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/css/creative.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/less" href="/css/custom.less">
        <script src="/js/less.min.js" type="text/javascript"></script>
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/">RCS</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/restaurants">Restaurants</a>
                        </li>
                        @if(session()->has('status'))
                            @if(session('role') == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin-panel">Admin Panel</a>
                                </li>
                            @endif
                        @if(session()->has('role') && session('role') == 1)

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/my-restaurant">My Restaurant</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link logout" href="javascript:void(0);">Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main-container">
            @yield('content')
        </div>
        <footer>
            Copyright &copy; 2018 RCS
        </footer>
        <!-- Modal -->
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/login" method="post">
                            @csrf
                            @if(session()->has('login-error'))
                            <div class="alert alert-danger text-center">
                                {{ session('login-error') }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="username" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" name="password" id="pwd">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 5px;">Login</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <form action="/logout" method="post" id="logout">
            @csrf
        </form>
        <!-- Bootstrap core JavaScript -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="/vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- Custom scripts for this template -->
        <script src="/js/creative.min.js"></script>
        <script src="/js/actions.js"></script>
        @if(session()->has('login-error'))
        <script type="text/javascript">
            $(document).ready(function(){
                $('#loginModal').modal('show')
            })
        </script>
        @endif
    </body>
</html>