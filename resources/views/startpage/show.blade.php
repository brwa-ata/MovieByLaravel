@extends('layouts.home')

@section('content')

    @if($companies && $countries && $genres  && $languages && $films)

        <?php
                $films->increment('popularity');
        ?>

        <div class="col-md-8">

            <h3>{{ $films->title }} {{  $films->released_date}}</h3>
            <img class="img-responsive" src="{{ $films->image  }}" alt=""><hr>

            @include('includes.favorite_and_watchlist')

            @include('includes.rating')

        </div>
        <div class="col-md-8">
            <hr>
            <h3> Overview :   {{ $films->overview  }}</h3><hr>
            <h3> Revenue :   ${{ $films->revenue  }} million</h3><hr>
            <h3> Budget : ${{ $films->budget  }}</h3><hr>
            <h3> Duration : {{ $films->duration  }} min</h3><hr>

            <h3>Production Company :
                @foreach($companies as $company)
                    {{ $company->company_name  }} ,
                @endforeach
            </h3><hr>

            <h3>Production Country :
                @foreach($countries as $country)
                    {{ $country->country_name  }} ,
                @endforeach
            </h3><hr>

            <h3>Language :
                @foreach($languages as $language)
                    {{ $language->language_name  }}
                @endforeach
            </h3><hr>

            <h3>Genre :
                @foreach($genres as $genre)
                    {{ $genre->genretype  }} ,
                @endforeach
            </h3><hr>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <h3 class="text-center">Backdrops</h3>
                @foreach($backdrops as  $backdrop)
                    <img class="img-responsive" src="{{ $backdrop->film_backdrop }}" alt="">
                @endforeach
            </div>

            <div class="col-sm-5">
                <h3>Posters</h3>
                @foreach($posters as  $poster)
                    <img class="img-responsive" src="{{ $poster->film_poster }}" alt="">
                @endforeach
            </div>
        </div>

    @endif

@stop