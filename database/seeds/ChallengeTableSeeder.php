<?php

use App\Model\Challenge;
use Illuminate\Database\Seeder;

class ChallengeTableSeeder extends Seeder{

    public function run(){
        for ($i = 0; $i < 37; $i++) {
            if ($i < 13) {
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 3,
                    'daily' => false,
                    'score' =>5000,
                    'time' => 15
                ]);
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 1,
                    'daily' => true,
                    'score' =>1000,
                    'time' => 15
                ]);
            } else if ($i < 25) {
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 3,
                    'daily' => false,
                    'score' => 10000,
                    'time' => 15
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 1,
                    'daily' => true,
                    'score' =>2000,
                    'time' => 15
                ]);

            } else {
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 3,
                    'daily' => false,
                    'score' => 30000,
                    'time' => 15
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 1,
                    'daily' => true,
                    'score' =>3000,
                    'time' => 15
                ]);
            }
        }

    }
}