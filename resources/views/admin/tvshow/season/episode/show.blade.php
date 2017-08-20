@extends('admin.index')

@section('content')

    <h1>Episode of
        <a href="{{ route('admin.tvshow.season.edit' , $seasons->id) }}">{{ $seasons->season }}</a> of
        <a href="{{ route('admin.tv_show.edit' , $tvshows->id) }}">{{ $tvshows->title }}</a>
    </h1>
    <hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>EpisodeNumber</th>
                <th>Date</th>
                <th>Duration</th>
                <th>Revenue</th>
                <th>Budget</th>
                <th>Genre</th>
                <th>Company</th>
                <th>Country</th>
            </tr>
        </thead>
        @if($episodes)
            <tbody>
            @foreach($episodes as $episode)
                <tr>
                    <td><a href="">{{ $episode->episode_name }}</a></td>
                    <td>{{$episode->episode_number}}</td>
                    <td>{{$episode->released_date}}</td>
                    <td>{{$episode->duration}} min</td>
                    <td>${{$episode->episode_revenue}} million</td>
                    <td>${{$episode->episode_budget}}</td>

                    {{-- GENRE --}}
                    <td>
                        @foreach($tvshows->definedGenre->take(2) as $genre)
                             {{$genre->genretype}}
                        @endforeach ...
                    </td>

                    {{-- COMPANY --}}
                    <td>
                    @foreach($tvshows->productionCompany->take(2) as $company)
                             {{$company->company_name}}
                        @endforeach ...
                    </td>

                    {{-- COUNTRY --}}
                    <td>
                    @foreach($tvshows->productionCountry as $country)
                     {{$country->country_name}}
                    @endforeach
                    </td>

                </tr>
            @endforeach
            </tbody>
        @endif
    </table>

@stop