<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        return view('labels.index', [
            'title' => 'Labels',
            'labels' => Label::query()->withCount('albums')->get(),
        ]);
    }


    public function show(Label $label)
    {
    }
}
