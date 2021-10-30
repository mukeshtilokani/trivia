<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Create a new game.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('game.index');
    }

    /**
     * Store a new game.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = validator(request()->all(), [
            'your_name' => ['required'],
            'best_cricketer' => ['required'],
            'national_flag' => ['required', 'array'],
        ])->validate();

        $game = new Game();
        $game->name = $data['your_name'];
        $game->best_cricketer = $data['best_cricketer'];
        $game->flag_colour = implode(", ", $data['national_flag']);
        $game->save();
        Session::flash('message', 'Game has been finished successfully.'); 
        return redirect()->back();
    }

    /**
     * Show a game history.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function history(Request $request)
    {
        $games = Game::all();
        return view('game.history', ['games' => $games]);
    }
}
