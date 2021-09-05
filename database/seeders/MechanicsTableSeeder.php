<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MechanicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mechanics')->insert([
            [
                'name' => 'Winning Moment',
                'slug' => 'winning-moment'
            ],
            [
                'name' => 'Chance / Probability',
                'slug' => 'chance'
            ]
        ]);
    }
}
