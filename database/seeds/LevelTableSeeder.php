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
        $level = [["Susun Ayat", 1, 1000], 
        ['Tebak Ayat Selanjutnya', 1,  1500], 
        ['Tebak Jumlah Ayat', 2, 2000],
        ['Susun Surat', 2, 2500],
        ['Tebak Lanjutan Pertengahan Ayat', 2, 3000],
        ['Tebak Urutan Surat Selanjutnya', 2, 3500],
        ['Tebak Nama Surat dari Suara', 3, 4000],
        ['Tebak Ayat Mutasabihat', 4000]
    ];

        for ($i = 0; $i < count($level); $i++) {
            Level::create([
                'name' => $level[$i][0],
                'level' => $level[$i][1],
                'bonus_score' => $level[$i][2]
            ]);
        }
    }
}
