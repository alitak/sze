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
            'labels' => Label::query()->withCount('albums')->paginate(4),
        ]);
    }


    public function show(Label $label)
    {
//        dd($label->albums()->where('title', 'Paranoid')->get());
        // $label->albums
        // $label->albums()

        return view('labels.show', [
            'title' => $label->name,
            'label' => $label,
            'albums' => $label->albums()->with('artist')->paginate(1),
        ]);
    }
}
