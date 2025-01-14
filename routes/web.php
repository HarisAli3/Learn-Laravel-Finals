<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

/*Route::get('/', function () {
    $jobs = Job::all();

    dd($jobs[0]->title);
});*/

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find(intval($id)); // Ensure $id is cast to an integer

    if (!$job) {
        abort(404, 'Job not found');
    }
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
