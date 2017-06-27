<?php

namespace App\Http\Controllers;

use App\Matches;
use App\Teams;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function standings()
    {
        $teams = Teams::orderByDesc('points')->get(['id', 'name', 'points'])->toArray();

        return view('home', ['teams' => $teams]);
    }

    /**
     * Show the info about upcoming matches
     */
    public function schedule()
    {
        $matches = Matches::where('result', 'null')->orderBy('date')->get()->toArray();
        foreach ($matches as $key => $match) {
            $matches[$key]['team_one_id'] = Teams::find($match['team_one_id'])->name;
            $matches[$key]['team_two_id'] = Teams::find($match['team_two_id'])->name;
        }
        return view('schedule', ['matches' => $matches]);
    }

    /**
     * Show the finished matches info
     */
    public function result()
    {
        $result = Matches::where('result', '<>', 'null')->orderByDesc('date')->get()->toArray();
        foreach ($result as $key => $one) {
            $result[$key]['team_one_id'] = Teams::find($one['team_one_id'])->name;
            $result[$key]['team_two_id'] = Teams::find($one['team_two_id'])->name;
        }
        return view('result', ['result' => $result]);
    }

    public function search(Request $request)
    {
        $teams = Teams::where('name', 'like', '%' . $request->search . '%')->get(['id', 'name']);
        echo '<ul class="list-unstyled">';
        foreach ($teams as $key => $team) {
            echo '<li><a href="/show/team/' . $team->id . '">' . $team->name . '</a></li>';
        }
        echo '</ul>';
    }

    /**
     * Function for displaying all information about team
     */
    public function info($id)
    {
        $matches_end = null;
        $matches_will = null;
        $team = Teams::find($id);
        $matches = Matches::where('team_one_id', $id)->orWhere('team_two_id', $id)->orderByDesc('date')->get()->toArray();
        foreach ($matches as $key => $match) {
            $match['team_one_id'] = Teams::find($match['team_one_id'])->name;
            $match['team_two_id'] = Teams::find($match['team_two_id'])->name;

            if ($match['result'] == 'null') {
                $matches_will[] = $match;
            } else
                $matches_end[] = $match;
        }
        return view('info', ['team' => $team, 'matches_end' => $matches_end, 'matches_will' => $matches_will]);
    }

    /**
     * Function for registration of a subscription by the user
     */
    public function subscribe($team_id)
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $user->subscription_id = $team_id;
            $user->save();
        }
        return redirect()->back();
    }
}
