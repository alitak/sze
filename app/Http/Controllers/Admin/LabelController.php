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
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('labels', 'public');
        }
        // TODO image resize
        Label::query()->create($validated);

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

        if ($request->has('removeImage')
            && $label->image
            && Storage::disk('public')->exists($label->image)
        ) {
            Storage::disk('public')->delete($label->image);
        }

        // TODO image resize
        if ($request->hasFile('image')) {
            if ($label->image && Storage::disk('public')->exists($label->image)) {
                Storage::disk('public')->delete($label->image);
            }

            $validated['image'] = $request->file('image')->store('labels', 'public');
        } elseif ($request->has('removeImage')) {
            $validated['image'] = null;
        }

        $label->update($validated);

        return redirect()->route('admin.labels.index')
            ->with('success', 'Label updated successfully.');
    }

    public function destroy(Label $label)
    {
        if ($label->image && Storage::disk('public')->exists($label->image)) {
            Storage::disk('public')->delete($label->image);
        }

        $label->delete();

        return redirect()->route('admin.labels.index')
            ->with('success', 'Label deleted successfully.');
    }
}
