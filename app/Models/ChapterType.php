<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'chapter_type'
    ];

    public function str_chapter(){
        return $this->hasMany(StrChapter::class);
    }
    
    public function chapter(){
        return $this->hasMany(Chapter::class);
    }
}
