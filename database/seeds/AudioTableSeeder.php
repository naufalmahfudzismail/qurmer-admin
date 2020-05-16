<?php

use App\Model\Audio;
use Illuminate\Database\Seeder;

class AudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 37; $i++) {
            Audio::create([
                'surah_id' => $i + 1,
                'file' => 114-$i.".mp3",
                'name' => 114-$i.""
            ]);
        }
    }
}
