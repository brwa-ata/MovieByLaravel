@extends('layouts.home')

@section('content')

    @if($episodes)

        @foreach($episodes as $episode)


        <div class="col-md-7">

            <h3>{{ $episode->episode_name }}  {{ $episode->released_date}}</h3>
            <a href="{{ route('episode.show' , $episode->id) }}"> <img class="img-responsive" width="70%" src="{{ $episode->image }}" alt=""> </a>
            <h4> {{ $episode->episode_overview }} </h4>
            <hr>
        </div>

        @endforeach

    @endif

@stop