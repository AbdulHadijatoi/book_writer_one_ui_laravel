<?php

namespace App\Http\Controllers\Characters;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharactersController extends Controller
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
            $characters = Character::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
            ])->get();
            return view('/characters/index',['characters'=>$characters]);
        }
        return view('/characters/index');
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
            $character = Character::updateOrCreate(
                ['user_id' =>  $request->user_id, 'book_id' =>  $request->book_id, 'f_name' => $request->f_name, 'l_name' => $request->l_name, 'gender' => $request->gender],
                $request->input()
            );
            if( $request->hasFile( 'avatar' ) ) {
                $destinationPath = storage_path( 'app/public/characters' );
                $file = $request->avatar;
                $fileName = time() . '.'.$file->clientExtension();
                $file->move( $destinationPath, $fileName );
            
                $character->avatar = $fileName;
                $character->save();
            }
            return back()->withSuccess('Successfully added!');
        }
        return back()->with('failed','Please add book first and then create charater!');
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
            $character = Character::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
                ['id', '=', $id]
            ])->first();
            
            if($character == null){
                return back()->with('failed',"You don't have access to that characters.");
            }
            $characters = Character::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id]
            ])->get();
            
            return view('/characters/view',['character'=>$character, 'characters'=>$characters]);
        }
        return back()->with('failed',"You don't have access to this characters.");
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
        
        $character = Character::updateOrCreate(
            ['user_id' =>  $request->user_id,
             'book_id' =>  $request->book_id,
             'id' =>  $id],
            $request->input()
        );

        if( $request->hasFile( 'avatar' ) ) {
            $destinationPath = storage_path( 'app/public/characters' );
            $file = $request->avatar;
            $fileName = time() . '.'.$file->clientExtension();
            $file->move( $destinationPath, $fileName );
        
            $character->avatar = $fileName;
            $character->save();
        }

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
        Character::where('id','=',$id)->delete();
        return view('characters.index')->with('success','successfully deleted!');
    }
}
