@extends('layouts.home')

@section('content')

    @if($seasons)
        <div class="col-md-8">

            @foreach($seasons as $season)

                <h3>{{ $season->season }} {{ $season->year}}</h3>
                <a href="{{ route('episode_of_season.show', $season->id) }}"><img src="{{ $season->image }}" alt=""></a>
                <h4> {{ $season->overview }} </h4>
                <hr>

            @endforeach

        </div>
    @endif

@stop