@if(Auth::check())

    <?php
            $exist = \App\Favorite::where('film_id' , $films->id)->where('user_id' , $user->id)->exists();
    ?>
    <div class="col-sm-2">
    @if(!$exist)

        {!! Form::open(['method'=>'POST' , 'action'=>'UserFavoriteController@store'])  !!}
            {{csrf_field()}}

            <div class="form-group">
               {!! Form::hidden('film_id' , $films->id) !!}
            </div>

            <div class="form-group">
               {!! Form::hidden('user_id' , $user->id) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Favorite', ['class'=>'btn btn-success']) !!}
            </div>

        {!! Form::close()  !!}

    @else

        <?php
           $favorite =  \App\Favorite::all()->where('film_id' , $films->id)->where('user_id' , $user->id)->first();
        ?>
            {!! Form::open(['method'=>'DELETE' , 'action'=>['UserFavoriteController@destroy' , $favorite->id]  ])  !!}
            {{csrf_field()}}

            <div class="form-group">
                {!! Form::hidden('film_id' , $films->id) !!}
            </div>

            <div class="form-group">
                {!! Form::hidden('user_id' , $user->id) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('UnFavorite', ['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close()  !!}

        @endif
    </div>



    {{--  WATCH LIST--}}


    <?php
    $exist = \App\WatchList::where('film_id' , $films->id)->where('user_id' , $user->id)->exists();
    ?>
    <div class="col-sm-2">
        @if(!$exist)
            {!! Form::open(['method'=>'POST' , 'action'=>'UserWatchlistController@store'])  !!}
            {{csrf_field()}}

            <div class="form-group">
                {!! Form::hidden('film_id' , $films->id) !!}
            </div>

            <div class="form-group">
                {!! Form::hidden('user_id' , $user->id) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('WatchList', ['class'=>'btn btn-success']) !!}
            </div>

            {!! Form::close()  !!}
        @else

            <?php
            $watchlist =  \App\WatchList::all()->where('film_id' , $films->id)->where('user_id' , $user->id)->first();
            ?>

            {!! Form::open(['method'=>'DELETE' , 'action'=>['UserWatchlistController@destroy' ,$watchlist->id]  ])  !!}
            {{csrf_field()}}

            <div class="form-group">
                {!! Form::hidden('film_id' , $films->id) !!}
            </div>

            <div class="form-group">
                {!! Form::hidden('user_id' , $user->id) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('UnWatchList', ['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close()  !!}

        @endif
    </div>


@endif