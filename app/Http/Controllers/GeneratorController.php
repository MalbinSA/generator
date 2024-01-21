<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Exception;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function index()
    {
        $texts = Text::all();
//        dd($texts);
        return response()->view('texts-list', compact('texts'));
    }

    public function create()
    {
        return response()->view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['text' => 'required|string']);

        Text::create(['text' => $data['text']]);

        return redirect()->route('text.index');
    }

    public function destroy(Text $id)
    {
//        $id= request()->id;
        $id->delete();
        return redirect()->route('text.index');

    }

    public function generate(Request $request)
    {
        $request->validate([
            'value' => 'integer'
        ]);

        if ($request->has('value')) {

            $quantity = $request->value > 1 ? $request->value : 2;

            $texts = Text::inRandomOrder()
                ->limit($quantity)
                ->pluck('text');

            $paragraphs = [];

            foreach ($texts as $sentence) {
                $sentences = preg_split('/(?<=[.?!])\s+/', $sentence);

                foreach ($sentences as $sentence) {
                    $paragraphs[] = $sentence;
                }
            }

            if (count($paragraphs) < $request->value) {
                $error = 'В базе недостаточно предложений для вывода текста';
                return response()->view('generate-text', compact('error'));
            }

            $keys = array_rand($paragraphs, $request->value);

            $generatedValues = [];

            if (is_array($keys)) {
                foreach ($keys as $key) {
                    $generatedValues[] = $paragraphs[$key];
                }
            } else {
                $generatedValues[] = $paragraphs[$keys];
            }

            $generatedText = implode(' ', $generatedValues);

            return response()->view('generate-text', compact('generatedText'));

        }


        return response()->view('generate-text');
    }
}
