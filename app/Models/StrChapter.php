<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrChapter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'chapter_type_id', 
        'chapter_number', 
        'chapter_position', 
        'chapter_title', 
        'chapter_location', 
        'chapter_characters', 
        'chapter_abstract', 
        'chapter_issues', 
        'book_id', 
        'user_id', 
    ];
}
