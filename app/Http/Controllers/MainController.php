<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Character;
use App\Models\Geography;
use App\Models\Note;
use App\Models\Picture;
use App\Models\Source;
use App\Models\StrChapter;
use App\Models\Structure;
use App\Models\Universe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class MainController extends Controller
{
    public function get_universes()
    {
        $user_id = Auth::id();
        $book = Book::where('user_id',$user_id)->first();
        if($book != null){
            $t_universes = Universe:: where([ ['universe_type_id', '=', 5], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $o_universes = Universe:: where([ ['universe_type_id', '=', 6], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $m_universes = Universe:: where([ ['universe_type_id', '=', 3], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $ml_universes = Universe:: where([ ['universe_type_id', '=', 4], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $c_universes = Universe:: where([ ['universe_type_id', '=', 2], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $b_universes = Universe:: where([ ['universe_type_id', '=', 1], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            return view('/universe/index',[ 
                'o_universes'=>$o_universes,
                't_universes'=>$t_universes,
                'ml_universes'=>$ml_universes,
                'm_universes'=>$m_universes,
                'c_universes'=>$c_universes,
                'b_universes'=>$b_universes,
            ]);
        }
        return view('/universe/index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $user_id = Auth::id();
        $book = Book::where('user_id',$user_id)->first();
        if($book != null){
            $book_info = Book::where('user_id',$user_id)->first();
            $structure = Structure::where('user_id',$user_id)->first();
            $str_chapters = StrChapter::where('user_id',$user_id)->orderBy('chapter_number')->orderBy('chapter_position')->get();
            $chapters = Chapter::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->orderBy('chapter_number')->get();
            $characters = Character::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            $geographies = Geography::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            // UNIVERSE:BEGINS
            $t_universes = Universe:: where([ ['universe_type_id', '=', 5], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $o_universes = Universe:: where([ ['universe_type_id', '=', 6], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $m_universes = Universe:: where([ ['universe_type_id', '=', 3], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $ml_universes = Universe:: where([ ['universe_type_id', '=', 4], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $c_universes = Universe:: where([ ['universe_type_id', '=', 2], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $b_universes = Universe:: where([ ['universe_type_id', '=', 1], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            // UNIVERSE:ENDS
            $pictures = Picture::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            $notes = Note::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            $source = Source::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->first();
            
            $pdf = PDF::loadView('print_view', [ 
                'bookInfo'=>$book_info,
                'structure'=>$structure,
                'str_chapters' => $str_chapters,
                'chapters'=>$chapters,
                'characters'=>$characters,
                'geographies'=>$geographies,
                'o_universes'=>$o_universes,
                't_universes'=>$t_universes,
                'ml_universes'=>$ml_universes,
                'm_universes'=>$m_universes,
                'c_universes'=>$c_universes,
                'b_universes'=>$b_universes,
                'pictures'=>$pictures,
                'notes'=>$notes,
                'source'=>$source,
            ]);
            return $pdf->download('BookWrite_Generated.pdf');
        }
        return back()->with('failed','To generate the PDF. Please add book first');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function previewBook()
    {
        $user_id = Auth::id();
        $book = Book::where('user_id',$user_id)->first();
        if($book != null){
            $book_info = Book::where('user_id',$user_id)->first();
            $structure = Structure::where('user_id',$user_id)->first();
            $str_chapters = StrChapter::where('user_id',$user_id)->orderBy('chapter_number')->orderBy('chapter_position')->get();
            $chapters = Chapter::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->orderBy('chapter_number')->get();
            $characters = Character::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            $geographies = Geography::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            // UNIVERSE:BEGINS
            $t_universes = Universe:: where([ ['universe_type_id', '=', 5], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $o_universes = Universe:: where([ ['universe_type_id', '=', 6], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $m_universes = Universe:: where([ ['universe_type_id', '=', 3], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $ml_universes = Universe:: where([ ['universe_type_id', '=', 4], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $c_universes = Universe:: where([ ['universe_type_id', '=', 2], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            $b_universes = Universe:: where([ ['universe_type_id', '=', 1], ['user_id', '=', $user_id], ['book_id', '=', $book->id], ])->get();
            // UNIVERSE:ENDS
            $pictures = Picture::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            $notes = Note::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->get();
            $source = Source::where([['user_id', '=', $user_id],['book_id', '=', $book->id]])->first();
            
            return view('print_view', [ 
                'bookInfo'=>$book_info,
                'structure'=>$structure,
                'str_chapters' => $str_chapters,
                'chapters'=>$chapters,
                'characters'=>$characters,
                'geographies'=>$geographies,
                'o_universes'=>$o_universes,
                't_universes'=>$t_universes,
                'ml_universes'=>$ml_universes,
                'm_universes'=>$m_universes,
                'c_universes'=>$c_universes,
                'b_universes'=>$b_universes,
                'pictures'=>$pictures,
                'notes'=>$notes,
                'source'=>$source,
            ]);
        }
    }
}
