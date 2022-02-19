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
        // $user_id = Auth::id();
        // $chapter = StrChapter::where('user_id',$user_id)->first();
        // return view('/str_chapters/index',['chapter' => $chapter]);
        return view('/str_chapters/index');
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
        $request->request->add(['user_id' => Auth::id(),'book_id' => Book::where('user_id',Auth::id())->first()->id]);
        

        StrChapter::updateOrCreate(
            ['user_id' =>  $request->user_id,
             'book_id' =>  $request->book_id,
             'chapter_type_id' =>  $request->chapter_type_id,
             'chapter_number' =>  $request->chapter_number,
             'chapter_position' =>  $request->chapter_position],
            $request->input()
        );

        $chapter_id = StrChapter::select('id')
                ->where([
                    ['user_id', '=', $request->user_id],
                    ['book_id', '=', $request->book_id],
                    ['chapter_type_id', '=', $request->chapter_type_id],
                    ['chapter_number', '=', $request->chapter_number],
                    ['chapter_position', '=', $request->chapter_position]
                ])->first()->id;
        // return $request->scene_location[1];
        $request->request->add(['chapter_id' => $chapter_id]);
        
        for ($i=0; $i < count($request->scene_number); $i++) { 
            Scene::create([
                'scene_number' => $request->scene_number[$i],
                'scene_location' => $request->scene_location[$i],
                'scene_characters' => $request->scene_characters[$i],
                'scene_issues' => $request->scene_issues[$i],
                'scene_abstract' => $request->scene_abstract[$i],
                'chapter_id' => $request->chapter_id,
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

    public function get_chapter(){
        return view('str_chapters.view');
    }
}
