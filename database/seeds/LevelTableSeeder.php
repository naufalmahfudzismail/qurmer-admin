<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [["lanjutkan hafalan", 1000], ['susun ayat', 2000], ['setor hafalan', 5000]];

        for ($i = 0; $i < count($level); $i++) {
            Level::create([
                'name' => $level[$i][0],
                'bonus_score' => $level[$i][1]
            ]);
        }
    }
}
