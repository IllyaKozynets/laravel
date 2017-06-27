<?php

namespace App\Http\Controllers;

use App\Matches;
use App\Teams;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    /**
     * CRUD for Matches
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id)
    {
        $match = Matches::find($id);
        $match->delete();
        return redirect()->back();
    }

    public function update($id,Request $request)
    {

        if ($request->isMethod('get')) {
            $match=Matches::find($id);
            $teams=Teams::get(['id','name']);
            return view('matches/update', ['match' => $match,'teams'=>$teams]);
        }
        elseif ($request->isMethod('post')){
            $match=Matches::find($id);
            $match->team_one_id = $request->input('team_one_id');
            $match->team_two_id = $request->input('team_two_id');
            if(empty($request->input('result')))
                $match->result='null';
            else
                $match->result = $request->input('result');
            $match->date = $request->input('date');
            $match->save();
            return redirect()->to('/admin/matches');

        }
    }

    public function read()
    {
        $matches = Matches::orderByDesc('date')->get()->toArray();
        foreach ($matches as $key=>$match){
            $matches[$key]['team_one']=Teams::find($match['team_one_id'])->name;
            $matches[$key]['team_two']=Teams::find($match['team_two_id'])->name;
        }
        return view('matches/read', ['matches' => $matches]);

    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            $teams=Teams::get(['id','name']);
            return view('matches/create',['teams'=>$teams]);
        }
        elseif ($request->isMethod('post')){

            $match=new Matches();
            $match->team_one_id = $request->input('team_one_id');
            $match->team_two_id = $request->input('team_two_id');
            if(empty($request->input('result')))
                $match->result='null';
            else
            $match->result = $request->input('result');
            $match->date = $request->input('date');
            $match->save();
            return redirect()->to('/admin/matches');
        }

    }
}
