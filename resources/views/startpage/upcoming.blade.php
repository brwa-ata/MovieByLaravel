@extends('layouts.home')

@section('content')


    <div class="col-md-6">
        @foreach($films as $film)
            <h3><a href="{{ route('films.show' , $film->id)  }}">{{ $film->title }} </a> {{  $film->released_date}}</h3>
            <img class="img-responsive" src="{{ $film->image  }}" alt="">
            <hr>
        @endforeach
    </div>

@stop