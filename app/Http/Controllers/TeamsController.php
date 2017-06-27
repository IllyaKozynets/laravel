<?php

namespace App\Http\Controllers;

use App\Teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * CRUD for Teams
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id)
    {
        $teams = Teams::find($id);
        $teams->delete();
        return redirect()->back();
    }

    public function update($id,Request $request)
    {

        if ($request->isMethod('get')) {
            $team=Teams::find($id);
            return view('teams/update', ['team' => $team]);
        }
        elseif ($request->isMethod('post')){
            $team=Teams::find($id);
            $team->name = $request->input('name');
            $team->points = $request->input('points');
            $team->save();
            return redirect()->to('/admin/teams');
        }
    }

    public function read()
    {
        $teams = Teams::orderByDesc('points')->get(['id', 'name', 'points'])->toArray();

        return view('teams/read', ['teams' => $teams]);

    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('teams/create');
        }
        elseif ($request->isMethod('post')){
            $team=new Teams();
            $team->name = $request->input('name');
            $team->points = $request->input('points');
            $team->save();
            return redirect()->to('/admin/teams');
        }

    }
}
