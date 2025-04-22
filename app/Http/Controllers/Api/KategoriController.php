<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return KategoriModel::all();
    }

    public function store(Request $request)
    {
        $kategori = KategoriModel::create($request->all()); // Menyimpan data kategori baru
        return response()->json($kategori, 201); // Mengembalikan response dengan data kategori yang baru
    }
    

    public function show($id)
    {
        return KategoriModel::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_kode' => 'required|string|max:50',
            'kategori_nama' => 'required|string|max:100',
        ]);
    
        $kategori = KategoriModel::findOrFail($id);
        $kategori->update($validated);
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $kategori
        ]);
    }
    
    public function destroy($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
