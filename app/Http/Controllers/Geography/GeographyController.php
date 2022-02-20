<?php

namespace App\Http\Controllers\Geography;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Geography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeographyController extends Controller
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
            $geographies = Geography::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
            ])->get();
            return view('/geography/index',['geographies'=>$geographies]);
        }
        return view('/geography/index');
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
            Geography::updateOrCreate(
                ['user_id' =>  $request->user_id, 'book_id' =>  $request->book_id, 'place_name' =>  $request->place_name],
                $request->input()
            );
            return back()->withSuccess('Successfully added!');
        }

        return back()->with('failed','Please add book first and then create geography!');
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
            $geography = Geography::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
                ['id', '=', $id]
            ])->first();
            
            if($geography == null){
                return back()->with('failed',"You don't have access to that geography.");
            }
            $geographies = Geography::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id]
            ])->get();
            
            return view('/geography/view',['geography'=>$geography, 'geographies'=>$geographies]);
        }
        return back()->with('failed',"You don't have access to this geography.");
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
        
        Geography::updateOrCreate(
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
        Geography::where('id','=',$id)->delete();
        return view('geography.index')->with('success','successfully deleted!');
    }
}
