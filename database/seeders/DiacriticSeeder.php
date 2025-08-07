<?php

namespace Database\Seeders;

use App\Models\Diacritic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiacriticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name" => "Batak Vowel Sign E", "symbol" => "ᯧ", "type" => "vowel", "latin_translit" => "e", "example" => "ᯅ(ba) + ᯧ(e) = ᯅᯧ(be)"],
            ["name" => "Batak Vowel Sign Pakpak E", "symbol" => "ᯨ", "type" => "vowel", "latin_translit" => "é", "example" => "ᯅ(ba) + ◌ᯨ(é) = ᯅᯨ(bé)"],
            ["name" => "Batak Vowel Sign Ee", "symbol" => "ᯩ", "type" => "vowel", "latin_translit" => "ee", "example" => "ᯅ(ba) + ◌ᯩ(ee) = ᯅᯩ(bee)"],
            ["name" => "Batak Vowel Sign I", "symbol" => "ᯪ", "type" => "vowel", "latin_translit" => "i", "example" => "ᯅ(ba) + ᯪ(i) = ᯅᯪ(bi)"],
            ["name" => "Batak Vowel Sign Karo I", "symbol" => "ᯫ", "type" => "vowel", "latin_translit" => "i", "example" => "ᯆ(ba) + ᯫ(i) = ᯆᯫ(bi)"],
            ["name" => "Batak Vowel Sign O", "symbol" => "ᯬ", "type" => "vowel", "latin_translit" => "o", "example" => "ᯅ(ba) +  ᯬ(o) = ᯅᯬ(bo)"],
            ["name" => "Batak Vowel Sign Karo O", "symbol" => "ᯭ", "type" => "vowel", "latin_translit" => "o", "example" => "ᯆ(ba) + ◌ᯭ(o) = ᯆᯭ(bo)"],
            ["name" => "Batak Vowel Sign U", "symbol" => "ᯮ", "type" => "vowel", "latin_translit" => "u", "example" => "ᯅ(ba) + ᯮ (u) = ᯅᯮ(bu)"],
            // ["name" => "Batak Vowel Sign U For Simalungun Sa", "symbol" => "◌ᯯ", "type" => "vowel", "latin_translit" => "u", "example" => "ᯘ(sa) + (u) = ᯘᯯ(su)"],
            ["name" => "Batak Consonant Sign Ng", "symbol" => "ᯰ", "type" => "consonant", "latin_translit" => "ng", "example" => "ᯀ(a) + ◌ᯰ(ng) = ᯀᯰ(ang)"],
            ["name" => "Batak Pangolat", "symbol" => "᯲", "type" => "virama", "latin_translit" => "", "example" => "ᯇ(pa) + ᯖ᯲(t) = ᯇᯖ᯲(pat)"],
            ["name" => "Batak Panongonan", "symbol" => "᯳", "type" => "virama", "latin_translit" => "", "example" => "ᯕ(ma) + ᯖ᯳(t) = ᯕᯖ᯳(mat)"]
        ];

        foreach($data as $item ){
            Diacritic::create($item);
        }
    }
}
