<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PokemonTable;
use App\Models\Move;
class BattleController extends Controller
{
    
    public function __invoke($id1) {
        return view('home');
    }

   
 }
