<?php

namespace App\Http\Controllers\Illustrations;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IllustrationsController extends Controller
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
            $pictures = Picture::
            where([
                ['user_id', '=', $user_id],
                ['book_id', '=', $book->id],
            ])->get();
            return view('/illustrations/index',['pictures'=>$pictures]);
        }
        return view('/illustrations/index');
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
            return back()->with('failed','Please add book before uploading images.');
        }

        $request->request->add(['user_id' => Auth::id()]);
        $request->request->add(['book_id' => $book->id]);
        
        if( $request->hasFile( 'image_name' ) ) {
            $destinationPath = storage_path( 'app/public/illustrations' );
            $file = $request->image_name;
            $fileName = time() . '.'.$file->clientExtension();
            $file->move( $destinationPath, $fileName );
            $picture = new Picture();
            $picture->user_id = $request->user_id;
            $picture->book_id = $request->book_id;
            $picture->image_name = $fileName;
            $picture->save();
            return back()->with('success','Uploaded successfully!');
        }
        return back()->with('failed','Could not upload picture!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('/illustrations/view');
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
        Picture::where('id','=',$id)->delete();
        return redirect()->route('illustrations.index')->with('success','successfully deleted!');
    }
}
