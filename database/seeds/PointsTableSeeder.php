<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points')->insert([
            'key' => 'comment',
            'points' => '5',
        ]);
        DB::table('points')->insert([
            'key' => 'posted',
            'points' => '10',
        ]);
        DB::table('points')->insert([
            'key' => 'updated-game',
            'points' => '2',
        ]);
        DB::table('points')->insert([
            'key' => 'uploaded-image',
            'points' => '12',
        ]);
    }
}
