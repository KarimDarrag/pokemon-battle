<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonTable extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'HP',
                'Attack' ,
                'SpAtk' ,
                'SpDef' ,
                'Defence',
                'move1' ,
                'move2' ,
                'move3' ,
                'move4' ,
                'Name',
                "maxHP" ,
                "owner" ,
                "roster",
                "level",
                "experience",
                "experienceNext"
    ];
}
