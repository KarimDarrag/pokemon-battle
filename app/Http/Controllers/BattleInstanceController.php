<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\BattleInstance;
class BattleInstanceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $newinstance = BattleInstance::create([
          
            'pokemon1HP' => 19,
            'pokemon1ATK' => 11,
            'pokemon1DEF' => 8,
            'pokemon1SpA' => 7,
            'pokemon1SpD' => 10,
            'pokemon1Name' => "Snorlax",
            'pokemon1M1' => "Close Combat",
            'pokemon1M2' => "Aura Sphere",
            'pokemon1M3' => "Hi Jump Kick",
            'pokemon1M4' => "Night Slash",
            'pokemon1Level' => 100,
            'pokemon1maxHP' => 19,
            'name' => "Sherif",
            'instanceTrainer' => Auth::user()->id
        ]);

        $oldinstance = BattleInstance::where('instanceTrainer', Auth::user()->id())->where('id', '!=', $newinstance->id);
        return view('battle')->with('battleInstance', Auth::user()->id);
    }
}
