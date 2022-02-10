<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PokemonTable;
use App\Models\BattleInstance;
class Restart extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id1, $id2)
    {
        $pokemon1 = PokemonTable::where('id', $id1)->first();
        $pokemon1->HP = $pokemon1->maxHP;
        $pokemon1->save();
        $pokemon2 = BattleInstance::where('id', $id2)->first();
        $pokemon2->pokemon1HP = $pokemon2->pokemon1maxHP;
        $pokemon2->save();
        return back()->with('newinstance', $id2);
    }
}
