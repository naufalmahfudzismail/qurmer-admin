<?php

namespace App\Http\Controllers\BackOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Audio;
use App\Model\Surah;
use DataTables;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.audio-surah.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function getData(){
        $data = Audio::with('surah')->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('file', function($row){
            $url = asset('audio-asset/'.$row->file);
            return '<audio controls controlsList="nodownload">
            <source src="'.$url.'"  type="audio/mpeg" data-recordings = "'.$url.'">
            </audio>';
        })
        ->addColumn('action', function($row){
            $button = '<a href="/audio/'.$row['id'].'/edit"><button class="btn btn-warning btn-sm edit" style="float:left;" id="'.$row['id'].'"><i class="fa fa-pencil"></i> Edit</button></a>';
            $button .= '<a href="javascript:;"><button class="btn btn-danger btn-sm delete" id="'.$row['id'].'"><i class="fa fa-trash"></i> Delete</button></a>';
            return $button;
        })
        ->rawColumns(['file','action'])
        ->make(true);
    }
    public function create()
    {
        $surahs = Surah::orderBy('id')->get();
        return view('dashboard.audio-surah.add', compact('surahs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = str_random(8).'-'. $file->getClientOriginalName();
            $file->move(public_path('audio-asset'), $fileName);
        }else{
            $fileName = null;
        }
        $audio = new Audio();
        $audio->surah_id = $request->surah_id;
        $audio->file= $fileName;
        $audio->save();
        
        return redirect()->route('audio.index');
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
