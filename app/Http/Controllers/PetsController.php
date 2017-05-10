<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pet;
use Log;

class PetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' =>  ['index', 'show']]);
    }

    public function index()
    {
        // TODO: uncomment when auth is implemented
        // $pets = Pet::with('user')->where('owner_id', '=', \Auth::id())->paginate(4);
        // TODO: remove this, hardcoded id for now

        if(\Auth::User()->user_type == 'owner') {
            $pets = Pet::with('user')->where('owner_id', '=', \Auth::id())->paginate(4);
            $data = [];
            $data['pets'] = $pets;
            return view('pets.index')->with($data);  
        } elseif (\Auth::User()->user_type == 'vet') {
            $pets = Pet::with('user')->where('vet_id', '=', \Auth::id())->paginate(4);
            $data = [];
            $data['pets'] = $pets;
            return view('pets.index')->with($data);
            
        }

    }

    public function create(Request $request)
    {
        return view('pets.create');
    }


    public function store(Request $request)
    {
        $pets = new Pet;
        $pets->name = $request->name;
        $pets->species = $request->species;
        $pets->breed = $request->breed;
        $pets->sex = $request->sex;
        $pets->age = $request->age;
        $pets->save();

        $request->session()->flash('successMessage', 'Pet Saved Successfully');
        return redirect()->action('PetsController@show', [$pets->id]);
    }


    public function show(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);

        return view('pets.show', ['pet' => $pet]);
    }


    public function edit(Request $request, $id)
    {
        $pet = Pet::find($id);

        if(!$pet) {
            Log::info('Cannot Edit Pet Information');
            $request->session()->flash('errorMessage', 'Pet cannot be found');
            abort(404);
        }

        if(\Auth::id() != $pet->vet_id) {
            abort(403);
        }
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);
        if(!$pet) {
            Log::info('Cannot Add Pet Information');
            $request->session()->flash('errorMessage', 'Pet cannot be found');
            abort(404);
        }

        $pets->name = $request->name;
        $pets->species = $request->species;
        $pets->breed = $request->breed;
        $pets->sex = $request->sex;
        $pets->age = $request->age;
        $request->session()->flash('successMessage', 'Pet Information Saved Succesfully');
        return redirect()->action('PetsController@show', [$pet->id]);

    }


    public function destroy(Request $request, $id)
    {
        $pet = Pet::find($id);

        if(!$pet) {
            Log::info("Cannot Delete Pet $id");
            $request->session()->flash('errorMessage', 'Pet cannot be found');
            abort(404);
        }
        if(\Auth::id() != $pet->vet_id) {
            abort(403);
        }

        $pet->delete();

        return redirect()->action('PetsController@index');
    }
}
