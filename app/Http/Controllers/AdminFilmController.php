<?php

namespace App\Http\Controllers;

use App\DefinedGenre;
use App\Film;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\InsertFilmRequest;
use App\ProductionCountry;
use App\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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
        $all_genres = DefinedGenre::all();
        return view('/admin/film/create' , compact('all_genres' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertFilmRequest $request)
    {

        $insert_film = $request->except('language_name', 'country_name', 'company_name', 'genres');

        $file = $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $file-> move('images' , $name);
        $insert_film['image'] = $name;
        $film = Film::create($insert_film);

        $insert_country['country_name'] = $request->country_name;
        $film->productionCountry()->create($insert_country);

        $insert_company['company_name'] = $request->company_name;
        $film->productionCompany()->create($insert_company);

        $insert_language['language_name'] = $request->language_name;
        $film->language()->create($insert_language);


        foreach ($request->genres as $insert_genre)
        {
            DB::insert("INSERT INTO genres(film_id,defined_genre_id) VALUES ($film->id, $insert_genre)");
        }

        return redirect('admin/film');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(FilmRequest $request, $id)
    {
        $the_film = Film::findOrFail($id);

//        $update_film = $request->except('language_name', 'country_name', 'company_name', 'genres');
//
//        $the_film->update($update_film);

//        $update_country = $request->country_name;
//        $country_id = $request->country_id;
//
//
//
//        foreach ($update_country as $country)
//        {
//            foreach ($country_id as $id)
//            {
//                DB::update('UPDATE production_countries SET country_name ='. $country.' WHERE id ='.$id .' ');
//            }
//
//        }

//                  return redirect('/admin/film/');



//        $update_company = $request->company_name;
//        $update_genre = $request->genres;
//        $update_language = $request->language_name;






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
