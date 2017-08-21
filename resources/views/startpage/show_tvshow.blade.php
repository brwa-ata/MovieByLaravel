@extends('layouts.home')

@section('content')

    @if($tvshows)

        <?php
            $tvshows->increment('popularity');
        ?>

        <div class="col-md-8">

            <h3>{{  $tvshows->title }}</h3>
            <img class="img-responsive" src="{{ $tvshows->image  }}" alt="">
            <h3>Overview : <br>{{ $tvshows->overview  }}</h3>
            <a class="btn btn-primary" href="{{ route('season_of_tvshow.show' , $tvshows->id) }}">Seasons >></a>
            <hr>

        </div>
    @endif

@stop