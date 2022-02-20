<?php

namespace App\Http\Controllers\Sources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\Book;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $source = Source::where('user_id',$user_id)->first();
        return view('/sources/index',['source'=>$source]);
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
        $book_id = Book::where('user_id',Auth::id())->first()->id;
        if($book_id != null){
            $request->request->add(['book_id' => $book_id]);
        }
        $request->request->add(['user_id' => Auth::id()]);
        Source::updateOrCreate(
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
