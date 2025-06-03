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


Route::get('/movie', function () use ($movies) {

return $movies;

});


Route::post('/movie', function () use ($movies) {


     return $movies;

});


Route::put('/movie/{id}', function ($id) use ($movies) {
    // $movies[$id]['title'] = request('title');
    // $movies[$id]['director'] = request('director');
    // $movies[$id]['year'] = request('year');
       
    return $movies;

});

Route::patch('/movie/{id}', function ($id) use ($movies) {
    $movies[$id]['title'] = request('title');
    $movies[$id]['director'] = request('director');
    $movies[$id]['year'] = request('year');
       
    return $movies;

});

Route::delete('/movie/{id}', function ($id) use ($movies) {
    unset($movies[$id]);
    return $movies;
});