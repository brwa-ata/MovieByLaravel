@extends('admin.index')

@section('content')

    <h1>Create an Episode</h1>
    <hr>

    <div class="col-sm-8">

    <form action="" method="get">
        <label for="tvshow">Choose a Tv Show</label>
        <select class="form-control" name="tvshow" id="tvshow">
            @foreach($tvshows as $tvshow)
                <option value="<?php echo $tvshow->id ?>"> <?php echo $tvshow->title ?> </option>
            @endforeach
        </select>
        <br>
        <input class="btn btn-primary" type="submit" name="load_season" value="Load Season">
        <br>
    </form>
        <br>
        @include('includes.show_error')

        {!! Form::open(['method'=>'POST' , 'action'=>'AdminEpisodeController@store' , 'files'=>true])  !!}
            {{csrf_field()}}

        {{-- GET THE TV SHOW SEASON --}}
    <?php
        if (isset($_GET['load_season']))
        {
                $tvshow = $_GET['tvshow'];
                $the_tvshow = \App\TvShow::findOrFail($tvshow);
                $seasons = $the_tvshow->seasons;
    ?>

        <div class="form-group">
            <label for="season">Choose a Season : </label>
            <select class="form-control" name="season_of_tv_show_id" id="season">
                @if($seasons->count() > 0)
                    <?php
                        foreach ($seasons as $season)
                        {
                    ?>
                            <option value="<?php echo $season->id; ?>">
                                <?php echo $season->season; ?>
                            </option>
                    <?php
                        }
                    ?>
            </select>
        </div>

        {{-- END OF GET THE TV SHOW SEASON --}}
        <div class="form-group">
            {!! Form::label('episode_name' , 'Episode Name:') !!}
            {!! Form::text('episode_name' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('episode_number' , 'Episode Number:') !!}
            {!! Form::text('episode_number' , null , ['class'=>'form-control' , 'placeholder' => 'Ex: Episode 1']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('language_name' , 'Language :') !!}
            {!! Form::text('language_name' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('released_date' , 'Released Date:') !!}
            {!! Form::date('released_date' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('episode_revenue' , 'Revenue:') !!}
            {!! Form::number('episode_revenue' , null , ['class'=>'form-control' , 'placeholder' => 'Ex: 66 ']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('episode_budget' , 'Budget:') !!}
            {!! Form::number('episode_budget' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('duration' , 'Duration :') !!}
            {!! Form::number('duration' , null , ['class'=>'form-control' , 'placeholder' => 'duration in minute']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image' , 'Choose a Poster :') !!}
            {!! Form::file('image') !!}
        </div>

        <div class="form-group">
            {!! Form::label('episode_overview' , 'Overview :') !!}
            {!! Form::textarea('episode_overview' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Episode', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close()  !!}
        @endif
    <?php
        }
    ?>

    </div>
@stop