<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\jenissurat;
use Illuminate\Http\Request;

class JenissuratController extends Controller
{
    public function index()
    {
        $jenissurat = jenissurat::all();
        return response()->json($jenissurat, 200);
    }

    public function add(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'nama_surat' => 'required',
            'isi_surat' => 'required',
        
        ]);

        // create user
        $jenissurat = new jenissurat([
            'id' =>  $request->id,
            'nama_surat' =>  $request->nama_surat,
            'isi_surat' =>  $request->isi_surat,
           
        ]);

        $jenissurat->save();

        return response()->json($jenissurat, 201);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'nama_surat' => 'required',
            'isi_surat' => 'required',
           
        ]);

        // update user
        $jenissurat = jenissurat::where('id', '=', $request->id)->first();
        ([
             $jenissurat->id= $request->id,
             $jenissurat->nama_surat= $request->nama_surat,
             $jenissurat->isi_surat = $request->isi_surat,
             
        ]);

        $jenissurat->save();

        return response()->json($jenissurat, 201);
    }

    public function delete(Request $request)
    {
        $jenissurat = jenissurat::where('id', '=', $request->id)->first();

        if (!empty($jenissurat)) {
            $jenissurat->delete();

            return response()->json($jenissurat, 200);
        } else {
            return response()->json([
                'error' => 'data tidak ditemukan'
            ], 404);
        }
    }
}
