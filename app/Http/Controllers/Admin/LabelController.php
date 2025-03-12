<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        return view('admin.labels.index', [
//            'labels' => Label::query()->simplePaginate(10),
            'labels' => Label::query()->paginate(10),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Label $label)
    {
        //
    }

    public function edit(Label $label)
    {
        //
    }

    public function update(Request $request, Label $label)
    {
        //
    }

    public function destroy(Label $label)
    {
        //
    }
}
