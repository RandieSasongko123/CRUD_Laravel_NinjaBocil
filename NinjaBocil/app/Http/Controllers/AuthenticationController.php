<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    // login serta membuat access token
    public function login(Request $request)
    {
        // Validasi Data Login User
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Mengecek apakah email yang diinputkan itu ada
        $user = User::where('email', $request->email)->first();

        // Mengecek apakah user dan password sudah sesuai dengan pada data jika tidak akan memunculkan throw validation dibawah
        if(! $user || ! Hash::check($request->password, $user->password))
        {
            throw ValidationException::withMessages([
                'email' => ['The Provided credentials are incorrect.'],
            ]);
        }

        // Jika login kita sudah benar makan akan diberikan token oleh project kita
        return $user->createToken('user login')->plainTextToken;
    }

    // Logout atau menghapus access tokennya
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        // return "Sukses Logout";
    }

    // Mengecek data yang sedang login
    public function me(Request $request)
    {
    //     $user = Auth::user();
    //     $post = Post::where('user', $user->id);
        return response()->json(Auth::user());
    }

}
