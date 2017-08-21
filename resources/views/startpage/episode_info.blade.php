@extends('layouts.home')

@section('content')

    @if($tvshows && $episodes)

        <div class="col-md-8">

            <h3>{{ $episodes->episode_number }} {{$episodes->episode_name }} </h3>
            <img class="img-responsive" src="{{ $episodes->image }}" alt="">
            <h3> Overview : </h3>
            <h4>{{ $episodes->episode_overview }}</h4>
            <h3>Revenue :  ${{ $episodes->episode_revenue != 0 ? $episodes->episode_revenue : 'Unknown' }}</h3>
            <h3>Budget :  ${{ $episodes->episode_budget}} </h3>
            <h3>Duration :  {{ $episodes->duration}} min</h3>

            <h3>Language :
                @foreach($languages as $language)
                    {{ $language->language_name  }}
                @endforeach
            </h3><hr>

            <h3>Production Company : </h3>
            <h3>
                @foreach($tvshows->productionCompany as $company)
                    , {{$company->company_name}}
                @endforeach
            </h3>

            <h3>Production Country :
                @foreach($tvshows->productionCountry as $country)
                    , {{$country->country_name}}
                @endforeach
            </h3>

            <h3>Genre  :
                @foreach($tvshows->definedGenre as $genre)
                    , {{$genre->genretype}}
                @endforeach
            </h3>

        </div>

    @endif

@stop