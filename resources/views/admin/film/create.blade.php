@extends('admin.index')

@section('content')

    <h1>Add a Film</h1>

    <div class="row">
            @include('includes.show_error')
    </div>

    {!! Form::open(['method'=>'POST' , 'action'=>'AdminFilmController@store' , 'files'=>true])  !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('title' , 'Title:') !!}
            {!! Form::text('title' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('released_date' , 'Date:') !!}
            {!! Form::date('released_date' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('revenue' , 'Revenue:') !!}
            {!! Form::number('revenue' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('budget' , 'Budget:') !!}
            {!! Form::number('budget' , null , ['class'=>'form-control']) !!}
        </div>

        {{--<hr>--}}
          {{--LANGUAGE--}}
        <div class="form-group">
            {!! Form::label('language_name' , 'Language :') !!}
            {!! Form::text('language_name' , null , ['class'=>'form-control']) !!}
        </div>


          {{--COUNTRY--}}
        <div class="form-group">
            {!! Form::label('country_name' , 'Production Country :') !!}
            {!! Form::text('country_name' , null , ['class'=>'form-control' , 'placeholder' => 'Add a country'] ) !!}
        </div>



          {{--COMPANY--}}
        <div class="form-group">
            {!! Form::label('company_name' , 'Production Company :') !!}
            {!! Form::text('company_name' , null , ['class'=>'form-control' , 'placeholder' => 'Add a company'] ) !!}
        </div>
        <div class="form-group">
            {!! Form::text('company_name' , null , ['class'=>'form-control '  , 'placeholder' => 'Add another company']) !!}
        </div>

        {{--  FILLM GENRE --}}
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Check</th>
                <th>Genre</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_genres as $genre)
                <tr>
                    <td><label>
                            <input  type="checkbox" name="genres[]" value="{{ $genre->id }}">
                        </label></td>
                    <td>{{ $genre->genretype }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="form-group">
            {!! Form::label('image' , 'Poster:') !!}
            {!! Form::file('image') !!}
        </div>


        <div class="form-group">
            {!! Form::label('overview' , 'Overview:') !!}
            {!! Form::textarea('overview' , null , ['class'=>'form-control' , 'rows' => 4]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Film', ['class'=>'btn btn-success']) !!}
        </div>

    {!! Form::close()  !!}

@stop