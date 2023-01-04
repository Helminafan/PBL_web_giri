<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wargakonoha;
use Illuminate\Http\Request;

class WargakonohaController extends Controller
{
    public function index()
    {
        $wargakonoha = Wargakonoha::all();
        return response()->json($wargakonoha, 200);
    }

    public function add(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'tanggal_konoha' => 'required',
            'keterangan' => 'required',
            'status_konoha' => 'required',
        
        ]);

        // create user
        $wargakonoha = new Wargakonoha([
            'id' =>  $request->id,
            'tanggal_konoha' =>  $request->tanggal_konoha,
            'keterangan' =>  $request->keterangan,
            'status_konoha' =>  $request->status_konoha,
           
        ]);

        $wargakonoha->save();

        return response()->json($wargakonoha, 201);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'tanggal_konoha' => 'required',
            'keterangan' => 'required',
            'status_konoha' => 'required',
           
        ]);

        // update user
        $wargakonoha = Wargakonoha::where('id', '=', $request->id)->first();
        ([
             $wargakonoha->id= $request->id,
             $wargakonoha->tanggal_konoha= $request->tanggal_konoha,
             $wargakonoha->keterangan = $request->keterangan,
             $wargakonoha->status_konoha = $request->status_konoha,
             
        ]);

        $wargakonoha->save();

        return response()->json($wargakonoha, 201);
    }

    public function delete(Request $request)
    {
        $wargakonoha = Wargakonoha::where('id', '=', $request->id)->first();

        if (!empty($wargakonoha)) {
            $wargakonoha->delete();

            return response()->json($wargakonoha, 200);
        } else {
            return response()->json([
                'error' => 'data tidak ditemukan'
            ], 404);
        }
    }
}
