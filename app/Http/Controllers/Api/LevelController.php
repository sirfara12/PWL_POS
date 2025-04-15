<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LevelModel;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(){
        return LevelModel::all();
    }
    public function store(Request $request)
    {
        $level = LevelModel::create($request->all());
        return response()->json($level, 201);
    }
    
    public function show(LevelModel $id)
    {
        return LevelModel::findOrFail($id);
    }
    
    public function update(Request $request, $id)
{
    $level = LevelModel::findOrFail($id);
    $level->update($request->only(['level_nama', 'level_kode']));

    return response()->json([
        'success' => true,
        'message' => 'Data berhasil diupdate',
        'data' => $level
    ]);
}
    
    public function destroy($id)
    {
        $level = LevelModel::findOrFail($id);
    $level->delete();

    return response()->json([
        'success' => true,
        'message' => 'Data terhapus',
    ]);
    }
    
}
