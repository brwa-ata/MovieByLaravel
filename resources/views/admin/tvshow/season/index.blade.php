@extends('admin.index')

@section('content')

    <h1>Seasons of <a href="{{ route('admin.tv_show.edit' , $tvshow->id) }}">{{ $tvshow->title }} </a> </h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>SeasonNumber</th>
                <th>Year</th>
                <th>Poster</th>
                <th>Number of Episode</th>
            </tr>
        </thead>
        @if($seasons)
            <tbody>
                @foreach($seasons as $season)
                    <tr>
                        <td><a href="{{ route('admin.tvshow.season.edit' , $season->id) }}">{{$season->season}}</a></td>
                        <td>{{$season->year}}</td>
                        <td><img class="img-responsive img-rounded" width="30%" src="{{$season->image}}" alt=""></td>

                        {{--  GET THE NUMBER OF EPISODE --}}
                        <td>
                            <?php
                                $the_season = \App\SeasonOfTvShow::findOrFail($season->id);
                                $episode = $the_season->episodes;
                                $episode_number = $episode->count();
                            ?>
                            @if($episode_number != 0)
                                <a href="">{{ $episode_number }}</a>
                            @else
                                    {{ $episode_number }}
                            @endif
                        </td>


                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>

@stop