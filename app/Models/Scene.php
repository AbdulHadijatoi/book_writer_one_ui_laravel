<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'scene_number', 
        'scene_location', 
        'scene_characters', 
        'scene_issues', 
        'scene_abstract', 
        'chapter_id', 
        'book_id', 
        'user_id' 
    ];

}
