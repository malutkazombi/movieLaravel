<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * foldersTable用テストデータ
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
            ]
        );

        $genres = ['action', 'comedy', 'drama', 'horror', 'sci-fi', 'thriller', 'romance', 'animation'];

        foreach ($genres as $genre) {

            DB::table('movies')->insert([
                'title' => $genre,
                'genre' => $genre,
                'release_year' => 1997,
                'image' => null,
                'rating' => 0,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }
    }
}
