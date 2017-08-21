@extends('layouts.home')

@section('content')


    <div class="col-md-6">
        @if($films->count() > 0)
            @foreach($films as $film)
                <h3><a href="{{ route('films.show' , $film->id)  }}">{{ $film->title }} </a> {{  $film->released_date}}</h3>
                <img class="img-responsive" src="{{ $film->image  }}" alt="">
                <hr>
            @endforeach

        @else

            <h1 class="text-warning text-nowrap">
                There is no Film that playing during this week
            </h1>

        @endif
    </div>

@stop