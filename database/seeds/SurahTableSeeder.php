<?php

use App\Model\Surah;
use Illuminate\Database\Seeder;

class SurahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $surah = [
            [
                78,
                "An-Naba",
                40
            ],
            [
                79,
                "An-Naazi'aat",
                46
            ],
            [
                80,
                "Abasa",
                42
            ],
            [
                81,
                "At-Takwir",
                29
            ],
            [
                82,
                "Al-Infitaar",
                19
            ],
            [
                83,
                "Al-Mutaffifin",
                36
            ],
            [
                84,
                "Al-Inshiqaaq",
                25
            ],
            [
                85,
                "Al-Buruj",
                22
            ],
            [
                86,
                "At-Taariq",
                17
            ],
            [
                87,
                "Al-A'laa",
                19
            ],
            [
                88,
                "Al-Ghaashiya",
                26
            ],
            [
                89,
                "Al-Fajr",
                30
            ],
            [
                90,
                "Al-Balad",
                20
            ],
            [
                91,
                "Ash-Syams",
                15
            ],
            [
                92,
                "Al-Lail",
                21
            ],
            [
                93,
                "Ad-Dhuhaa",
                11
            ],
            [
                94,
                "Al-Insyirah",
                8
            ],
            [
                95,
                "At-Tin",
                8
            ],
            [
                96,
                "Al-Alaq",
                19
            ],
            [
                97,
                "Al-Qadr",
                5
            ],
            [
                98,
                "Al-Bayyinah",
                8
            ],
            [
                99,
                "Az-Zalzalah",
                8
            ],
            [
                100,
                "Al-Aadiyaat",
                11
            ],
            [
                101,
                "Al-Qaari'ah",
                11
            ],
            [
                102,
                "At-Takaatsur",
                8
            ],
            [
                103,
                "Al-Asr",
                3
            ],
            [
                104,
                "Al-Humazah",
                9
            ],
            [
                105,
                "Al-Fil",
                5
            ],
            [
                106,
                "Quraiysh",
                4
            ],
            [
                107,
                "Al-Maa'un",
                7
            ],
            [
                108,
                "Al-Kautsar",
                3
            ],
            [
                109,
                "Al-Kafirun",
                6
            ],
            [
                110,
                "An-Nasr",
                3
            ],
            [
                111,
                "Al-lahab",
                5
            ],
            [
                112,
                "Al-Ikhlas",
                4
            ],
            [
                113,
                "Al-Falaq",
                5
            ],
            [
                114,
                "An-Nas",
                6
            ]
        ];

        for ($i = 0; $i < count($surah); $i++) {
            if ($i < 13) {
                Surah::create([
                    'id' => count($surah) - ($i),
                    'nama' => $surah[$i][1],
                    'badge_id' => 3,
                    'urutan' => $surah[$i][0],
                    'jumlah_ayat' => $surah[$i][2],
                ]);
            } else if ($i < 25) {
                Surah::create([
                    'id' => count($surah) - ($i),
                    'nama' => $surah[$i][1],
                    'badge_id' => 2,
                    'urutan' => $surah[$i][0],
                    'jumlah_ayat' => $surah[$i][2],
                ]);
            } else {
                Surah::create([
                    'id' => count($surah) - ($i),
                    'nama' => $surah[$i][1],
                    'badge_id' => 1,
                    'urutan' => $surah[$i][0],
                    'jumlah_ayat' => $surah[$i][2],
                ]);
            }
        }
    }
}
