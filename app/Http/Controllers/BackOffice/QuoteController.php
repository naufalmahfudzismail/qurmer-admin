<?php

namespace App\Http\Controllers\BackOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Quote;
use DataTables;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.quote.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData(){
        $data = Quote::get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('image', function($row){
            $url = asset('image/quote/'.$row->image);
            return '<img height="100px" width="100px" src="'.$url.'" class="img-thumbnail"/>';
        })
        ->addColumn('action', function($row){
            $button = '<a href="/quote/'.$row['id'].'/edit"><button class="btn btn-warning btn-sm edit" style="float:left;" id="'.$row['id'].'"><i class="fa fa-pencil"></i> Edit</button></a>';
            $button .= '<a href="javascript:;"><button class="btn btn-danger btn-sm delete" id="'.$row['id'].'"><i class="fa fa-trash"></i> Delete</button></a>';
            return $button;
        })
        ->rawColumns(['image','action'])
        ->make(true);
    }
    public function create()
    {
        return view('dashboard.quote.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = str_random(32).'-'. $file->getClientOriginalName();
            $file->move(public_path('image/quote'), $fileName);
        }else{
            $fileName = null;
        }
        $article = new Quote();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->image = $fileName;
        $article->save();
        
        return redirect()->route('quote.index');
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
