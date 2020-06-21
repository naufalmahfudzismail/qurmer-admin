<?php

use App\Model\Audio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BadgeTableSeeder::class);
        $this->call(SurahTableSeeder::class);
        $this->call(AyahTableSeeder::class);
        $this->call(AudioTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(ChallengeTableSeeder::class);
    }
}
