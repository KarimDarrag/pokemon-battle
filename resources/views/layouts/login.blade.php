<style>
    body {

        margin: 0px;
        font-family: tahoma;
    }
    .navbar {
        border-bottom: 1px solid black;
        height: 3%;
        background-color: black;
        font-size: 16px;
        overflow: auto;
        text-align: center;
        color: white;
        font-weight: bold;
    }

    .rosterbar {
        border-bottom: 1px solid black;
    }

    table.table1 {
        border: 1px solid black;
        margin-top: 1px;
        width: 50%;
    }
    table.table1 tr, td{
        border: 1px solid black;
    }

    table.battletable {
        
    }

    table.tableroster {
        width: 60%;
    }

    table.tableroster tr, td {
        border: 1px solid black;
        width: 10%;
    }
    .banner {
        height: 15%;
        border-bottom: 1px solid black;
        background-color: white;
        background-color: darkgrey;
        background-image: url("https://img.pokemondb.net/sprites/sun-moon/normal/scizor-f.png");
        background-repeat: no-repeat;
        background-position: 10%;
    }
    .container {
        margin-left: 2%;
        margin-right: 2%;
        border: 1px solid black;
        height: 100%;
        background-color: white;
    }
    .contentarea {
        text-align: center;
        background-color: white;
        overflow: hidden;
        margin-left: 15.5%;
    }
    .disclaimer {
        overflow: auto;
        bottom: 0px;
        position: absolute;
        font-weight: bold;
        background-color: white;
        width: 80%;
        overflow: none;
    }

    .leftmenu {
        border-right: 1px solid black;
        width: 15%;
        text-align: center;
        position: absolute;
        left: 0;
        margin: 0;
        height: 100%;
        overflow: none;

    }
    ul.sidebar {
        text-align:center;
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    ul.sidebar li {
        text-align:center;
        list-style-type: none;
        margin: 0;
        padding: 5;
        border-bottom: 1px solid black;
    }
</style>

<div class='navbar'>
Hello {{Auth::user()->name}} !  <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </a>
</div>

<div class='banner'>
   <center style='font-size: 30px;'> Pokemon Grand Universe</center>
</div>
<div class='rosterbar'>
<?php
use App\Models\PokemonTable;
    $roster1 = PokemonTable::where('owner', Auth::user()->id)->where('roster', 1)->first();
    $roster1->HP = $roster1->maxHP;
    $roster1->save();
    $r1Name = lcfirst($roster1->Name);
    $roster2 = PokemonTable::where('owner', Auth::user()->id)->where('roster', 2)->first();
    if ($roster2 != null) {
    $r2Name = lcfirst($roster2->Name);}
    $roster3 = PokemonTable::where('owner', Auth::user()->id)->where('roster', 3)->first();
    if ($roster2 != null) {
    $r3Name = lcfirst($roster3->Name);}
    $roster4 = PokemonTable::where('owner', Auth::user()->id)->where('roster', 4)->first();
    if ($roster2 != null) {
    $r4Name = lcfirst($roster4->Name);}
    $roster5 = PokemonTable::where('owner', Auth::user()->id)->where('roster', 5)->first();
    if ($roster2 != null) {
    $r5Name = lcfirst($roster5->Name);}
    $roster6 = PokemonTable::where('owner', Auth::user()->id)->where('roster', 6)->first();
    if ($roster2 != null) {
    $r6Name = lcfirst($roster6->Name);}
    $list= PokemonTable::all()->where('owner', Auth::user()->id)->where('roster', 1)->first();
    $listName = lcfirst($list->Name);
    $list2 = PokemonTable::all()->where('owner', Auth::user()->id)->where('roster', 0);
?>

<center>
    <b>Starting Six:</b>  <br>
    <table class='tableroster'>
    @if ($roster1 != null)
    <td><a href=http://pokemondb.net/pokedex/{{$r1Name}}><img src=https://img.pokemondb.net/sprites/crystal/normal/{{$r1Name}}.png alt="Bulbasaur"></a><br>
    <small>{{ucfirst($r1Name)}} Level: {{$roster1->level}}</small><br><small>Exp: <progress id='exp' value={{$exp}} max={{$list->experienceNext}}></progress></small></td>
    @else
    <td>[<b>NONE</b>]</td>
    @endif
    @if ($roster2 != null)
    <td><a href=http://pokemondb.net/pokedex/{{$r2Name}}><img src=https://img.pokemondb.net/sprites/crystal/normal/{{$r2Name}}.png alt="Bulbasaur"></a></td>
    <small>{{ucfirst($r2Name)}} Level: {{$roster2->level}}</small><br><small>Exp: <progress id='r2' value={{$roster2->experience - ((4 * pow($roster2->level, 3)/5))}} max={{$roster2->experience + $roster2->experienceNext}}></progress></small></td>
    @else
    <td>[<b>NONE</b>]</td>
    @endif
    @if ($roster3 != null)
    <td><a href=http://pokemondb.net/pokedex/{{$r3Name}}><img src=https://img.pokemondb.net/sprites/crystal/normal/{{$r3Name}}.png alt="Bulbasaur"></a></td>
    <small>{{ucfirst($r3Name)}} Level: {{$roster3->level}}</small><br><small>Exp: <progress id='r1' value={{$roster3->experience - ((4 * pow($roster3->level, 3)/5))}} max={{$roster3->experience + $roster3->experienceNext}}></progress></small></td>
    @else
    <td>[<b>NONE</b>]</td>
    @endif
    @if ($roster4 != null)
    <td> <a href=http://pokemondb.net/pokedex/{{$r4Name}}><img src=https://img.pokemondb.net/sprites/crystal/normal/{{$r4Name}}.png alt="Bulbasaur"></a></td>
    <small>{{ucfirst($r4Name)}} Level: {{$roster4->level}}</small><br><small>Exp: <progress id='r4' value={{$roster4->experience - ((4 * pow($roster4->level, 3)/5))}} max={{$roster4->experience + $roster4->experienceNext}}></progress></small></td>
    @else
    <td> [<b>NONE</b>]</td>
    @endif
    @if ($roster5 != null)
    <td> <a href=http://pokemondb.net/pokedex/{{$r5Name}}><img src=https://img.pokemondb.net/sprites/crystal/normal/{{$r5Name}}.png alt="Bulbasaur"></a></td>
    <small>{{ucfirst($r5Name)}} Level: {{$roster5->level}}</small><br><small>Exp: <progress id='r5' value={{$roster5->experience - ((4 * pow($roster5->level, 3)/5))}} max={{$roster5->experience + $roster5->experienceNext}}></progress></small></td>
    @else
    <td> [<b>NONE</b>]</td>
    @endif
    @if ($roster6 != null)
    <td> <a href=http://pokemondb.net/pokedex/{{$r6Name}}><img src=https://img.pokemondb.net/sprites/crystal/normal/{{$r6Name}}.png alt="Bulbasaur"></a></td>
    <small>{{ucfirst($r6Name)}} Level: {{$roster6->level}}</small><br><small>Exp: <progress id='r6' value={{$roster6->experience - ((4 * pow($roster6->level, 3)/5))}} max={{$roster6->experience + $roster6->experienceNext}}></progress></small></td>
    @else
    <td> [<b>NONE</b>]</td>
    @endif
    </table>
</center>


</div>
<div class='leftmenu'>
    <ul class='sidebar'>
    <li><a href='/home'>Home</a>
        <li>Catch Pokemon</li>
        <li><a href='/battleInstance'><form id="battler" action="{{ route('battler') }}" method="POST" class="d-none"><input type='hidden' id='id' name='id' value={{Auth::user()->id}}></input>Battle</form></a>
    </li></ul>
</div>

<div class='contentarea'> @yield('content') </div>
</div>
