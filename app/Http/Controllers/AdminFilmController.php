<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;

class AdminFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();


        return view('admin.film.index' , compact('films'));
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
    public function store(Request $request)
    {
        //
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
        $films = Film::findOrFail($id);
        $genres = $films->definedGenre;
        $languages = $films->language;
        $companies = $films->productionCompany;
        $countries = $films->productionCountry;

        return view('admin.film.edit' , compact('films' , 'genres' , 'languages' ,  'companies' , 'countries'));

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
        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::findOrFail($id);

//        unlink(public_path() . $film->image);

        $film->delete();

        return redirect('/admin/film');
    }
}
