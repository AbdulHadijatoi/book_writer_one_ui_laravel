<?php

namespace App\Http\Controllers\Structure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $book = Book::where('user_id',Auth::id())->first();
        if($book == null){
            return view('/structure/index');
        }
        $structure = Structure::where([
            ['user_id', '=', $user_id],
            ['book_id', '=', $book->id]
        ])->first();
        return view('/structure/index',['structure'=>$structure]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::where('user_id',Auth::id())->first();
        if($book == null){
            return back()->with('failed','Please add book first and then come back for this!');
        }
        $request->request->add(['book_id' => $book->id]);
        $request->request->add(['user_id' => Auth::id()]);
        Structure::updateOrCreate(
            ['user_id' =>  $request->user_id],
            $request->input()
        );
        return back()->withSuccess('Successfully added!');
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
