<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\School;
use App\Models\Level;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Let's clear the users table first

         $faker = \Faker\Factory::create();
         Level::create(['name' => 'Crèche',]); 
         Level::create(['name' => 'Préprimaire',]);
         Level::create(['name' => 'Primaire',]); 
         Level::create(['name' => 'Secondaire',]);
         Level::create(['name' => 'Technique',]);
         Level::create(['name' => 'Proffessionel',]);
         Level::create(['name' => 'Universitaire',]);            
 
         // And now let's generate a few dozen schools for our app:
         for ($i = 0; $i < 10; $i++) {
             $type ='Publique';
             if(($i%2)==0){$type ='Publique';}
             else if (($i%3)==0){$type ='Privé';}
             else if (($i%5)==0){$type ='Para publique';}
             $school = School::create([
                 'name' => $faker->name,
                 'type'=>$type, 
             ]);
             $user = User::find($faker->randomDigit);
             $level = Level::find($faker->randomDigit);
             $school->users()->attach($user);
             $school->levels()->attach($level);
         }
    }
}
