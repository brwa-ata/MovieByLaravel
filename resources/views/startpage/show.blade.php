@extends('layouts.home')

@section('content')

    @if($companies && $countries && $genres  && $languages && $films)
        <div class="col-md-8">

            <h3>{{ $films->title }} {{  $films->released_date}}</h3>
            <img class="img-responsive" src="{{ $films->image  }}" alt=""><hr>
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

    @endif

@stop