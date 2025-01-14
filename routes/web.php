<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home' , [
        "title" => "Home", // $title , is accessible
        "name" => "Larry",
        "jobs" => [
            [
                'title' => 'Directory',
                'salary' => '$50,000'
            ],
            [
                'title' => 'Programmer',
                'salary' => '$10,000'
            ]
        ]
    ]);
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});
