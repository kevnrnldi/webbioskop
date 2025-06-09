<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


    $movies = [];

   for($i = 0; $i < 10; $i++) {
    $movies[] = [
        'title' => 'Movie ' . $i,
        'director' => 'Director ' . $i,
        'year' => 2000 + $i
    ];
    }

Route::group(['middleware' => ['isAuth'], 'prefix' => 'movie', 'as' => 'movie.'], function () use ($movies) {
    
    Route::get('/', function () use ($movies) {
    return $movies;
    });


    Route::post('/', function () use ($movies) {
        return $movies;
    });


    Route::put('/{id}', function ($id) use ($movies) {
        // $movies[$id]['title'] = request('title');
        // $movies[$id]['director'] = request('director');
        // $movies[$id]['year'] = request('year');
        
        return $movies;

    });

    Route::patch('/{id}', function ($id) use ($movies) {
        $movies[$id]['title'] = request('title');
        $movies[$id]['director'] = request('director');
        $movies[$id]['year'] = request('year');
        
        return $movies;

    });

    Route::delete('/{id}', function ($id) use ($movies) {
        unset($movies[$id]);
        return $movies;
    });


    Route::get('/{id}', function ($id) use ($movies)
    {
        return $movies[$id];
    })->middleware( 'isMember');

});


Route::get('/pricing', function (){
    return "Silahkan daftar membership untuk membuka akses ke fitur premium";
});


Route::get('/login', function () {
    return "Silahkan login untuk mengakses fitur premium";
})->name('login');