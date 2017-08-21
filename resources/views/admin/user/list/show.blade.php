@extends('admin.index')

@section('content')

    <h1>Content of Your List</h1>

    <div class="col-sm-8">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Film</th>
                <th>Poster</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lists as $list)
                <?php $film = \App\Film::findOrFail($list->film_id); ?>
            <tr>
                <td width="50%" class="text-center" ><h4>{{ $film->title }}</h4></td>
                <td><img  class="img-responsive img-rounded" src="{{ $film->image }}" alt=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@stop