<?php

namespace App\Http\Controllers\Universe\Civilization;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Universe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CivilizationController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $book = Book::where('user_id',$user_id)->first();
        if($book != null){
            $universe = Universe::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
                ['universe_type_id', '=', 2],
            ])->get();
            return view('/universe/civilization/index',['c_universes'=>$universe]);
        }
        return view('/universe/civilization/index');
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

        $request->request->add(['user_id' => Auth::id()]);
        $book = Book::where('user_id',Auth::id())->first();
        
        if($book != null){
            $request->request->add(['book_id' => $book->id]);
            $request->request->add(['universe_type_id' => 2]);
            Universe::updateOrCreate(
                ['user_id' =>  $request->user_id,
                'book_id' =>  $request->book_id,
                'name' => $request->name,
                'description' => $request->description],
                $request->input()
            );
            return back()->withSuccess('Successfully added!');
        }
        return back()->with('failed','Please add book first and then create universe!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $book = Book::where('user_id',$user_id)->first();
        if($book != null){
            $universe = Universe::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
                ['id', '=', $id]
            ])->first();
            
            if($universe == null){
                return back()->with('failed',"You don't have access to that universe.");
            }
            $universe = Universe::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id]
            ])->get();
            
            return view('/universe/civilization/view',['c_universe'=>$universe, 'c_universes'=>$universe]);
        }
        return back()->with('failed',"You don't have access to that universe.");
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
        $book = Book::where('user_id',Auth::id())->first();
        if($book == null){
            return back()->with('failed','Access denied');
        }

        $request->request->add(['user_id' => Auth::id()]);
        $request->request->add(['book_id' => $book->id]);
        
        Universe::updateOrCreate(
            ['user_id' =>  $request->user_id,
             'book_id' =>  $request->book_id,
             'id' =>  $id],
            $request->input()
        );

        return back()->withSuccess('Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Universe::where('id','=',$id)->delete();
        return view('universe.civilization.index')->with('success','successfully deleted!');
    }
}
