@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Edit TvShow</h1>
        </div>
        <div class="col-md-6">
            <br><a class="btn btn-primary" href="{{ route('admin.tvshow.season.show' , $tvshows->id) }}"> See All Seasons  >> </a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-4">
            <img class="img-responsive img-rounded" src=" {{ $tvshows->image }}" alt="">
            <br>
                {!! Form::open(['method'=>'DELETE' , 'action'=> ['AdminTvShowController@destroy' , $tvshows->id] ])  !!}
                {{csrf_field()}}
                <div class="form-group">
                    {!! Form::submit('Delete TvShow', ['class'=>'btn btn-danger']) !!}
                 </div>
                {!! Form::close()  !!}

        </div>

        <div class="col-sm-7">
            {!! Form::model($tvshows , ['method'=>'PATCH' , 'action'=>['AdminTvShowController@update' , $tvshows->id] , 'files'=>true])  !!}
                {{csrf_field()}}
                <div class="form-group">
                    {!! Form::label('title' , 'New Title:') !!}
                    {!! Form::text('title' , null , ['class'=>'form-control']) !!}
                </div>

                {{--  COUNTRY--}}
                <div class="form-group">
                    {!! Form::label('country_name' , 'New Country:') !!}
                    @foreach($countries as $country)
                        {!! Form::text('country_name[ country_name ]' , $country->country_name, ['class'=>'form-control']) !!}
                        {{--{!! Form::hidden('country_id[]' , $country->id, ['class'=>'form-control']) !!}--}}
                    @endforeach
                </div>

                {{--  COMPANY--}}
                <div class="form-group">
                    {!! Form::label('company_name' , 'New Company:') !!}
                    @foreach($companies as $company)
                        {!! Form::text('company_name[]' , $company->company_name, ['class'=>'form-control']) !!}
                    @endforeach
                </div>

                <hr>
                {{--  FILLM GENRE --}}
                <table class="table table-hover">
                    <thead>
                    <th class="text-center"><h3>Film's Genre</h3></th>
                    <tr>
                        @foreach($genres as $genre)
                            <td><strong>{{ $genre->genretype }}</strong></td>
                        @endforeach
                    </tr>
                    <th class="text-center"><h3>New Genre</h3></th>
                    <tr>
                        <th>Check</th>
                        <th>Genre</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $all_genres = \App\DefinedGenre::all(); ?> {{-- GET ALL GENRES --}}
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
                    {!! Form::label('image' , 'New Poster:') !!}
                    {!! Form::file('image') !!}
                </div>


                <div class="form-group">
                    {!! Form::label('overview' , 'New Overview:') !!}
                    {!! Form::textarea('overview' , null , ['class'=>'form-control' , 'rows' => 5]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update TvShow', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close()  !!}
        </div>

    </div>
@stop