@extends('admin.index')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" class="css">

@stop

@section('content')


    {!! Form::open(['method'=>'POST' , 'action'=>'EpisodePosterController@store' , 'class' => 'dropzone'])  !!}
        {{csrf_field()}}
        <div class="form-group">
           {!! Form::label('film_id' , 'Choose a Film:') !!}
           {!! Form::select('film_id' , array() + $films , null , ['class'=>'form-control']) !!}
        </div>

    {!! Form::close() !!}

@stop

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
