<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rezervacije;
class RezervacijeController extends Controller
{
    public function getAll(){
        return response()->json(Rezervacije::all(),200);

    }
    public function getById($id){
        $rezervacija=Rezervacije::find($id);
        if(is_null($rezervacija)){
            return response()->json(["message"=>"Rezervacija ne postoji"],404);
        }
        return response()->json($rezervacija,200);
    }
    public function save(Request $request){

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'ime'=>'required|min:2',
            'prezime'=>'required|min:2',
            'broj_osoba'=>'required',
            'paket_id'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>"Sva polja su obavezna i moraju biti duza od 2 karaktera"],400);
        }
        $rezervacija= Rezervacije::create($request->all());
        return response()->json($rezervacija, 201);
    }
    public function delete(Request $request, $id){
        $rezervacija= Rezervacije::find($id);

        if(is_null($rezervacija)){
            return response()->json(["message"=>"Rezervacija ne postoji"],404);
        }
        $rezervacija->delete();
        return response()->json(null,204);
    }
    public function create(Request $request){
        $rezervacija= new Rezervacije();
        $rezervacija->ime=$request->ime;
        $rezervacija->prezime=$request->prezime;
        $rezervacija->broj_osoba=$request->broj_osoba;
        $rezervacija->paket_id=$request->paket_id;

        $rezervacija->save();
        return redirect('/'.$request->id);
    }
}
