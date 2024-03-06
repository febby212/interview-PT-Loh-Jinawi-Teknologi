<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'status' => 422,
                'message' => 'Terdapat kesalahan.',
                'data' => $validation->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $new_user = User::create($input);

        $sucess['token'] = $new_user->createToken('auth_token')->plainTextToken;
        $sucess['name'] = $new_user->name;

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Pengguna ' . $sucess['name'] . ' berhasil ditambahkan',
            'data' => $sucess
        ]);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $authenthicated_user = $request->user()->createToken('auth_token');
            $sucess['token'] = $authenthicated_user->plainTextToken;
            $sucess['user'] = $authenthicated_user->accessToken;
            $sucess['name'] = $user->name;
            
            return response()->json([
                'success' => true,
                'status' => 201,
                'message' => 'Berhasil login',
                'data' => $sucess
            ]);
        } 

        return response()->json([
            'success' => true,
            'status' => 412,
            'message' => 'Login gagal',
            'data' => null
        ]);
    }
}
