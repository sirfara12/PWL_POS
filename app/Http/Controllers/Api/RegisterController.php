<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function post(Request $request)
{
    // Check if the request is ajax or expects JSON
    if (!($request->ajax() || $request->wantsJson())) {
        dd($request->wantsJson(), $request->ajax());
        return response()->json([
            'success' => false,
            'message' => 'Request not allowed',
        ], 403);
    }

    // Set validation rules
    $validator = Validator::make($request->all(), [
        'username' => 'required',
        'nama' => 'required',
        'password' => 'required|min:5|confirmed',
        'level_id' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // If validations fail
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Handle the image upload
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public'); // Store in the "images" folder within the "public" disk

        // Create the user with the image path
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $imagePath, // Save the image path
        ]);

        // Return response JSON user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        // Return JSON if process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }

    return response()->json([
        'success' => false,
        'message' => 'Image upload failed or no image provided.',
    ], 400);
}

}