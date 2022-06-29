<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Rezervacije;

class PaketController extends Controller
{
    // public function view($paket)
    // {
    //     $pieces = explode("/",url()->current());
    //     $paket = Paket::findOrFail($pieces[count($pieces)-1]);
    //     return view('paket',['paket'=>$paket]);
    // }
    public function getAll()
    {
        $paketi = Paket::all();
        $rezervacije = Rezervacije::all();
        foreach($paketi as $paket){
            $dodati = [];
            foreach($rezervacije as $rezervacija){
                if($rezervacija->paket_id == $paket->id){
                    $dodati[count($dodati)] =$rezervacija;
                }
            }
            $paket->$rezervacije = $dodati;
        }
        return response()->json($paketi,200);
    }
    public function getById($id)
    {
       $paket = Paket::find($id);
       $rezervacije = Rezervacije::all();
       if(is_null($paket)){
           return response()->json(["message"=>"Room doesn't exist",404]);
       }
       $dodati = [];
       foreach($rezervacije as $rezervacija){
           if($rezervacija->paket_id == $paket->id){
               $dodati[count($dodati)] = $rezervacija;
           }
        }
        $paket->$rezervacije=$dodati;
        return response()->json($paket,200);
    }
    public function save(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
            'tip'=>'required|min:2',
            'opis'=>'required|min:2',
            'cena'=>'required',
            'hhotel'=>'required|min:2',
            'slika'=>'required|min:2',
            'putovanje_id'=>'required',
        ]);
        
        if($validator->fails()){
            return response()->json(["message"=>"Sva polja su obavezna i moraju biti veca od 2 karaktera"],400);
        }
        $paket = Paket::create($request->all());
        return response()->json($paket,201);
    }
    public function delete(Request $request,$id){
        $paket = Paket::find($id);
        if(is_null($paket)){
            return response()->json(["message"=>"Paket ne postoji"],404);
        }
        $paket->delete();
        return response()->json(null,204);
    }
}
