@extends('admin.index')

@section('content')
    <h1>TvShow</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Poster</th>
                <th>Genre</th>
                <th>ProductionCompany</th>
                <th>ProductionCountry</th>
            </tr>
        </thead>
        @if($tvshows)
            <tbody>
                @foreach($tvshows as  $tvshow)
                    <tr>
                        <td>{{ $tvshow->title }}</td>
                        <td><img class="img-responsive" width="50%" src="{{ $tvshow->image }}" alt=""></td>

                        {{-- GENRE --}}
                        <td>
                            <table>
                                <?php
                                    $the_tvshow = \App\TvShow::findOrFail($tvshow->id);
                                    $genres = $the_tvshow->definedGenre->take(2);
                                    $companies = $the_tvshow->productionCompany->take(1);
                                    $countries = $the_tvshow->productionCountry->take(1);
                                ?>
                                <tr>
                                    @foreach($genres as $genre)
                                        <td>{{$genre->genretype}},</td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>


                        {{-- COMPANY --}}
                        <td>
                            <table>
                                <tr>
                                    @foreach($companies as $company)
                                        <td> {{ $company->company_name}} </td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>


                        {{-- COUNTRY --}}
                        <td>
                            <table>
                                <tr>
                                    @foreach($countries as $country)
                                        <td> {{ $country->country_name}} </td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
@stop