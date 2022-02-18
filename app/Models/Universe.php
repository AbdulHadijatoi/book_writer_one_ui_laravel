<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', 
        'name', 
        'description', 
        'origins_and_location', 
        'miscellaneous_information', 
        'rules_and_limits', 
        'content', 
        'technical_terms_jargons', 
        'book_id', 
        'user_id' 
    ];
}
