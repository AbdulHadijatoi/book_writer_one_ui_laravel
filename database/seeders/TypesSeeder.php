<?php

namespace Database\Seeders;

use App\Models\ChapterType;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Questions;
use App\Models\UniverseType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UniverseType::truncate();
        ChapterType::truncate();
        User::truncate();

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
        $users = [
            [
            'email' => 'test@gmail.com',
            'password' => Hash::make('11111111'),
            ]
        ];

        UniverseType::insert($universe_types);
        ChapterType::insert($chapter_types);
        User::insert($users);

    }
}
