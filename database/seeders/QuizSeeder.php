<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\MatchPair;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question1 = Question::create([
            'question_text' => 'Huruf "ᯀ" dibaca sebagai apa dalam alfabet Latin?',
            'type' => 'multiple_choice'
        ]);

        Answer::insert([
            [
                'question_id' => $question1->id,
                'answer_text' => 'a',
                'is_correct' => true
            ],
            [
                'question_id' => $question1->id,
                'answer_text' => 'wa',
                'is_correct' => false
            ],
            [
                'question_id' => $question1->id,
                'answer_text' => 'ba',
                'is_correct' => false
            ],
            [
                'question_id' => $question1->id,
                'answer_text' => 'ga',
                'is_correct' => false
            ],
        ]);

        $question2 = Question::create([
            'question_text' => 'Kata "ᯞᯪᯖᯉᯪ" jika ditulis dengan huruf Latin, menjadi? (Toba)',
            'type' => 'multiple_choice'
        ]);

        Answer::insert([
            [
                'question_id' => $question2->id,
                'answer_text' => 'litani',
                'is_correct' => true
            ],
            [
                'question_id' => $question2->id,
                'answer_text' => 'gita',
                'is_correct' => false
            ],
            [
                'question_id' => $question2->id,
                'answer_text' => 'talina',
                'is_correct' => false
            ],
            [
                'question_id' => $question2->id,
                'answer_text' => 'linati',
                'is_correct' => false
            ],
        ]);
        $question3 = Question::create([
            'question_text' => 'Kata "RAMA" jika ditulis dengan huruf Aksara Batak (Simalungun), menjadi?',
            'type' => 'multiple_choice'
        ]);

        Answer::insert([
            [
                'question_id' => $question3->id,
                'answer_text' => 'ᯓᯕ',
                'is_correct' => true
            ],
            [
                'question_id' => $question3->id,
                'answer_text' => 'ᯒᯔ',
                'is_correct' => false
            ],
            [
                'question_id' => $question3->id,
                'answer_text' => 'ᯔᯒ',
                'is_correct' => false
            ],
            [
                'question_id' => $question3->id,
                'answer_text' => 'ᯕᯓ',
                'is_correct' => false
            ],
        ]);
        $question4 = Question::create([
            'question_text' => 'Kata "MAR" jika ditulis dengan huruf Aksara Batak (Mandailing), menjadi?',
            'type' => 'multiple_choice'
        ]);

        Answer::insert([
            [
                'question_id' => $question4->id,
                'answer_text' => 'ᯔᯒ᯲',
                'is_correct' => true
            ],
            [
                'question_id' => $question4->id,
                'answer_text' => 'ᯕᯓ᯳',
                'is_correct' => false
            ],
            [
                'question_id' => $question4->id,
                'answer_text' => 'ᯔᯒ',
                'is_correct' => false
            ],
            [
                'question_id' => $question4->id,
                'answer_text' => 'ᯔᯮᯒ᯲',
                'is_correct' => false
            ],
        ]);
        // $question5 = Question::create([
        //     'question_text' => 'cocokan huruf batak dengan tulisan latinnya',
        //     'type' => 'matching'
        // ]);

        // MatchPair::insert([
        //     [
        //         'question_id' => $question5->id,
        //         'item1' => 'a',
        //         'item2' => 'ᯀ'
        //     ],
        //     [
        //         'question_id' => $question5->id,
        //         'item1' => 'na',
        //         'item2' => 'ᯉ'
        //     ],
        //     [
        //         'question_id' => $question5->id,
        //         'item1' => 'ja',
        //         'item2' => 'ᯐ'
        //     ],
        //     [
        //         'question_id' => $question5->id,
        //         'item1' => 'ra',
        //         'item2' => 'ᯒ'
        //     ],

        // ]);

        $question5 = Question::create([
            "question_text" => "Apa fungsi dari tanda “᯲” dalam Aksara Batak?",
            "type" => "multiple_choice"
        ]);

        Answer::insert([
            [
                'question_id' => $question5->id,
                'answer_text' => 'Penanda konsonan mati',
                'is_correct' => true
            ],
            [
                'question_id' => $question5->id,
                'answer_text' => 'Tanda baca koma',
                'is_correct' => false
            ],
            [
                'question_id' => $question5->id,
                'answer_text' => 'Penanda akhir kalimat',
                'is_correct' => false
            ],
            [
                'question_id' => $question5->id,
                'answer_text' => 'Penanda vokal panjang',
                'is_correct' => false
            ],
        ]);
            $question6 = Question::create([
                "question_text" => 'Jika Aksara Batak "ᯔ" dalam latin adalah "ma" dan Aksara Batak "ᯮ" adalah "u", maka ketika disatukan akan menjadi kata apa?',
                "type" => "multiple_choice"
            ]);

            Answer::insert([
                [
                    'question_id' => $question6->id,
                    'answer_text' => 'mu',
                    'is_correct' => true
                ],
                [
                    'question_id' => $question6->id,
                    'answer_text' => 'ma',
                    'is_correct' => false
                ],
                [
                    'question_id' => $question6->id,
                    'answer_text' => 'mau',
                    'is_correct' => false
                ],
                [
                    'question_id' => $question6->id,
                    'answer_text' => 'mae',
                    'is_correct' => false
                ],
            ]);
    }
}
