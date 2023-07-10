<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masakan;
use Validator;

class MasakanController extends Controller
{
    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }

        $masakan = new Masakan();
        $masakan->nama = $request->nama;
        $masakan->harga = $request->harga;
        $masakan->deskripsi = $request->deskripsi;
        $masakan->save();

        return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $masakan
        ]);
    }
    
    public function read()
    {
        $masakans = Masakan::all();
        
        if(!$masakans->isEmpty()) {
           return response()->json([
                   'success' => true,
                   'message' => 'Data berhasil ditampilkan',
                   'data' => $masakans
           ]);
        }
        else {
            return response()->json([
                    'success' => false,
                    'message' => 'Data gagal ditampilkan',
                    'data' => $masakans
            ]);
        }
       return response()->json($masakans);
    }

    public function detail($id)
    {
        $masakan = Masakan::find($id);
        
        if($masakan) {
           return response()->json([
                   'success' => true,
                   'message' => 'Data berhasil ditampilkan',
                   'data' => $masakan
           ]);
        }
        else {
            return response()->json([
                    'success' => false,
                    'message' => 'Data gagal ditampilkan',
                    'data' => $masakan
            ]);
        }
       return response()->json($masakan);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }

        $masakan = Masakan::find($id);
        $masakan->nama = $request->nama;
        $masakan->harga = $request->harga;
        $masakan->deskripsi = $request->deskripsi;
        $masakan->save();

        return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $masakan
        ]);
    }
    public function delete($id)
    {
        $masakan = Masakan::find($id);
        if($masakan) {
            $masakan->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'data' => $masakan
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal dihapus',
                'data' => $masakan
            ]);
        }
    }
}