<?php

use App\Model\Challenge;
use Illuminate\Database\Seeder;

class ChallengeTableSeeder extends Seeder{

    public function run(){
        for ($i = 0; $i < 37; $i++) {

            //surat pendek
            if ($i < 13) {
                //misi
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 1,
                    'daily' =>  false,
                    'score' => 1000,
                    'wrong_score' => 50,
                    'time' => 2
                ]);

                //misi
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 2,
                    'daily' => false,
                    'score' =>500,
                    'wrong_score' => 25,
                    'time' => 1
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 3,
                    'daily' => true,
                    'score' =>1000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 6,
                    'daily' => true,
                    'score' =>1000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 7,
                    'daily' => true,
                    'score' =>1000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

            }
            //surat tengah
            else if ($i < 25) {
                //misi
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 3,
                    'daily' => false,
                    'score' => 2000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

                //misi
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 4,
                    'daily' => false,
                    'score' =>2500,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

                //misi
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 5,
                    'daily' => false,
                    'score' => 2000,
                    'wrong_score' => 100,
                    'time' => 5
                ]);

                //misi
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 6,
                    'daily' => false,
                    'score' =>2500,
                    'wrong_score' => 100,
                    'time' => 5
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 1,
                    'daily' => true,
                    'score' => 2000,
                    'wrong_score' => 100,
                    'time' => 5
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 2,
                    'daily' => true,
                    'score' => 2000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

            } 
            
            //surat panjang
            else {
            //misi
                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 7,
                    'daily' => false,
                    'score' => 3000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 1,
                    'daily' => true,
                    'score' => 5000,
                    'wrong_score' => 100,
                    'time' => 5
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 2,
                    'daily' => true,
                    'score' =>3000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);

                Challenge::create([
                    'surah_id' => $i + 1,
                    'level_id' => 5,
                    'daily' => true,
                    'score' =>3000,
                    'wrong_score' => 100,
                    'time' => 1
                ]);
            }
        }

    }
}