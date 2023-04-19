<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home.index', [
//            'jobs' => Job::query()->with(['company'])->get(),
            'jobs' => Job::query()->get()->load(['company']),
        ]);
    }
}
