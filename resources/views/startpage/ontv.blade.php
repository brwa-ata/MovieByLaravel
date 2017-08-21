@extends('layouts.home')

@section('content')

    <div class="col-md-6">
        @if($episodes->count() > 0)

            @foreach($episodes as $episode)

                <h3>{{ $episode->episode_name }}  {{ $episode->released_date}}</h3>
                <a href="{{ route('episode.show' , $episode->id) }}"> <img class="img-responsive" src="{{ $episode->image }}" alt=""> </a>
                <h4> {{ $episode->episode_overview }} </h4>
                <hr>

            @endforeach

        @else
            <h1 class="text-warning text-nowrap">No OnTv Episode</h1>
        @endif

    </div>

@stop