<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertSeasonRequest;
use App\Http\Requests\UpdateSeasonRequest;
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

        $the_season = SeasonOfTvShow::create($insert_season);

        $tvshow = $the_season->tvShow;
        $seasons= $tvshow->seasons;

        return view('admin.tvshow.season.index' , compact('seasons' , 'tvshow'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tvshow = TvShow::findOrFail($id);
        $tv_show_id = $tvshow->id;

        $seasons= $tvshow->seasons;

        return view('admin.tvshow.season.index' , compact('seasons' , 'tvshow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season = SeasonOfTvShow::findOrFail($id);
        $tvshows = TvShow::lists('title' , 'id')->all();
        return view('admin.tvshow.season.edit' , compact('season' , 'tvshows'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeasonRequest $request, $id)
    {
        $the_season = SeasonOfTvShow::findOrFail($id);

        $update_season = $request->all();

        if ($file = $request->file('image'))
        {
            $name = time() . $file->getClientOriginalName();
            $file-> move('images' , $name);
            $update_season['image'] =$name;
        }

        $the_season->update($update_season);

        $tvshow = $the_season->tvShow;
        $seasons= $tvshow->seasons;

        return view('admin.tvshow.season.index' , compact('seasons' , 'tvshow'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $the_season  = SeasonOfTvShow::findOrFail($id);

        $season_image = $the_season->image;

        unlink( public_path() . $season_image);

        $the_season->delete($season_image);
        $the_season->delete();

        $tvshow = $the_season->tvShow;
        $seasons= $tvshow->seasons;

        return view('admin.tvshow.season.index' , compact('seasons' , 'tvshow'));


    }
}
