<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\PokemonTable;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'starter' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'starter' => $data['starter']
        ]);

        $id = User::select('id')->where('name', $data['name'
        ])->first();

        $instance = User::find($id->id);
        
        if ($data['starter'] == "Charmander") {
        $newinstance = PokemonTable::create([
          
                'HP' => 20,
                'Attack' => 12,
                'SpAtk' => 10,
                'SpDef' => 11,
                'Defence' => 10,
                'move1' => "Flamethrower",
                'move2' => "None",
                'move3' => "None",
                'move4' => "None",
                'Name' => "Charmander",
                "maxHP" => 20,
                "owner" => $id->id,
                "roster" => 1,
                "level" => 5,
                "experience" => (4 * pow(5, 3)) / 5,
                "experienceNext" => ((4 * pow(6, 3)) / 5) - ((4 * pow(5, 3)) / 5)
            
            ]);
        } else if ($data['starter'] == "Squirtle") {
            $newinstance = PokemonTable::create([
              
                    'HP' => 20,
                    'Attack' => 12,
                    'SpAtk' => 9,
                    'SpDef' => 12,
                    'Defence' => 13,
                    'move1' => "Surf",
                    'move2' => "None",
                    'move3' => "None",
                    'move4' => "None",
                    'Name' => "Squirtle",
                    "maxHP" => 20,
                    "owner" => $id->id,
                    "roster" => 1,
                    "level" => 5,
                    "experience" => (4 * pow(5, 3)) / 5,
                    "experienceNext" => ((4 * pow(6, 3)) / 5) - ((4 * pow(5, 3)) / 5)
                
                ]);
            }else if ($data['starter'] == "Bulbasaur") {
                $newinstance = PokemonTable::create([
                  
                        'HP' => 21,
                        'Attack' => 12,
                        'SpAtk' => 11,
                        'SpDef' => 13,
                        'Defence' => 11,
                        'move1' => "Solarbeam",
                        'move2' => "None",
                        'move3' => "None",
                        'move4' => "None",
                        'Name' => "Bulbasaur",
                        "maxHP" => 20,
                        "owner" => $id->id,
                        "roster" => 1,
                        "level" => 5,
                        "experience" => (4 * pow(5, 3)) / 5,
                        "experienceNext" => ((4 * pow(6, 3)) / 5) - ((4 * pow(5, 3)) / 5)
                    
                    ]);
                }
     
        return $instance;
    }
}
