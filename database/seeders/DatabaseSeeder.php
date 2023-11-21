<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    

    
    public function run(): void
    {
        User::factory()->create([
            'email' => 'remlevy@hotmail.fr'
        ]);

        User::factory()->create([
            'email' => 'remlevy@gmail.com'
        ]);

        // SANS API
        // Category::factory(9)->create();
        // Category::factory()->create(['name' => 'Action']);

        // Movie::factory(100)->create(function () {
        // Ici c'est comme une boucle
        //     return [
        //         'category_id' => rand(1, 10),
        //     ];
        // });

        // Avec API
        $apiKey = '1acc688a333a713673ba5711f8f671d0';
        $baseUrl = 'https://api.themoviedb.org/3';

        // Catégories
        // On fait une requête sur une API
        // withoutVerifying() -> Désactiver le HTTPS sous Windows
        $genres = Http::withoutVerifying()
            ->get($baseUrl . '/genre/movie/list?language=fr-FR&api_key=' . $apiKey)->json('genres');
        // genres est un index de l'API

        Category::factory()->createMany($genres);

        // Films
        $movies = Http::withoutVerifying()
            ->get($baseUrl . '/movie/now_playing?language=fr-FR&api_key=' . $apiKey)->json('results');


        foreach ($movies as $movie) {
            // On fait une requête sur l'API pour chaque film afin d'avoir plus de détails
            $movie = Http::withoutVerifying()
                ->get($baseUrl . '/movie/' . $movie['id'] . '?language=fr-FR&append_to_response=videos&api_key=' . $apiKey)
                ->json();

            Movie::factory()->create([
                'title' => $movie['title'],
                'synopsis' => $movie['overview'],
                'duration' => $movie['runtime'],
                'cover' => 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'],
                'released_at' => $movie['release_date'],
                'youtube' => $movie['videos']['results'][0]['key'] ?? null,
                'category_id' => $movie['genres'][0]['id'] ?? null,
                'user_id' => User::all()->random(),
            ]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
