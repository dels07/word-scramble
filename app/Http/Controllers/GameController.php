<?php

namespace App\Http\Controllers;

use App\User;
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
        $wordIds = ! empty(auth()->user()->words) ? explode(',', auth()->user()->words) : '';
        $word = Word::with('category')
                    ->when(! empty($wordIds), function ($query) use ($wordIds) {
                        return $query->whereNotIn('id', $wordIds);
                    })
                    ->when(config('database.default') == 'mysql', function ($query) {
                        return $query->orderByRaw('RAND()');
                    })
                    ->when(config('database.default') == 'sqlite', function ($query) {
                        return $query->orderByRaw('RANDOM()');
                    })
                    ->first();

        $response = [
            'id'       => $word->id,
            'word'     => $word->word_shuffled,
            'category' => $word->category->name
        ];

        return response()->json($response);
    }

    public function checkAnswer(Request $request)
    {
        $wordId = $request->word_id;
        $answer = $request->answer;

        $words = Word::find($wordId);
        $user  = auth()->user();

        // Check answer
        if ($words->word == $answer) {
            $result = ['status' => 'correct', 'point' => 10];

            // Update score & word
            $user->point += $result['point'];
            $user->words = ltrim($user->words.','.$words->id, ',');
        } else {
            $result = ['status' => 'wrong', 'point' => -5];

            // update only score
            $user->point += $result['point'];
        }

        $user->save();

        // Write history
        History::create([
            'user_id' => auth()->user()->id,
            'word_id' => $words->id,
            'point'   => $result['point']
        ]);

        return response()->json($result);
    }
}
