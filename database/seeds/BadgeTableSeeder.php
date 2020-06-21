<?php

use App\Model\Badge;
use Illuminate\Database\Seeder;

class BadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Badge Tingkat 1', 'Badge Tingkat 2', 'Badge Tingkat 3'];
        for ($i = 0; $i < 3; $i++) {
            Badge::create([
                'nama' => $nama[$i]
            ]);
        }
    }
}
