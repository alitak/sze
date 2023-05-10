<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;

class JobsController extends Controller
{
    public function __invoke()
    {
        return JobResource::collection(Job::all());
    }
}
