<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_name', 
        'l_name', 
        'gender', 
        'age', 
        'physical_description', 
        'summery', 
        'skills', 
        'history', 
        'evolution', 
        'motivation', 
        'additional_information',
        'book_id',
        'user_id'
    ];
}
