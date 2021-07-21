<?php

namespace App\Http\Controllers;


use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
//    public function show($id)
//    {
//        $superhero = Superhero::findOrFail($id);
//        return new SuperheroResource($superhero);
//    }

    public function index()
    {

       $superheroes =Superhero::paginate(5);
       return view ('index' , ['superheroes' => $superheroes]);
    }

    public function edit( Superhero $superhero )
    {
        return view('edit' , ['superhero' => $superhero]);
    }

    public function update(Superhero $superhero )
    {
        request()->validate([
            'nickname'=>'required',
            'origin_description'=>'required',
            'superpowers'=>'required',
            'catch_phrase'=>'required',
        ]);
        $superhero->update([
            'nickname'=>request('nickname'),
            'origin_description'=>request('origin_description'),
            'superpowers'=>request('superpowers'),
            'catch_phrase'=>request('catch_phrase'),
         ]);
      return redirect('/');
    }

    public function create(){
        return view ('create');
    }

    public function store(Request $request){
        request()->validate([
            'nickname'=>'required',
            'origin_description'=>'required',
            'superpowers'=>'required',
            'catch_phrase'=>'required',
        ]);

        Superhero::create([
            'nickname'=>request('nickname'),
            'origin_description'=>request('origin_description'),
            'superpowers'=>request('superpowers'),
            'catch_phrase'=>request('catch_phrase'),
        ]);
        dd($request->file());
        return redirect('/post');
    }



    public function destroy(Superhero $superhero)
    {
        $superhero ->delete();
        return redirect('/');

    }
}

