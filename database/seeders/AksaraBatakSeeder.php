<?php

namespace Database\Seeders;

use App\Models\AksaraBatak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AksaraBatakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $glyph = [
            'ᯀ',
            'ᯁ',
            'ᯂ',
            'ᯃ',
            'ᯄ',
            'ᯄ᯦',
            'ᯅ',
            'ᯆ',
            'ᯇ',
            'ᯈ',
            'ᯉ',
            'ᯊ',
            'ᯋ',
            'ᯌ',
            'ᯍ',
            'ᯎ',
            'ᯏ',
            'ᯐ',
            'ᯑ',
            'ᯒ',
            'ᯓ',
            'ᯔ',
            'ᯕ',
            'ᯖ',
            'ᯗ',
            'ᯘ',
            'ᯙ',
            'ᯚ',
            'ᯛ',
            'ᯜ',
            'ᯝ',
            'ᯞ',
            'ᯟ',
            'ᯠ',
            'ᯡ',
            'ᯢ',
            'ᯣ',
            'ᯤ',
            'ᯥ',
            '◌᯦',
            ' ᯧ',
            '◌ᯨ',
            '◌ᯩ',
            ' ᯪ',
            ' ᯫ',
            ' ᯬ',
            '◌ᯭ',
            ' ᯮ ',
            ' ◌ᯯ',
            '◌ᯰ ',
            '◌ᯱ ',
            ' ᯲ ',
            ' ᯳ '
        ];
        foreach($glyph as $g){
            AksaraBatak::create([
                'glyph' => $g,
            ]);
        }
    }
}
