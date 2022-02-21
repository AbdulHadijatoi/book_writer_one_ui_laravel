<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Universe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
