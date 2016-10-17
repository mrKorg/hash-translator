<?php

use Illuminate\Database\Seeder;
use App\Models\Words;

class WordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->delete();

        Words::insert([
            [
                'word' => 'admin'
            ],
            [
                'word' => 'guest'
            ],
            [
                'word' => 'anchovy'
            ],
            [
                'word' => 'saloon'
            ],
            [
                'word' => 'balm'
            ],
            [
                'word' => 'bromine'
            ],
            [
                'word' => 'rotate'
            ],
            [
                'word' => 'legal'
            ],
            [
                'word' => 'record'
            ]

        ]);
    }
}
