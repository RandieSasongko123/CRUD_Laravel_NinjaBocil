<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest'])->except('logout', 'register', 'setting', 'store', 'update');
    }

    public function index()
    {
        return view('Login.newdesign');
    }

    public function check(Request $request)
    {
        // Validasi Data Login User
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Mengecek apakah email yang diinputkan itu ada
        $user = User::where('email', $request->email)->first();

        // Mengecek apakah user dan password sudah sesuai dengan pada data jika tidak akan memunculkan throw validation dibawah
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['error' => 'Email atau password salah.']);
        }

        return redirect()->route('Karakter.dashboard');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required'
        ]);

        $password_convert = Hash::make($request->password);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $password_convert,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        return redirect()->route('Karakter.dashboard');

    }

    public function update(Request $request)
    {

        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required'
        ]);

        $image = Auth::user()->foto_user;

        if ($request->hasFile('foto_user')) {
            $filename = $this->generateRandomString();
            $extension = $request->foto_user->extension();
            $image = $filename.'.'.$extension;
            Storage::putFileAs('public/image', $request->file('foto_user'), $image);
        }

        if (!empty($request->password)) {
            $password_convert = Hash::make($request->password);
            $user->password = $password_convert;
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->about_user = $request->about_user;
        $user->negara = $request->negara;
        $user->kota = $request->kota;
        $user->foto_user = $image;

        $user->save();

        return redirect()->route('Karakter.dashboard');

    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            view()->share('user', $user);

            return redirect()->intended('/karakter/dashboard');
        }

        return back()->with('LoginError', 'Login Failed!');
    }

    public function register()
    {
        return view('Login.create');
    }

    public function setting()
    {
        return view('Login.setting');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('Login.newdesign');
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('Karakter.dashboard');
        }

        return redirect('/');
    }

    function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
