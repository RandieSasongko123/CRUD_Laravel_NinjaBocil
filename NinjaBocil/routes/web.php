<?php

use App\Models\Skill;
use App\Models\Tailed;
use App\Models\Karakter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TailedController;
use App\Http\Controllers\KarakterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/karakter/dashboard');
    }
    return view('Login.newdesign');
})->name('Login.newdesign');

Route::post('/login', [LoginController::class, 'authentication']);
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', function () {
    return view('Login.register');
});

Route::middleware(['auth'])->group(function () {

    // Karakter Route List
    Route::get('/karakter/create', [KarakterController::class, 'tambahView'])->name('Karakter.create');
    Route::get('/karakter/delete/{id}', [KarakterController::class, 'delete'])->name('Karakter.delete');
    Route::get('/karakter/dashboard', [KarakterController::class, 'dashboard'])->name('Karakter.dashboard');
    Route::get('/karakter/update/{id}', [KarakterController::class, 'tampilkandata'])->name('Karakter.update');
    Route::post('/karakter/updatedata/{id}', [KarakterController::class, 'updatedata'])->name('Karakter.updatedata');
    Route::get('/karakter/checkSlug', [KarakterController::class, 'checkSlug']);
    Route::post('/create/karakter', [KarakterController::class, 'tambah']);

    // Skill Route List
    Route::get('/skill/create', [SkillController::class, 'tambahView'])->name('Skill.create');
    Route::get('/skill/delete/{id}', [SkillController::class, 'delete'])->name('Skill.delete');
    Route::get('/skill/dashboard', [SkillController::class, 'dashboard'])->name('Skill.dashboard');
    Route::get('/skill/update/{id}', [SkillController::class, 'tampilkandata'])->name('Skill.update');
    Route::post('/skill/updatedata/{id}', [SkillController::class, 'updatedata'])->name('Skill.updatedata');
    Route::get('/skill/checkSlug', [SkillController::class, 'checkSlug']);
    Route::post('/create/skill', [SkillController::class, 'tambah']);

    // Tailed Route List
    Route::get('/tailed/create', [TailedController::class, 'tambahView'])->name('Tailed.create');
    Route::get('/tailed/delete/{id}', [TailedController::class, 'delete'])->name('Tailed.delete');
    Route::get('/tailed/dashboard', [TailedController::class, 'dashboard'])->name('Tailed.dashboard');
    Route::get('/tailed/update/{id}', [TailedController::class, 'tampilkandata'])->name('Tailed.update');
    Route::post('/tailed/updatedata/{id}', [TailedController::class, 'updatedata'])->name('Tailed.updatedata');
    Route::get('/tailed/checkSlug', [TailedController::class, 'checkSlug']);
    Route::post('/create/tailed', [TailedController::class, 'tambah']);

    // Login dan Register User
    Route::get('/user/create', [LoginController::class, 'register'])->name('Login.create');
    Route::post('/user/update/{id}', [LoginController::class, 'update']);
    Route::get('/user/setting', [LoginController::class, 'setting'])->name('Login.setting');
    Route::post('/registrasi/create', [LoginController::class, 'store']);
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::post('/registrasi/create', [LoginController::class, 'store']);

Route::middleware(['checkLogin'])->group(function () {

    // Karakter Route List
    Route::get('/karakter/create', [KarakterController::class, 'tambahView'])->name('Karakter.create');
    Route::get('/karakter/delete/{id}', [KarakterController::class, 'delete'])->name('Karakter.delete');
    Route::get('/karakter/dashboard', [KarakterController::class, 'dashboard'])->name('Karakter.dashboard');
    Route::get('/karakter/update/{id}', [KarakterController::class, 'tampilkandata'])->name('Karakter.update');
    Route::post('/karakter/updatedata/{id}', [KarakterController::class, 'updatedata'])->name('Karakter.updatedata');
    Route::get('/karakter/checkSlug', [KarakterController::class, 'checkSlug']);
    Route::post('/dashboard/karakter', [KarakterController::class, 'tambah']);

    // Skill Route List
    Route::get('/skill/create', [SkillController::class, 'tambahView'])->name('Skill.index');
    Route::get('/skill/delete/{id}', [SkillController::class, 'delete'])->name('Skill.delete');
    Route::get('/skill/dashboard', [SkillController::class, 'dashboard'])->name('Skill.dashboard');
    Route::get('/skill/update/{id}', [SkillController::class, 'tampilkandata'])->name('Skill.update');
    Route::post('/skill/updatedata/{id}', [SkillController::class, 'updatedata'])->name('Skill.updatedata');
    Route::get('/skill/checkSlug', [SkillController::class, 'checkSlug']);
    Route::post('/dashboard/skill', [SkillController::class, 'tambah']);

    // Tailed Route List
    Route::get('/tailed/create', [TailedController::class, 'tambahView'])->name('Tailed.create');
    Route::get('/tailed/delete/{id}', [TailedController::class, 'delete'])->name('Tailed.delete');
    Route::get('/tailed/dashboard', [TailedController::class, 'dashboard'])->name('Tailed.dashboard');
    Route::get('/tailed/update/{id}', [TailedController::class, 'tampilkandata'])->name('Tailed.update');
    Route::post('/tailed/updatedata/{id}', [TailedController::class, 'updatedata'])->name('Tailed.updatedata');
    Route::get('/tailed/checkSlug', [TailedController::class, 'checkSlug']);
    Route::post('/dashboard/tailed', [TailedController::class, 'tambah']);

    // Login dan Register User
    Route::get('/user/create', [LoginController::class, 'register'])->name('Login.create');
    Route::post('/registrasi/create', [LoginController::class, 'store']);
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::fallback(function(){
    return view ('404');
});
