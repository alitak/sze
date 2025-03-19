<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LabelRequest;
use App\Models\Label;
use Illuminate\Support\Facades\Storage;

class LabelController extends Controller
{
    public function index()
    {
//        abort_if(!auth()->check() || auth()->user()->is_admin !== 1, 404);

        return view('admin.labels.index', [
//            'labels' => Label::query()->simplePaginate(10),
            'labels' => Label::query()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.labels.create');
    }

    public function store(LabelRequest $request)
    {
        Label::query()->create($request->validated());

        return redirect()->route('admin.labels.index')
            ->with('success', 'Label created successfully.');
    }

    public function show(Label $label)
    {
        return view('admin.labels.show', [
            'label' => $label,
        ]);
    }

    public function edit(Label $label)
    {
        // php artisan storage:link
        return view('admin.labels.edit', [
            'label' => $label,
        ]);
    }

    public function update(LabelRequest $request, Label $label)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('labels', 'public');
            $validated['image'] = $image;
        }

        $label->update($validated);

        return redirect()->route('admin.labels.index')
            ->with('success', 'Label updated successfully.');
    }

    public function destroy(Label $label)
    {
        $label->delete();

        return redirect()->route('admin.labels.index')
            ->with('success', 'Label deleted successfully.');
    }
}
