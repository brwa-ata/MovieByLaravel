@extends('admin.index')

@section('content')

    <h1>Films</h1>

    @if($films)

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>FilmTitle</th>
                    <th>ReleasedDate</th>
                    <th>Revenue</th>
                    <th>Budget</th>
                    <th>Duration</th>
                    <th>Views</th>
                    <th>Genre</th>
                    <th>Language</th>
                    <th>Company</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>

                @foreach($films as $film)
                    <tr>

                        <td><a href="{{ route('admin.film.edit' , $film->id) }}">{{$film->title}}</a></td>
                        <td>{{$film->released_date}}</td>
                        <td>{{$film->revenue}}</td>
                        <td>{{$film->budget}}</td>
                        <td>{{$film->duration}}</td>
                        <td>{{$film->popularity}}</td>

                        {{-- GENRE --}}
                        <td>
                                <table>
                                    <?php
                                        $the_film = App\Film::findOrFail($film->id);
                                        $genres = $the_film->definedGenre;
                                        $languages = $the_film->language->take(2);
                                        $companies = $the_film->productionCompany->take(1);
                                        $countries = $the_film->productionCountry->take(1);
                                    ?>
                                    <tr>
                                        @foreach($genres as $genre)
                                            <td>{{$genre->genretype}},</td>
                                        @endforeach
                                    </tr>
                                </table>
                        </td>


                        {{-- LANGUAGE --}}
                        <td>
                            <table>
                                <tr>
                                    @foreach($languages as $language)
                                        <td> {{ $language->language_name}}, </td>
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
        </table>

    @endif

@stop