<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Company;
use App\Models\Job;

class JobsController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Job::query()->orderBy('name')->with(['company'])->get(),
        ]);
    }

    public function create()
    {
        return view('jobs.create', [
            'companies' => Company::query()->orderBy('name')->get(),
        ]);
    }

    public function store(JobRequest $request)
    {
//        $validated = $request->validated();
//
//        $job = new Job();
//        $job->company_id = $validated['company_id'];
//        $job->name = $validated['name'];
//        $job->salary = $validated['salary'];
//        $job->save();

        Job::query()->create($request->validated());

        return redirect()->route('jobs.index')->with([
            'message' => 'Job created successfully',
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'companies' => Company::query()->orderBy('name')->get(),
            'job' => $job
        ]);
    }

    public function update(JobRequest $request, Job $job)
    {
        $job->update($request->validated());

        return redirect()->route('jobs.index')->with([
            'message' => 'Job updated successfully',
        ]);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with([
            'message' => 'Job deleted successfully',
        ]);
    }
}
