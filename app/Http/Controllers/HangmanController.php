<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HangmanController extends Controller
{
    public function index() {
        $aantal = 0;
        session('aantal', $aantal);
        $rcolor = "red";

        $contents = FILE::get(storage_path('words.txt'));
        $words = explode("\n", $contents);

        session('words', $words);
        $index = rand(0, count($words));
        $sword = $words[$index];
        session('sword', $sword);

        return view('index', compact('sword', 'aantal', 'rcolor'));
    }

    public function store(Request $request) {

        if($request->input('action') == 'Probeer') {
            $gword = $request->input('gword');
            $sword = session('sword');
            $rcolor = "red";

            if(strlen($gword) == 0) {
                $rword = "Graag een woord invullen";
            } else {
                if(strlen($sword) != strlen($gword)) {
                    $rword = "Het woord heeft de verkeerde lengte";
                } else {
                    if($sword == $gword) {
                        $rword = "Goed geraden!!!!";
                        $rcolor = "green";
                        $words = session(['words']);
                        $index = rand(0, count($words));
                        $sword = $words[$index];
                        session('sword', $sword);
                        session('aantal', 0);
                    } else {
                        $rword = compareWords($sword, $gword);
                        if($sword == $rword) {
                            $rword = "Goed geraden!!!!";
                            $rcolor = "green";
                            $words = session('words');
                            $index = rand(0, count($words));
                            $sword = $words[$index];
                            session('sword', $sword);
                            session('aantal', 0);
                        } else {
                            session('aantal', session('aantal') + 1);
                        }
                    }
                }
            }
            return view('store', compact('sword', 'gword', 'rword', 'aantal', 'rcolor'));
        } else {
            $sword = session('sword');
            $aantal = session('aantal');

            return view('store', compact('sword', 'aantal'));
        }
    }

    private function compareWords($sword, $gword) {
        $rword = "";
        for($i = 0; $i < strlen($sword); $i++) {
            if($sword[$i] == $gword[$i]) {
                $rword = $rword.$sword[$i];
            } else {
                $rword = $rword.".";
            }
        }
        return $rword;
    }
}
