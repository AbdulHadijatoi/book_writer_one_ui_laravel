<?php

namespace Database\Seeders;

use App\Models\ChapterType;
use App\Models\Dictionary;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Questions;
use App\Models\UniverseType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SomeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      

        $universe_types = [
            ['universe_type' => 'Bestiary'],
            ['universe_type' => 'Civilization'],
            ['universe_type' => 'Magic'],
            ['universe_type' => 'Myths and Legends'],
            ['universe_type' => 'Technology'],
            ['universe_type' => 'Other']
        ];
        $chapter_types = [
            ['chapter_type' => 'Normal Chapter'],
            ['chapter_type' => 'Interlude'],
            ['chapter_type' => 'Prologue'],
            ['chapter_type' => 'Epilogue']
        ];

        UniverseType::insert($universe_types);
        ChapterType::insert($chapter_types);

    }
}



