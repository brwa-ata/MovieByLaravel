<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    {{--  Custom CSS --}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

@yield('styles')

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=" {{ url('/') }}">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movies <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('popular') }}"> Popular</a>
                        </li>
                        <li>
                            <a href="toprated">Top Rated</a>
                        </li>
                        <li>
                            <a href="{{ route('upcoming') }}">Upcoming</a>
                        </li>

                        <li>
                            <a href="{{ route('nowplaying') }}">Now Playing</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">TV Shows <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('popular.tvshow') }}"> Popular</a>
                        </li>
                        <li>
                            <a href=""> Top Rated</a>
                        </li>
                        <li>
                            <a href="{{ route('ontv') }}">On TV</a>
                        </li>

                        <li>
                            <a href="{{ route('airingtoday') }}">Airing Today</a>
                        </li>
                    </ul>
                </li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-out"></i>Admin</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                @endif

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    {{--  SEARCH--}}

    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h4>Blog Search</h4>
                <form action="../Movie/search" method="post"><!-- am actiona wata har yatawa naw xoy -->

                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search for Movies or TV Shows ... ">
                        <span class="input-group-btn">
                <button name="submit_search" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                 </button>
                </span>
                        <span>
                    <select class="form-control" name="searchby" id="">
                        <option value="">Search BY</option>
                    <option value="keyword">Keyword</option>
                    <option value="genre">Genre</option>
                    <option value="year">Year</option>
                     </select>
                </span>

                    </div>
                </form>
                <!-- /.input-group -->
            </div>
        </div>
    </div>


    <div class="row">

            {{--  MOVIE SECTION --}}
            <div class="col-md-6">
                @foreach($films as $film)
                   <h3><a href="{{ route('films.show' , $film->id)  }}">{{ $film->title }} </a> {{  $film->released_date}}</h3>
                    <img class="img-responsive" src="{{ $film->image  }}" alt="">
                    <hr>
                @endforeach
            </div>

            <div class="col-md-1">   </div>

            {{--  TV_SHOW SECTION --}}
            <div class="col-md-5">
                @foreach($tvshows as $tvshow)
                    <h3><a href="{{ route('tvshow.show'  , $tvshow->id) }}">{{  $tvshow->title }}</a></h3>
                    <img class="img-responsive" src="{{ $tvshow->image  }}" alt="">
                    <hr>
                @endforeach
            </div>

    </div>
    <!-- /.row -->
    @yield('content')
    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

  @yield('footer')

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

{{--<script src="{{asset('js/libs.js')}}"></script>--}}


</body>

</html>
