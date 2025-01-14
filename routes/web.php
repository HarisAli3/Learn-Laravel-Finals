<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs /* or 'jobs' => Job::all()*/
    ]);
});

/* csrf - If not included will give 419 - Page Expired */
Route::post('/jobs', function () {

    // validation

    /* https://laravel.com/docs/11.x/validation */

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);


    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find(intval($id)); // Ensure $id is cast to an integer

    if (!$job) {
        abort(404, 'Job not found');
    }
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
