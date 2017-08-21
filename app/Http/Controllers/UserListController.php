<?php

namespace App\Http\Controllers;

use App\EpisodeOfSeason;
use App\Film;
use App\Http\Requests\CreateListRequest;
use App\UserList;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $lists = UserList::where('user_id' , $user_id)->groupBy('listname')->get();



        $films = Film::all();

        return view('admin.user.list.index' , compact('films' , 'lists'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateListRequest $request)
    {
        $listname = $request->listname;

        $user = Auth::user();
        $user_id = $user->id;
        $films = $request->films;

        if ($file =$request->file('list_image') )
        {
            $file = $request->file('list_image');
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            foreach ($films as $film_id)
            {
                DB::insert("INSERT INTO user_lists (listname , user_id , film_id , list_image) VALUES ('$listname' , $user_id , $film_id , '$name')");
            }
        }
        else
        {
            foreach ($films as $film_id)
            {
                DB::insert("INSERT INTO user_lists (listname , user_id , film_id) VALUES ('$listname' , $user_id , $film_id)");
            }
        }






        $lists = UserList::where('user_id' , $user_id)->groupBy('listname')->get();

        return view('admin.user.list.index' , compact('films' , 'lists'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lists = UserList::where('listname' , $id)->get();

        return view('admin.user.list.show' , compact('lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
