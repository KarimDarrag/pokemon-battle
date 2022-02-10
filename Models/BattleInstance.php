<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleInstance extends Model
{
    use HasFactory;
    protected $fillable = [
        'pokemon1HP',
                'pokemon1ATK' ,
                'pokemon1SpA' ,
                'pokemon1SpD' ,
                'pokemon1DEF',
                'pokemon1M1' ,
                'pokemon1M2' ,
                'pokemon1M3' ,
                'pokemon1M4' ,
                'pokemon1Level',
                "pokemon1Name" ,
                "name" ,
                "pokemon1maxHP",
                'instanceTrainer'
    ];
}
