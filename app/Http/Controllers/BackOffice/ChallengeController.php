<?php

namespace App\Http\Controllers\BackOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Level;
use App\Model\Challenge;
use App\Model\Surah;
use Yajra\DataTables\Facades\DataTables;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Challenge::select('challenges.*', 'surahs.nama', 'levels.id as level', 'levels.name', 'levels.bonus_score')->join('levels', 'challenges.level_id', 'levels.id')
        ->join('surahs', 'challenges.surah_id', 'surahs.id')->get();

        return view('dashboard.challenge.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surahs = Surah::orderBy('id')->get();
        $levels = Level::orderBy('id')->get();
        return view('dashboard.challenge.add', compact('surahs', 'levels'));
    }



    public function test(){
        $data = Challenge::select('challenges.*', 'surahs.nama', 'levels.id', 'levels.name', 'levels.bonus_score')->join('levels', 'challenges.level_id', 'levels.id')
        ->join('surahs', 'challenges.surah_id', 'surahs.id')->get();
        dd($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $daily = $request['daily'];
        if($daily == "on"){
            $daily = true;
        }else{
            $daily = false;
        }

        $challenge = new Challenge();
        $challenge->level_id = $request['level_id'];
        $challenge->surah_id = $request['surah_id'];
        $challenge->score = $request['score'];
        $challenge->time = $request['time'];
        $challenge->daily = $daily;
        $challenge->save();
    
        return redirect()->route('challenge.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
