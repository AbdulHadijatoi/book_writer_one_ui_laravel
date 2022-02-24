<?php

namespace App\Http\Controllers\StrChapters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\Book;
use App\Models\Scene;
use App\Models\StrChapter;
use Illuminate\Support\Facades\Auth;

class StrChaptersController extends Controller
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
        if($book == null){
            return view('/str_chapters/index');
        }
        $str_chapters = StrChapter::where([
            ['user_id', '=', $user_id],
            ['book_id', '=', $book->id]
        ])->orderBy('chapter_position')->get();
        return view('/str_chapters/index',['str_chapters' => $str_chapters]);
        // return view('/str_chapters/index');
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

        StrChapter::updateOrCreate(
            ['user_id' =>  $request->user_id,
             'book_id' =>  $request->book_id,
             'chapter_number' =>  $request->chapter_number],
            $request->input()
        );

        $str_chapter_id = StrChapter::select('id')
                ->where([
                    ['user_id', '=', $request->user_id],
                    ['book_id', '=', $request->book_id],
                    ['chapter_number', '=', $request->chapter_number]
                ])->first()->id;
        // return $request->scene_location[1];
        $request->request->add(['str_chapter_id' => $str_chapter_id]);
        
        for ($i=0; $i < count($request->scene_number); $i++) { 
            Scene::updateOrCreate(
                [
                    'scene_number' => $request->scene_number[$i],
                    'str_chapter_id' => $request->str_chapter_id,
                    'book_id' => $request->book_id,
                    'user_id' => $request->user_id
                ],
                [
                    'scene_number' => $request->scene_number[$i],
                    'scene_location' => $request->scene_location[$i],
                    'scene_characters' => $request->scene_characters[$i],
                    'scene_issues' => $request->scene_issues[$i],
                    'scene_abstract' => $request->scene_abstract[$i],
                    'str_chapter_id' => $request->str_chapter_id,
                    'book_id' => $request->book_id,
                    'user_id' => $request->user_id
            ]);
        }
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
        $user_id = Auth::id();
        $book = Book::where('user_id',$user_id)->first();
        if($book == null){
            return view('str_chapters.index')->with('failed','Access denied');
        }
        $str_chapters = StrChapter::where([
            ['user_id', '=', $user_id],
            ['book_id', '=', $book->id]
        ])->get();
        $currentChapter = StrChapter::where('user_id',$user_id)->where([
            ['user_id', '=', $user_id],
            ['book_id', '=', $book->id],
            ['chapter_number', '=', $id]
        ])->first();
        if($currentChapter == null){
            return view('str_chapters.index')->with('failed','Access denied');
        }
        $scenes = Scene::where('str_chapter_id',$currentChapter->id)->get();
        return view('str_chapters.view',['str_chapters' => $str_chapters, 'currentChapter' => $currentChapter, 'scenes' => $scenes]);
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
            return back()->with('failed','Please add book first and then come back for this!');
        }
        $request->request->add(['book_id' => $book->id]);
        $request->request->add(['user_id' => Auth::id()]);
        
        StrChapter::updateOrCreate(
            ['user_id' =>  $request->user_id,
             'book_id' =>  $request->book_id,
             'chapter_number' =>  $request->chapter_number],
            $request->input()
        );

        $str_chapter_id = StrChapter::select('id')
                ->where([
                    ['user_id', '=', $request->user_id],
                    ['book_id', '=', $request->book_id],
                    ['chapter_number', '=', $request->chapter_number]
                ])->first()->id;
        // return $request->scene_location[1];
        $request->request->add(['str_chapter_id' => $str_chapter_id]);
        $scenes = Scene::where('str_chapter_id','=',$str_chapter_id)->get();
        $scenes->each->delete();
        for ($i=0; $i < count($request->scene_number); $i++) { 
            Scene::updateOrCreate(
                [
                    'scene_number' => $request->scene_number[$i],
                    'str_chapter_id' => $request->str_chapter_id,
                    'book_id' => $request->book_id,
                    'user_id' => $request->user_id
                ],
                [
                    'scene_number' => $request->scene_number[$i],
                    'scene_location' => $request->scene_location[$i],
                    'scene_characters' => $request->scene_characters[$i],
                    'scene_issues' => $request->scene_issues[$i],
                    'scene_abstract' => $request->scene_abstract[$i],
                    'str_chapter_id' => $request->str_chapter_id,
                    'book_id' => $request->book_id,
                    'user_id' => $request->user_id
            ]);
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
        StrChapter::where('id','=',$id)->delete();
        return view('str_chapters.index')->with('success','successfully deleted!');
    }

}
