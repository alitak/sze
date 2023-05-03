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
        $jobs = Job::query()
            ->orderBy('name')
            ->with(['company'])
            ->when(
                auth()->user()->is_company_admin,
                function ($query) {
                    $query->where('company_id', auth()->user()->company_id);
                })
            ->get();

        return view('jobs.index', [
            'jobs' => $jobs,
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
        abort_unless(auth()->user()->company_id == $job->company_id, 404);

        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function edit(Job $job)
    {
        abort_unless(
            auth()->user()->is_admin ||
            auth()->user()->company_id == $job->company_id
            , 404);
//        abort_if(auth()->user()->company_id != $job->company_id, 404);

//        if($job->company_id != auth()->user()->company_id) {
//            abort(404);
//        }

        return view('jobs.edit', [
            'companies' => Company::query()->orderBy('name')->get(),
            'job' => $job
        ]);
    }

    public function update(JobRequest $request, Job $job)
    {
        abort_unless(
            auth()->user()->is_admin ||
            auth()->user()->company_id == $job->company_id
            , 404);

        $job->update($request->validated());

        return redirect()->route('jobs.index')->with([
            'message' => 'Job updated successfully',
        ]);
    }

    public function destroy(Job $job)
    {
        abort_unless(
            auth()->user()->is_admin ||
            auth()->user()->company_id == $job->company_id
            , 404);

        $job->delete();

        return redirect()->route('jobs.index')->with([
            'message' => 'Job deleted successfully',
        ]);
    }
}
