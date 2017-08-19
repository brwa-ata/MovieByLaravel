@extends('admin.index')

@section('content')

    <div class="col-sm-8">
        <h1> Create a Season</h1>
        <hr>
        <div class="row"> @include('includes.show_error') </div>
        {!! Form::open(['method'=>'POST' , 'action'=>'AdminSeasonController@store' , 'files'=>true])  !!}
            {{csrf_field()}}

            <div class="form-group">
               {!! Form::label('tv_show_id' , 'Choose a TvShow you want to add a season :') !!}
               {!! Form::select('tv_show_id' , array(''=>'Choose one') + $tvshows , null , ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                   {!! Form::label('season' , 'Season number:') !!}
                   {!! Form::text('season'  , null , ['class'=>'form-control' , 'placeholder' => 'Ex: Season 1']) !!}
            </div>

            <div class="form-group">
                   {!! Form::label('year' , 'Year :') !!}
                   {!! Form::number('year' , null , ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                   {!! Form::label('image' , 'Choose a Poster :') !!}
                   {!! Form::file('image') !!}
            </div>

            <div class="form-group">
                   {!! Form::label('overview' , 'Overview :') !!}
                   {!! Form::textarea('overview' , null , ['class'=>'form-control' , 'rows' => 4]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Season', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close()  !!}

    </div>

@stop