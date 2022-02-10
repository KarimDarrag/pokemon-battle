@extends('layouts.login')


<?php
use App\Models\PokemonTable;
use App\Models\BattleInstance;
    $list= PokemonTable::all()->where('owner', Auth::user()->id)->where('roster', 1)->first();
    $listName = lcfirst($list->Name);
    $list2 = PokemonTable::all()->where('owner', Auth::user()->id)->where('roster', 0);
    $exp = $list->experience - ((4 * pow($list->level, 3)/5));
    $delete = BattleInstance::where('instanceTrainer', Auth::user()->id)->delete();
?>



@section('content')


    <center><h3>Roster 1 Pokemon:</center></h3>
    <center><a href=http://pokemondb.net/pokedex/{{$listName}}><img src=https://img.pokemondb.net/sprites/home/normal/{{$listName}}.png alt={{$listName}}></a></center>
    <center><table class='table1'>
    

<tr>
    <td>
        Pokemon:
    </td> 
    <td>
        {{$list->Name}}
        </td> 
    </tr>
<tr><td>Level: </td> <td>{{$list->level}}</td></tr>
<tr><td> HP: </td> <td>{{$list->HP}}</td></tr>
<tr><td> Attack: </td> <td>{{$list->Attack}}</td></tr>
<tr><td> Defence: </td> <td>{{$list->Defence}}</td></tr>
<tr><td> Sp.Atk: </td> <td>{{$list->SpAtk}}</td></tr>
<tr><td> Sp.Def: </td> <td>{{$list->SpDef}}</td></tr>
<tr><td> Move 1: </td> <td>{{$list->move1}}</td></tr>
<tr><td> Move 2: </td> <td>{{$list->move2}}</td></tr>
<tr><td> Move 3: </td> <td>{{$list->move3}}</td></tr>
<tr><td> Move 4: </td> <td>{{$list->move4}}</td></tr>
<tr><td> Experience: </td> <td>{{$list->experience}} </td></tr>
<tr><td> Experience to next level: </td><td>{{((4 * pow($list->level + 1, 3)) / 5) - $list->experience}} <progress id='exp' value={{$exp}} max={{$list->experienceNext}}></progress></td></tr>
<tr><td>Pokemon Box:</td>
<td>
@foreach ($list2 as $pokemon)
@endforeach
</td></tr>
</table></center>
@endsection