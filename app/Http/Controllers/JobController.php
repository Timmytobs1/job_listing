<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index(){
        $jobs =Job::with('employer')->latest()->paginate(3);

        return view('jobs/index', [
            'jobs' => $jobs
        ]);
    }
    public function create(){
        return view('jobs/create');
    }
    public function show(Job $job){
        return view ('jobs.show' , ['job' => $job]);
    }
    public function store(){
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
    }
    public function edit(Job $job){
        Gate::define('edit-job', function (User $user, Job $job){
           return $job->employer->user->is($user);
        });

        if (Auth::guest()){
            return redirect('/login');
        }
        Gate::authorize('edit-job', $job);
        return view ('jobs.edit' , ['job' => $job]);
    }
    public function update(Job $job){
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect("/jobs/{$job->id}");

    }
    public function destroy(Job $job){
        $job->delete();

        return redirect('/jobs');
    }
}
