<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
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

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        //seed roles
        Role::create(['title' => 'Super Admin',]);
        Role::create(['title' => 'Parent',]);
        Role::create(['title' => 'Director',]);
        Role::create(['title' => 'Teacher',]);
        Role::create(['title' => 'Professor',]);
        Role::create(['title' => 'Student',]);
        Role::create(['title' => 'School Staff',]);
        Role::create(['title' => 'LBPE Staff',]);
        Role::create(['title' => 'PAS Member',]);
        Role::create(['title' => 'Visitor',]);

        $password = Hash::make('toptal');
        User::create([
            'name' => 'Administrator',
            'email' => 'mayomboted2@gmail.com',
            'password' => 'Jtemmao@2008',
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            $random1 = $faker->randomDigit; 
            $random2 = $faker->randomDigit;
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password, 
            ]);
            $rolesArray =$faker->shuffle(array($random1,$random2));
            $roles = Role::find($rolesArray);
            $user->roles()->attach($roles);
        }
    }
}
