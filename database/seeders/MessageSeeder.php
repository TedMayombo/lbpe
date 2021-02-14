<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Let's truncate our existing records to start from scratch.
      Message::truncate();

       $faker = \Faker\Factory::create();

       // And now, let's create a few articles in our database:
       for ($i = 0; $i < 50; $i++) {
           Message::create([
               'title' => $faker->sentence,
               'body' => $faker->paragraph,
           ]);
       }

    }
}
