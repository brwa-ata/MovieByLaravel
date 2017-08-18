@extends('admin.index')

@section('content')

    <h1>Edit Film</h1>

    @if($films)
        <div class="col-sm-4">
            <img class="img-responsive img-rounded" src="{{ $films->image ? $films->image : '/images/placeholder.jpg'  }}" alt="">
        </div>

        <div class="col-sm-8">
            {!! Form::model($films , ['method'=>'PATCH' , 'action'=> ['AdminFilmController@update' , $films->id ], 'files'=>true])  !!}
                {{csrf_field()}}

                <div class="form-group">
                   {!! Form::label('title' , 'New Title:') !!}
                   {!! Form::text('title' , null , ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                       {!! Form::label('released_date' , 'New Date:') !!}
                       {!! Form::date('released_date' , null , ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                       {!! Form::label('revenue' , 'New Revenue:') !!}
                       {!! Form::number('revenue' , null , ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                       {!! Form::label('budget' , 'New Budget:') !!}
                       {!! Form::number('budget' , null , ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                           {!! Form::label('image' , 'New Poster:') !!}
                           {!! Form::file('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('overview' , 'New Overview:') !!}
                    {!! Form::textarea('overview' , null , ['class'=>'form-control' , 'rows' => 4]) !!}
                </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::submit('Update Film', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close()  !!}
                </div>


                {{-- DELETE FILM  --}}
                <div class="col-md-6">
                    {!! Form::open(['method'=>'DELETE' , 'action'=> ['AdminFilmController@destroy' , $films->id] , 'class' => 'pull-right'])  !!}
                    {{csrf_field()}}
                    <div class="form-group">
                        {!! Form::submit('Delete Film', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close()  !!}
                </div>
            </div>


            {!! Form::close()  !!}
        </div>

    @endif

@stop