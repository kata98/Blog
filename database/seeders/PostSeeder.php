<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 10; $i++) {
            \DB::table('posts')->insertGetId([
                'title' => $faker->word,
                'text' => $faker->text,
                'img' => 'post'.$i.'.jpg',
                'user_id' => rand(1,5)
            ]);
        }
    }
}
