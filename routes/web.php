<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});


// Index
Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs /* or 'jobs' => Job::all()*/
    ]);
});

/* csrf - If not included will give 419 - Page Expired */

// Store
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

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {

    $job = Job::find(intval($id)); // Ensure $id is cast to an integer

    if (!$job) {
        abort(404, 'Job not found');
    }
    return view('jobs.show', ['job' => $job]);
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find(intval($id)); // Ensure $id is cast to an integer

    if (!$job) {
        abort(404, 'Job not found');
    }
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {

    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    // authorize (On hold...)

    // update the job
    $job = Job::findorFail($id); // Find or Abort - Kill the Event, IF the ID Doesn't Exist

    $job->title = request('title');
    $job->salary = request('salary');
    $job->save();

    /* or
     $job->update([
            'title' => request('title'),
             'salary' = request('salary')
        ])
     * */

    // redirect to the job page

    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {

    // authorize (On Hold...)
    // delete the job

    $job = Job::findOrFail($id);
    $job->delete();

    // redirect
    return redirect('/jobs');

});

Route::get('/contact', function () {
    return view('contact');
});
