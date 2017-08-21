@extends('layouts.home')

@section('content')

    <div class="col-md-6">
        @if($tvshows->count() > 0)

            @foreach($tvshows as $tvshow)

                <h3><a href="{{ route('tvshow.show'  , $tvshow->id) }}"> {{  $tvshow->title }}</a></h3>
                <img class="img-responsive" src="{{ $tvshow->image  }}" alt="">
                <hr>

            @endforeach

        @else
            <h1 class="text-warning text-nowrap">No Popular Tv Show</h1>
        @endif

    </div>

@stop