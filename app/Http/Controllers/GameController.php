<?php

namespace App\Http\Controllers;

use App\Word;
use App\History;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function getWord()
    {
        $wordIds = explode(',', auth()->user()->words);
        $word = Word::with('category')
                    ->whereNotIn('id', $wordIds)
                    ->orderByRaw('RAND()')
                    ->first();

        return response()->json($word);
    }

    public function checkAnswer(Request $request)
    {
        $wordId = $request->word_id;
        $answer = $request->answer;

        $words = Word::find($wordId);

        // Check answer
        if ($words->word == $answer) {
            $result = ['status' => 'correct', 'point' => 10];

            // Update score & word
            $user = auth()->user();
            $user->point += $result['point'];
            $user->words = ltrim(',', $user->words.','.$words->id);
            $user->save();
        } else {
            $result = ['status' => 'wrong', 'point' => -5];
        }

        // Write history
        History::create([
            'user_id' => auth()->user()->id,
            'word_id' => $words->id,
            'point'   => $result['point']
        ]);

        return response()->json($result);
    }
}
