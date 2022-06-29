<?php

namespace App\Http\Controllers;

use App\Http\Resources\PutovanjaResource;
use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Putovanja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class PutovanjeController extends Controller
{
    public function getAll()
    {
        $putovanja = Putovanja::all();
        $paketi = Paket::all();
        foreach ($putovanja as $putovanje) {
            $dodati = [];
            foreach ($paketi as $paket) {
                if ($paket->putovanje_id == $putovanje->id) {
                    $dodati[count($dodati)] = $paket;
                }
            }

            $putovanje->paketi = $dodati;
        }

        return response()->json($putovanja, 200);
    }
    public function getById($id)
    {
        $putovanje = Putovanja::find($id);
        $paketi = Paket::all();
        if (is_null($putovanje)) {
            return response()->json(["message" => "Hotel doesn't exist"], 404);
        }
        $dodati = [];
        foreach ($paketi as $paket) {
            if ($paket->putovanje_id == $putovanje->id) {
                $dodati[count($dodati)] = $paket;
            }
        }

        $putovanje->paketi = $dodati;
        return response()->json($putovanje,200);
    }
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'destinacija' => 'required',
            'trajanje' => 'required',
            'opis' => 'required',
            'slika' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => "Sva polja su obavezna i moraju biti duza od 2 karaktera"], 400);
        }
        $putovanje = Putovanja::create([
            'destinacija' => $request->input('destinacija'),
            'trajanje' => $request->input('trajanje'),
            'opis' => $request->input('opis'),
            'slika' => $request->input('slika'),
            'user_id' => Auth::user()->id,
        ]);
        return response()->json(['Putovanje uspesno kreirano.', new PutovanjaResource($putovanje)]);
        
    }
    public function delete(Request $request, $id)
    {
        $putovanje = Putovanja::find($id);

        if (is_null($putovanje)) {
            return response()->json(["message" => "Putovanje ne postoji"], 404);
        }

        $putovanje->delete();
        return response()->json(null, 204);
    }
}
