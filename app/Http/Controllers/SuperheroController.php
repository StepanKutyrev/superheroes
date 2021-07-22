<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class SuperheroController extends Controller
{

    public function index()
    {
        $superheroes = Superhero::paginate(100);

        return view('index', ['superheroes' => $superheroes]);
    }

    public function edit(Superhero $superhero)
    {
        return view('edit', ['superhero' => $superhero]);
    }

    public function update(Superhero $superhero)
    {
        $this->validateForm();

        /** @var UploadedFile $file */
        $file     = request('image');
        $fileName = time() . '.' . File::extension($file->getClientOriginalName());

        $file->storeAs('/public/superheroes', $fileName);

        $superhero->update([
            'nickname'           => request('nickname'),
            'origin_description' => request('origin_description'),
            'superpowers'        => request('superpowers'),
            'catch_phrase'       => request('catch_phrase'),
            'real_name'          => request('real_name'),
            'file_name'          => $fileName,
        ]);

        return redirect()->route('superhero.index');
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $this->validateForm();

        /** @var UploadedFile $file */
        $file     = request('image');
        $fileName = time() . '.' . File::extension($file->getClientOriginalName());

        $file->storeAs('/public/superheroes', $fileName);

        Superhero::create([
            'nickname'           => request('nickname'),
            'origin_description' => request('origin_description'),
            'superpowers'        => request('superpowers'),
            'catch_phrase'       => request('catch_phrase'),
            'real_name'          => request('real_name'),
            'file_name'          => $fileName,
        ]);

        return redirect()->route('superhero.index');
    }


    public function destroy(Superhero $superhero)
    {
        dd('22');
        $superhero->delete();
        return redirect()->route('superhero.index');
    }

    private function validateForm()
    {
        request()->validate([
            'nickname'           => 'required',
            'origin_description' => 'required',
            'superpowers'        => 'required',
            'catch_phrase'       => 'required',
            'real_name'          => 'required',
            'image'              => 'required|image|mimes:jpg,png,jpeg|max:2000048',
        ]);
    }
}

