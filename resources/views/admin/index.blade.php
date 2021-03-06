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


    @yield('styles')
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

                    @if(Auth::user()->user_role == 1)
                        <li>
                            <a href="#">Users <span class="caret"></span></a>
                            <ul class="nav nav-second-level">
                                <li>  <a href="/users">All Users</a>  </li>
                                <li> <a href="/users/create">Create User</a>   </li>
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

                                <li>
                                    <a href="{{ route('episode.poster.create') }}">Upload Film's Poster</a>
                                </li>

                                <li>
                                    <a href="{{ route('episode.photo.create') }}">Upload Film's Backdrop</a>
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
                                    <a href="{{ route('admin.tv_show.create') }}">Create TvShow</a>
                                </li>
                                <li>
                                    <a href="#">Season <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">All Seasons</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.tvshow.season.create') }}">Create Season</a>
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
                                            <a href="{{ route('admin.tvshow.season.episode.create') }}">Create Episode</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('episode.media.poster.create') }}">Upload Episode's Poster</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('episode.media.backdrop.create') }}">Upload Episode's Backdrop</a>
                                        </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                        <li>
                            <a href="{{ route('user.watchlist.index') }}">Watch Lists </a>
                        </li>

                        <li>
                            <a href="{{ route('user.favorite.index') }}">Favorites</a>
                        </li>

                        <li>
                            <a href="">Rating & Review </a>
                        </li>

                        <li>
                            <a href="{{ route('user.lists.index') }}">Lists </a>
                        </li>


                    @else
                        <li>
                            <a href="{{ route('user.watchlist.index') }}">Watch Lists </a>
                        </li>

                        <li>
                            <a href="{{ route('user.favorite.index') }}">Favorites</a>
                        </li>

                        <li>
                            <a href="">Rating & Review </a>
                        </li>

                        <li>
                            <a href="{{ route('user.lists.index') }}">Lists </a>
                        </li>
                    @endif

                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>



</div>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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


@yield('scripts')


</body>

</html>
