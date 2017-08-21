@extends('admin.index')

@section('content')

    <h1>Favorites</h1>

    <div class="col-sm-10">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Film Title</th>
                    <th>Poster</th>
                    <th>Favorited at</th>
                </tr>
            </thead>
            @foreach($favorites as $favorite)
            <tbody>
                <?php $film = \App\Film::findOrFail($favorite->film_id ); ?>
                <tr>
                    <td width="30%"><a href="">{{ $film->title }}</a></td>
                    <td><img class="img-responsive img-rounded" width="50%" src="{{ $film->image }}" alt=""></td>
                    <td width="20%">{{ $favorite->created_at->diffForHumans() }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

@stop