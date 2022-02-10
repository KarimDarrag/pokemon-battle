<?php

use Illuminate\Support\Facades\Route;
use App\Models\PokemonTable;
use App\Http\Controllers\BattleController;
use App\Http\Controllers\Restart;
use App\Http\Controllers\BattleInstanceController;
use App\Http\Controllers\RedirectBattle;
use App\Models\BattleInstance;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $variable = [
        'id1' => 1,
        'id2' => 2
    ];
    return view('index')->with($variable);
});

Route::post('battle/{id1}/{id2}', BattleController::class)->name('battle');
Route::get('restart/{id1}/{id2}', Restart::class)->name('restart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/battleInstance',function() {
    $newinstance = BattleInstance::create([
          
        'pokemon1HP' => 40,
        'pokemon1ATK' => 11,
        'pokemon1DEF' => 8,
        'pokemon1SpA' => 7,
        'pokemon1SpD' => 10,
        'pokemon1Name' => "Snorlax",
        'pokemon1M1' => "Close Combat",
        'pokemon1M2' => "Aura Sphere",
        'pokemon1M3' => "Hi Jump Kick",
        'pokemon1M4' => "Night Slash",
        'pokemon1Level' => 10000000,
        'pokemon1maxHP' => 19,
        'name' => "Sherif",
        'instanceTrainer' => Auth::user()->id
    ]);
    return redirect()->route('battleInstance')->with('newinstance', $newinstance->id);
})->name('battler');

Route::get('/battle', function() {
    return view('battle');
})->name('battleInstance');

