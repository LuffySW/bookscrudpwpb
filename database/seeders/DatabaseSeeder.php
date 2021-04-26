<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $books = 80;
        $authors = 20;

        DB::table('users')->insert([
            'name' => 'Gvidas',
            'email' => 'demo@demo.lt',
            'password' => Hash::make('demodemo'),
        ]);
        foreach (range(1, $authors) as $_) {
            DB::table('authors')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'picture' => $faker->imageUrl(128, 128),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }

        foreach (range(1, $books) as $_) {
            DB::table('books')->insert([
                'title' => $faker->company,
                'isbn' => $faker->isbn13(),
                'pages' => rand(10,400),
                'short_description' => $faker->realText(200,2),
                'author_id' => rand(1,$authors),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }

    }
}
