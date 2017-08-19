<?php

namespace App\Http\Controllers;

use App\DefinedGenre;
use App\Http\Requests\InsertTvRequest;
use App\ProductionCountry;
use App\TvShow;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminTvShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvshows = TvShow::all();

        return view('admin.tvshow.index' , compact('tvshows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_genres = DefinedGenre::all();
        return view('/admin/tvshow/create' , compact('all_genres' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertTvRequest $request)
    {
        $insert_tv = $request->except('country_name' ,'company_name' , 'genres');

        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $file-> move('images' , $name);
        $insert_tv['image'] = $name;
        $tvshow = TvShow::create($insert_tv);


        $insert_country['country_name'] = $request->country_name;
        $tvshow->productionCountry()->create($insert_country);

        $insert_company['company_name'] = $request->company_name;
        $tvshow->productionCompany()->create($insert_company);

        foreach ($request->genres as $insert_genre)
        {
            DB::insert("INSERT INTO genres(tv_show_id,defined_genre_id) VALUES ($tvshow->id, $insert_genre) ");
        }

        return redirect('admin/tv_show');

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
        $tvshows = TvShow::findOrFail($id);
        $genres = $tvshows->definedGenre;
        $companies = $tvshows->productionCompany;
        $countries = $tvshows->productionCountry;
        return view('admin.tvshow.edit' , compact('tvshows' , 'genres' ,  'companies' , 'countries'));
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
        $tvshow = TvShow::findOrFail($id);

        $tv_show_id = $tvshow->id;

       unlink(public_path() . $tvshow->image);

       DB::delete("DELETE FROM production_countries WHERE tv_show_id = $tv_show_id ");

        $tvshow->delete();

        return redirect('admin/tv_show');
    }
}
