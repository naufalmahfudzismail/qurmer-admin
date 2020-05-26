<?php

namespace App\Http\Controllers\BackOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;
use App\Model\Challenge;
use App\Model\Surah;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.challenge.index');
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

    public function getData(){
        $data = Challenge::with('multiJoin');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $button = '<a href="/master/article/' . $row['id'] . '/edit"><button class="btn btn-warning btn-sm edit" style="float:left;" id="' . $row['id'] . '"><i class="fa fa-pencil"></i> Edit</button></a>';
                $button .= '<a href="javascript:;"><button class="btn btn-danger btn-sm delete" id="' . $row['id'] . '"><i class="fa fa-trash"></i> Delete</button></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
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
