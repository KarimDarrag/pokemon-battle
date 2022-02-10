<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PokemonTable;
use App\Models\Move;
use App\Models\BattleInstance;
use Auth;
class BattleController extends Controller
{
    
    public function __invoke($id1, $id2, Request $request) {
        $id3 = PokemonTable::where('owner', Auth::user()->id)->where('roster', 1)->first();
        $id4 = BattleInstance::find($id2);
        if ($request->battle == 0) {
            $move = PokemonTable::select('move1')->where('owner', $id1)->first();
            $moveName = $move->move1;
            $movePower = Move::select('Power')->where('name', $move->move1)->first();
        } else if ($request->battle == 1) {
            $move = PokemonTable::select('move2')->where('owner', $id1)->first();
            $moveName = $move->move2;
            $movePower = Move::select('Power')->where('name', $move->move2)->first();
        } else if ($request->battle == 2) {
            $move = PokemonTable::select('move3')->where('owner', $id1)->first();
            $moveName = $move->move3;
            $movePower = Move::select('Power')->where('name', $move->move3)->first();
        } else {
            $move = PokemonTable::select('move4')->where('owner', $id1)->first();
            $moveName = $move->move4;
            $movePower = Move::select('Power')->where('name', $move->move4)->first();
        }

        $random = rand(1, 4);
        $rand1 = rand(1, 16);
        $rand2 = rand(1,16);
        $rand3 = rand(1, 16);
        $rand4 = rand(1,16);
        $critical = FALSE;
        $critical2 = FALSE;
        if($rand1 == $rand2) {
            $critical = TRUE;
        }
        if($rand3 == $rand4) {
            $critical2 = TRUE;
        }

        if($random == 1) {
            $move2 = $id4->pokemon1M1;

            $movePower2 = Move::select('Power')->where('name', $move2)->first();
        } else if ($random == 2) {
            $move2 = $id4->pokemon1M2;
 
            $movePower2 = Move::select('Power')->where('name', $move2)->first();
        } else if ($random == 3) {
            $move2 = $id4->pokemon1M3;
 
            $movePower2 = Move::select('Power')->where('name', $move2)->first();
        }  else if ($random == 4) {
            $move2 = $id4->pokemon1M4;
            $movePower2 = Move::select('Power')->where('name', $move2)->first();
        }

        $formulaPokemon1 = (((((2*70/5) + 2) * ($movePower->Power) * ($id3->Attack/$id4->pokemon1DEF))/50)+2);
        $formulavalue1 = intVal($formulaPokemon1);
        if($critical == TRUE) {
            $formulavalue1 = $formulavalue1 * 2;
        }
        $currentHP = $id4->pokemon1HP - $formulaPokemon1;
        $currentHP1 = intVal($currentHP);
        $id4->pokemon1HP = $currentHP1;
        $id4->save();

        $formulaPokemon2 = (((((2*70/5) + 2) * ($movePower2->Power) * ($id4->pokemon1ATK/$id3->Defence))/50)+2);
        $formulavalue2 = intVal($formulaPokemon2);
        if($critical2 == TRUE) {
            $formulavalue2 = $formulavalue2 * 2;
        }
        $currentHP22 = $id3->HP - $formulaPokemon2;
        $currentHP2 = intVal($currentHP22);
        $id3->HP = $currentHP2;
        $id3->save();

        if($critical == TRUE && $critical2 == FALSE) {
            $BattleString = $id3->Name." attacked ".$id4->pokemon1Name." with ".$moveName." and dealt ".$formulavalue1." damage as a critical hit! \r\n".$id4->pokemon1Name." attacked ".$id3->Name." with ".$move2." and dealt ".$formulavalue2." damage!";
        nl2br($BattleString);
        } else if($critical2 == TRUE && $critical == False) {
            $BattleString = $id3->Name." attacked ".$id4->pokemon1Name." with ".$moveName." and dealt ".$formulavalue1." damage! \r\n".$id4->pokemon1Name." attacked ".$id3->Name." with ".$move2." and dealt ".$formulavalue2." damage as a critical hit!";
        nl2br($BattleString);
        } else if($critical2 == TRUE && $critical == TRUE){
            $BattleString = $id3->Name." attacked ".$id4->pokemon1Name." with ".$moveName." and dealt ".$formulavalue1." damage as a critical hit! \r\n".$id4->pokemon1Name." attacked ".$id3->Name." with ".$move2." and dealt ".$formulavalue2." damage as a critical hit!";
        nl2br($BattleString);
        } else {
            $BattleString = $id3->Name." attacked ".$id4->pokemon1Name." with ".$moveName." and dealt ".$formulavalue1." damage! \r\n".$id4->pokemon1Name." attacked ".$id3->Name." with ".$move2." and dealt ".$formulavalue2." damage!";
        }

        if ($id4->pokemon1HP <= 0 && $id3->HP <= 0) {
            $id3->HP = 0;
            $id3->save();
            $id4->pokemon1HP = 0;
            $id4->save();
            $BattleString = "Pokemon 1 and Pokemon 2 have fainted. ";
            $exp = ($id4->pokemon1Level * 189) / 7;
            $oldexp = $id3->experience;
            $newexp = $oldexp + $exp;
            $id3->experience = $newexp;
            $BattleString .= $id3->Name." has gained ".$exp." experience points. ";
            if($id3->experience > ((4 * pow($id3->level + 1, 3)) / 5)) {
                $id3->level = $id3->level + 1;
                $id3->maxHP = floor(((2*39)*$id3->level)/100) + $id3->level + 10;
                $id3->Attack = floor(((2*52*$id3->level)/100) + 5);
                $id3->Defence = floor(((2*43*$id3->level)/100) + 5);
                $id3->SpAtk = floor(((2*60*$id3->level)/100) + 5);
                $id3->SpDef = floor(((2*50*$id3->level)/100) + 5);
                $id3->experienceNext = ((4 * pow($id3->level + 1, 3)) / 5) - $id3->experience;
                $id3->save();
            $BattleString .= $id3->Name." has leveled up! ".$id3->Name." is now level ".$id3->level.".";

            
            } 
            $id3->save();
           
        } else if($id4->pokemon1HP <= 0 && $id3->HP > 0) {
            $id4->pokemon1HP = 0;
            $id4->save();
            $BattleString = "Pokemon 2 has fainted. ";
            $exp = ($id4->pokemon1Level * 189) / 7;
            $oldexp = $id3->experience;
            $newexp = $oldexp + $exp;
            $id3->experience = $newexp;
            $BattleString .= $id3->Name." has gained ".$exp." experience points. ";
            while ($id3->experience  + $exp> $id3->experience + $id3->experienceNext) {
            if($id3->experience > ((4 * pow($id3->level + 1, 3)) / 5)) {
                $id3->level = $id3->level + 1;
                $id3->maxHP = floor(((2*39)*$id3->level)/100) + $id3->level + 10;
                $id3->Attack = floor(((2*52*$id3->level)/100) + 5);
                $id3->Defence = floor(((2*43*$id3->level)/100) + 5);
                $id3->SpAtk = floor(((2*60*$id3->level)/100) + 5);
                $id3->SpDef = floor(((2*50*$id3->level)/100) + 5);
                $id3->experienceNext = ((4 * pow($id3->level + 1, 3)) / 5) - $id3->experience;
                $id3->save();}
            $BattleString .= $id3->Name." has leveled up! ".$id3->Name." is now level ".$id3->level.".";

            
            } 
            $id3->save();
        }else if($id4->pokemon1HP > 0 && $id3->HP <= 0) {
            $id3->HP = 0;
            $id3->save();
            $BattleString = "Pokemon 1 has fainted."; }

       
        return back()->with('string', $BattleString)->with('newinstance', $id2);
    }

   
 }
