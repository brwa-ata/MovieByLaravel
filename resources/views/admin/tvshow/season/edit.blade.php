@extends('admin.index')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>Edit Season</h1>
        </div>
        <div class="col-md-6">
            <br><a class="btn btn-primary" href="{{ route('admin.tvshow.season.episode.show' , $season->id) }}"> See All Episodes  >> </a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-3">
            <img class="img-responsive img-rounded" src=" {{ $season->image }}" alt="">
            <br>
            {!! Form::open(['method'=>'DELETE' , 'action'=> ['AdminSeasonController@destroy' , $season->id] ])  !!}
            {{csrf_field()}}
            <div class="form-group">
                {!! Form::submit('Delete Season', ['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close()  !!}
        </div>

        <div class="col-sm-7">

            <div class="row">
                @include('includes.show_error')
            </div>

            {!! Form::model($season , ['method'=>'PATCH' , 'action'=>['AdminSeasonController@update' , $season->id] , 'files'=>true])  !!}
                {{csrf_field()}}

                <div class="form-group">
                    {!! Form::label('tv_show_id' , 'Change a TvShow you want to add a season :') !!}
                    {!! Form::select('tv_show_id' , array(''=>'Choose one') + $tvshows , null , ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('season' , 'New Season number:') !!}
                    {!! Form::text('season'  , null , ['class'=>'form-control' , 'placeholder' => 'Ex: Season 1']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('year' , 'New Year :') !!}
                    {!! Form::number('year' , null , ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image' , 'Choose a new Poster :') !!}
                    {!! Form::file('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('overview' , 'New Overview :') !!}
                    {!! Form::textarea('overview' , null , ['class'=>'form-control' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update Season', ['class'=>'btn btn-success']) !!}
                </div>

            {!! Form::close()  !!}

        </div>
    </div>
@stop