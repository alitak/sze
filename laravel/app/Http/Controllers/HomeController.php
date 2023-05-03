<?php

namespace App\Http\Controllers;

use App\Models\Job;

class HomeController extends Controller
{
    public function __invoke()//: View
    {
        $search = request()->search;
        $order = in_array(request()->order, ['asc', 'desc']) ? request()->order : 'asc';

        $jobs = Job::query()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->orWhereHas('company', fn ($query) => $query->where('name', 'LIKE', '%'.$search.'%'))
            ->orderBy('name', $order)
            ->get()
            ->load([
                'company',
                'tags',
            ]);

        return view('home.index', [
//            'jobs' => Job::query()->with(['company'])->get(),
            'jobs' => $jobs,
            'search' => $search,
        ]);
    }
}
