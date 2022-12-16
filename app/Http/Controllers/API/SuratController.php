<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::all();
        return response()->json($surat, 200);
    }

    public function add(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required',
            'status_surat' => 'required',
        
        ]);

        // create user
        $surat = new Surat([
            'id' =>  $request->id,
            'tanggal_surat' =>  $request->tanggal_surat,
            'keterangan' =>  $request->keterangan,
            'status_surat' =>  $request->status_surat,
           
        ]);

        $surat->save();

        return response()->json($surat, 201);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required',
            'status_surat' => 'required',
           
        ]);

        // update user
        $surat = Surat::where('id', '=', $request->id)->first();
        ([
             $surat->id= $request->id,
             $surat->tanggal_surat= $request->tanggal_surat,
             $surat->keterangan = $request->keterangan,
             $surat->status_surat = $request->status_surat,
             
        ]);

        $surat->save();

        return response()->json($surat, 201);
    }

    public function delete(Request $request)
    {
        $surat = Surat::where('id', '=', $request->id)->first();

        if (!empty($surat)) {
            $surat->delete();

            return response()->json($surat, 200);
        } else {
            return response()->json([
                'error' => 'data tidak ditemukan'
            ], 404);
        }
    }
}
