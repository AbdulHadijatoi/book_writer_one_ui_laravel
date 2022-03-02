<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
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
            $notes = Note::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
            ])->get();
            return view('/notes/index',['notes'=>$notes]);
        }
        return view('/notes/index');
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
            Note::updateOrCreate(
                ['user_id' =>  $request->user_id, 'book_id' =>  $request->book_id, 'title' =>  $request->title],
                $request->input()
            );
            return back()->withSuccess('Successfully added!');
        }

        return back()->with('failed','Please add book first and then create notes!');
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
            $note = Note::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
                ['id', '=', $id]
            ])->first();
            
            if($note == null){
                return back()->with('failed',"You don't have access to that note.");
            }
            $notes = Note::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id]
            ])->get();
            
            return view('/notes/view',['note'=>$note, 'notes'=>$notes]);
        }
        return back()->with('failed',"You don't have access to this note.");
        
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
    public function update(Request $request,$id)
    {
        $book = Book::where('user_id',Auth::id())->first();
        if($book == null){
            return back()->with('failed','Access denied');
        }

        $request->request->add(['user_id' => Auth::id()]);
        $request->request->add(['book_id' => $book->id]);
        
        Note::updateOrCreate(
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
        Note::where('id','=',$id)->delete();
        return redirect()->route('notes.index')->with('success','successfully deleted!');
    }

}
