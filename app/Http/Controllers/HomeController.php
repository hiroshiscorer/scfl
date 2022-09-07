<?php

namespace App\Http\Controllers;

use App\Models\division;
use App\Models\season;
use App\Models\team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $season = season::orderByDesc('created_at')->first();
        $division = $season != '' ? division::where('season_id', $season->id)->get() : '';

        $standings1 = DB::table('teams')
            ->select(DB::raw('teams.id, team_name, SUM(team1_score) score_one, logo'))
            ->leftJoin('matchups', 'teams.id', '=', 'matchups.team1_id')
            ->groupBy('id')
            ->orderBy('id')
            ->get();

        $standings2 = DB::table('teams')
            ->select(DB::raw('teams.id, team_name, SUM(team2_score) score_two, logo'))
            ->leftJoin('matchups', 'teams.id', '=', 'matchups.team2_id')
            ->groupBy('id')
            ->orderBy('id')
            ->get();

        return view('home', compact('season', 'division', 'standings1', 'standings2'));
    }

    public function teams()
    {
        $season = season::orderByDesc('created_at')->first();
        $division = $season != '' ? division::where('season_id', $season->id)->get() : '';

        return view('teams', compact('season', 'division'));
    }

    public function pilots()
    {
        $season = season::orderByDesc('created_at')->first();
        $pilots = DB::table('pilots')
            ->join('teams', 'pilots.team_id', '=', 'teams.id')
            ->join('divisions', 'teams.division_id', '=', 'divisions.id')
            ->select('pilots.*', 'teams.team_name', 'teams.initials', 'divisions.division_name')
            ->orderBy('teams.id')
            ->orderBy('pilots.pilot_name')
            ->get();


        return view('pilots', compact('season', 'pilots') );
    }

    public function schedule()
    {
        $season = season::orderByDesc('created_at')->first();
        $divisions = $season != '' ? division::where('season_id', $season->id)->get() : '';

        $allTeams = team::all();

        return view('schedule', compact('season', 'divisions', 'allTeams') );
    }

    public function backdoor()
    {
        return view('backdoor');
    }
    public function rules()
    {
        return view('rules');
    }
    public function seasons()
    {
        return view('seasons');
    }
}

