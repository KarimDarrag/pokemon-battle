@extends('layouts.battle')

<?php

use App\Models\PokemonTable;
use App\Models\BattleInstance;


    $list= PokemonTable::all()->where('owner', Auth::user()->id)->where('roster', 1)->first();
    $listName = lcfirst($list->Name);
    $list2 = PokemonTable::all()->where('owner', Auth::user()->id)->where('roster', 0);
    $exp = $list->experience - ((4 * pow($list->level, 3)/5));
    $trainer = BattleInstance::find(session('newinstance'));
?>

@section('content')
@if(!is_null($trainer))


Battle {{$trainer->name}}! <br>
<center>
    <table style='border: 1px solid black;'>
    <center>
        <tr>
            <td><center>Your {{$list->Name}}'s HP: {{$list->HP}} / {{$list->maxHP}}<br>Level: {{$list->level}} <br>
            <progress id='hpbar' value={{$list->HP}} max={{$list->maxHP}}></progress>
</td><td> <center>Enemy {{$trainer->pokemon1Name}}'s HP: {{$trainer->pokemon1HP}} / {{$trainer->pokemon1maxHP}}<br>Level: {{$trainer->pokemon1Level}} <br>
            <progress id='hpbar' value={{$trainer->pokemon1HP}} max={{$trainer->pokemon1maxHP}}></progress></td></tr>
        <tr>
            <td><center>
            <a href=http://pokemondb.net/pokedex/{{lcfirst($list->Name)}}><img src=https://img.pokemondb.net/sprites/x-y/normal/{{lcfirst($list->Name)}}.png alt={{$list->Name}}></a>
</td>
<td><center>
<a href=http://pokemondb.net/pokedex/{{lcfirst($trainer->pokemon1Name)}}><img src=https://img.pokemondb.net/sprites/x-y/normal/{{lcfirst($trainer->pokemon1Name)}}.png alt={{$trainer->pokemon1Name}}></a>
</td>

</tr>

        
        </table></center>
    <center>@if(session()->has('string'))
                {{session('string')}}
                @endif </center>
        @if($list->HP != 0 && $trainer->pokemon1HP != 0)
       <form action="{{route('battle', [Auth::user()->id, $trainer->id])}}" method="POST">
           {{csrf_field()}}
        <center> Choose your Pokemon's move </center>
        <center> <select style='width: 10%; border:1px solid black; padding: 3px; margin-top: 2px;' id='move' name='move'>
            <option id='move1' name='move1' value={{$list->move1}}>{{$list->move1}}</option>
            <option id='move2' name='move2' value={{$list->move2}}>{{$list->move2}}</option>
            <option id='move3' name='move3' value={{$list->move3}}>{{$list->move3}}</option>
            <option id='move4' name='move4' value={{$list->move4}}>{{$list->move4}}</option>
</select> <br>
<input  style='width: 5%; border:1px solid black; padding: 3px; margin-top: 2px;'type='submit' value='Go!'></input>
</form>
@else
<a href="{{route('restart', [$list->id, $trainer->id])}}">Restart Battle!</a>
@endif
</center>
@else
No Session Created.
@endif
@endsection