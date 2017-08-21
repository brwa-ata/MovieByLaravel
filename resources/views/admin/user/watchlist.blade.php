@extends('admin.index')

@section('content')

    <h1>Favorites</h1>

    <div class="col-sm-10">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Film Title</th>
                <th>Poster</th>
                <th>Added to watchlist at</th>
            </tr>
            </thead>
            @foreach($watchlists as $watchlist)
                <tbody>
                <?php $film = \App\Film::findOrFail($watchlist->film_id ); ?>
                <tr>
                    <td width="30%"><a href="{{ route('films.show' , $film->id)  }}">{{ $film->title }}</a></td>
                    <td><img class="img-responsive img-rounded" width="50%" src="{{ $film->image }}" alt=""></td>
                    <td width="20%">{{ $watchlist->created_at->diffForHumans() }}</td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>

@stop