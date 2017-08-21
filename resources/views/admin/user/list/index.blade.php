@extends('admin.index')

@section('content')

    <div class="row">
        @if(!isset($_GET['create_list']))
            <div class="col-sm-6">
                <h1>{{ \Illuminate\Support\Facades\Auth::user()->name }}'s Lists</h1>
            </div>

        @else
            <div class="col-sm-6">
                <h1>Create List</h1>
            </div>
        @endif

        @if(!isset($_GET['create_list']))
        <div class="col sm-">
            <br>
            <form action="" method="get">
                <input class="btn btn-success"  type="submit" name="create_list" value="Create List">
            </form>
        </div>
        @endif

    </div>

    {{--  CREATE A LIST --}}
    @if(isset($_GET['create_list']))

        <div class="col-sm-6">

            @include('includes.show_error')

            {!! Form::open(['method'=>'POST' , 'action'=>'UserListController@store' , 'files'=>true])  !!}
                {{csrf_field()}}

                <div class="form-group">
                   {!! Form::label('listname' , 'List Name:') !!}
                   {!! Form::text('listname' , null , ['class'=>'form-control']) !!}
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th >Choose from Films</th>
                        </tr>
                        <tr>
                            <th>Check</th>
                            <th>Films</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $film)
                            <tr>
                                <td style="width: 15%"><input  type="checkbox" name="films[]" value="{{ $film->id }}"></td>
                                <td>{{ $film->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <hr>

            <div class="form-group">
               {!! Form::label('list_image' , 'Choose an image for your list:') !!}
               {!! Form::file('list_image') !!}
            </div>
            <br>
                <div class="form-group">
                    {!! Form::submit('Create List', ['class'=>'btn btn-success']) !!}
                </div>

            {!! Form::close()  !!}
        </div>

        {{--  END OF CREATE A LIST --}}

    @else

        {{-- SHOW LISTS --}}

        <hr>
        <div class="col-sm-6">



            @foreach($lists as $list)


                {!! Form::open(['method'=>'GET' , 'action'=>['UserListController@show' , $list->listname] ])  !!}

                <div class="row"><h3>{{$list->listname}}</h3></div>
                <img class="img-rounded" src="{{ $list->list_image }}" alt="">

                <div class="form-group">
                    {!! Form::submit('View Films', ['class'=>'btn btn navbar-btn']) !!}
                </div>

                {!! Form::close()  !!}

                {{--  DELETE A LIST --}}
                {!! Form::open(['method'=>'DELETE' , 'action'=>['UserListController@destroy' , $list->listname] ])  !!}

                    <div class="form-group">
                        {!! Form::submit('Delete List', ['class'=>'btn btn-danger']) !!}
                    </div>
                {!! Form::close()  !!}

                <hr>
            @endforeach

        </div>

    @endif

@stop