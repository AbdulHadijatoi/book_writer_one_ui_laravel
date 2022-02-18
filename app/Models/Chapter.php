<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'chapter_title',
        'chapter_type_id',
        'chapter_number',
        'chapter_position',
        'chapter_content',
        'book_id',
        'user_id'
    ];
}
