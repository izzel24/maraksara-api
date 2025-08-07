<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuizAnswer;
use App\Models\QuizSession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
   public function startQuiz(){
    $session = QuizSession::create([
        'token' => Str::uuid(),
        'score' => 0,
        'expired_at' => now()->addMinutes(30)
    ]);

    return response()->json([
        'message' => 'Quiz session started',
        'session' => $session,
    ]);
   }

   public function submitAnswer(Request $request, $sessionToken){
        $session = QuizSession::where('token', $sessionToken)->firstOrFail();
        $question = Question::findOrFail($request->question_id);

        if ($question->type === 'matching') {
            QuizAnswer::create([
                'quiz_session_id' => $session->id,
                'question_id' => $question->id,
                'answer_data' => json_encode($request->answer_data),
            ]);
        } else {
            $answer = Answer::findOrFail($request->answer_id);
            QuizAnswer::create([
                'quiz_session_id' => $session->id,
                'question_id' => $question->id,
                'answer_id' => $answer->id,
            ]);
        }

        return response()->json([
            'message' => 'Answer submitted',
        ]);
   }

    public function finish($sessionToken)
    {
        $session = QuizSession::where('token', $sessionToken)->with('quizAnswers.question', 'quizAnswers.answer')
            ->firstOrFail();
        $score = 0;
        $results = [];

        foreach ($session->quizAnswers as $qa) {
            $question = $qa->question;
            $questionText = $question->text;
            $type = $question->type;

            if ($type === 'matching') {
                $userPairs = collect(json_decode($qa->answer_data, true));
                $correctPairs = $question->matchPairs->map(function ($pair) {
                    return ['left' => $pair->item1, 'right' => $pair->item2];
                });

                $correctCount = 0;
                $pairResults = [];

                foreach ($userPairs as $userPair) {
                    $isCorrect = $correctPairs->contains(function ($correctPair) use ($userPair) {
                        return $userPair['left'] === $correctPair['left'] && $userPair['right'] === $correctPair['right'];
                    });

                    if ($isCorrect) {
                        $score += 5;
                        $correctCount++;
                    }

                    $pairResults[] = [
                        'left' => $userPair['left'],
                        'right' => $userPair['right'],
                        'is_correct' => $isCorrect,
                    ];
                }

                $results[] = [
                    'question' => $questionText,
                    'type' => 'matching',
                    'user_answer' => $pairResults,
                    'correct_answer' => $correctPairs,
                    'score_from_this_question' => $correctCount,
                ];
            } else {
                $isCorrect = $qa->answer && $qa->answer->is_correct;

                if ($isCorrect) {
                    $score += 20;
                }

                $results[] = [
                    'question' => $questionText,
                    'type' => $type,
                    'user_answer' => $qa->answer->text ?? null,
                    'is_correct' => $isCorrect,
                    'correct_answer' => $question->answers->firstWhere('is_correct', true)?->answer_text ?? null,
                ];
            }
        }

        $details = $session->quizAnswers->map(function ($qa) {
            return [
                'question' => $qa->question->question_text ?? null,
                'type' => $qa->question->type ?? null,
                'user_answer' => $qa->answer->answer_text ?? null,
                'correct_answer' => $qa->question->answers->firstWhere('is_correct', true)?->answer_text ?? null,
                'is_correct' => $qa->answer?->is_correct ?? false,
            ];
        });
        $session->update(['score' => $score]);
        // $session->quizAnswers()->delete();
        // $session->delete();


        $response = [
            'message' => 'Quiz finished',
            'final_score' => $score,
            'details' => $details,
        ];

        return response()->json($response);
    }

    public function endQuiz($sessionToken){
        $session = QuizSession::where('token', $sessionToken)->with('quizAnswers.question', 'quizAnswers.answer')
            ->firstOrFail();

        $session->quizAnswers()->delete();
        $session->delete();

    }

    public function getNextQuestion($token)
    {
        $quizSession = QuizSession::where('token', $token)->firstOrFail();

        $answeredQuestionIds = QuizAnswer::where('quiz_session_id', $quizSession->id)
            ->pluck('question_id')
            ->toArray();

        $question = Question::with('answers')
            ->whereNotIn('id', $answeredQuestionIds)
            ->where('type', 'multiple_choice')
            ->inRandomOrder()
            ->first();

        if (!$question) {
            return response()->json(['message' => 'Quiz finished'], 200);
        }

        $response = [
            'id' => $question->id,
            'question_text' => $question->question_text,
            'type' => $question->type,
            'answers' => $question->answers->map(function ($answer) {
                return [
                    'id' => $answer->id,
                    'question_id' => $answer->question_id,
                    'answer_text' => $answer->answer_text,
                ];
            }),
        ];

        return response()->json([
            'question' => $response,
            'answered_count' => count($answeredQuestionIds),
        ]);
    }
}
