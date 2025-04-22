<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return UserModel::all();
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'level_id' => 'required|integer',
            'username' => 'required|string|unique:m_user,username',
            'nama' => 'required|string',
            'password' => 'required|string|min:6',
            'foto' => 'nullable|string',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = UserModel::create($validatedData);

        return response()->json($user, 201);
    }

    
    public function show(UserModel $id)
    {
        return UserModel::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $validatedData = $request->validate([
            'level_id' => 'sometimes|integer',
            'username' => 'sometimes|string|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'sometimes|string',
            'password' => 'nullable|string|min:6',
            'foto' => 'nullable|string',
        ]);

        // Jika password diisi, hash dulu
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $user
        ]);
    }
    
    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
    $user->delete();

    return response()->json([
        'success' => true,
        'message' => 'Data terhapus',
    ]);
    }
}
