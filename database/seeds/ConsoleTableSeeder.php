<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConsoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consoles = [
        "Nintendo Entertainment System",
        "Super Nintendo Entertainment System",
        "Nintendo 64",
        "Nintendo Game Cube",
        "Game Boy Advance",
        "Game Boy Color",
        "unknown"
        ];

        foreach ($consoles as $key => $console) {
            DB::table('consoles_games')->insert([
                'name' => $console,
                'description' => null,
                'short' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
        }
    }
}
