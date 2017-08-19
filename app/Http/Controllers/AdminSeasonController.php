<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertSeasonRequest;
use App\SeasonOfTvShow;
use App\TvShow;
use Illuminate\Http\Request;

use App\Http\Requests;
use function Sodium\compare;

class AdminSeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tv_id)
    {
//        $seasons = SeasonOfTvShow::all()->whereId( $tv_id);
//
//        dd( $seasons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tvshows = TvShow::lists('title' , 'id')->all();

        return view('/admin/tvshow/season/create' , compact('tvshows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertSeasonRequest $request)
    {
        $insert_season = $request->all();

        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $file->move('images' , $name);
        $insert_season['image'] = $name;

        SeasonOfTvShow::create($insert_season);

        return redirect('/admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
