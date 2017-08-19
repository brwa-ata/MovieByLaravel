<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/adm.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- /.navbar-header -->



        <ul class="nav navbar-top-links navbar-right">


            {{--<!-- /.dropdown -->--}}
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-user">--}}
                    {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-user -->--}}
            {{--</li>--}}
            {{--<!-- /.dropdown -->--}}


        </ul>






        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">

                    <li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>

                    <li><a  href="{{  url('/logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>




        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li class="active">
                        <a href="/admin"> Dashboard</a>
                    </li>

                    <li>
                        <a href="#">Users <span class="caret"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/users">All Users</a>
                            </li>

                            <li>
                                <a href="/users/create">Create User</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"> Movies <span class="caret"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.film.index') }}">All Movies</a>
                            </li>

                            <li>
                                <a href="{{ route('admin.film.create') }}">Create Movies</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                    <li>
                        <a href="#">TV Show <span class="caret"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.tv_show.index') }}">All TvShows</a>
                            </li>
                            <li>
                                <a href="#">Create TvShow</a>
                            </li>
                            <li>
                                <a href="#">Season <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">All Seasons</a>
                                    </li>
                                    <li>
                                        <a href="#">Create Season</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                            <li>
                                <a href="#">Episode <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">All Episodes</a>
                                    </li>
                                    <li>
                                        <a href="#">Create Episod</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                    <li>
                        <a href="#">Media <span class="caret"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/media">All Media</a>
                            </li>

                            <li>
                                <a href="">Upload Media</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>





    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="">All Posts</a>
                        </li>

                        <li>
                            <a href="">Create Post</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>



            </ul>

        </div>

    </div>

</div>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

<!-- jQuery -->
<script src="{{asset('js/adm.js')}}"></script>


@yield('footer')


</body>

</html>
