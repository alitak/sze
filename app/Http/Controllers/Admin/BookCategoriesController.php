<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookCategoryRequest;
use App\Http\Requests\UpdateBookCategoryRequest;
use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BookCategoriesController extends Controller
{
    public function index(): View
    {
        return view('book-categories.index', [
                'bookCategories' => BookCategory::all(),
            ]
        );
    }

    public function create(): View
    {
        return view('book-categories.edit');
    }

    public function store(StoreBookCategoryRequest $request): RedirectResponse
    {
        BookCategory::query()->create($request->validated());

        // visszairányítás
        return redirect()->route('book-categories.index')->with('success', 'Sikeres mentés');
    }

    public function show(BookCategory $bookCategory): View
    {
        return view('book-categories.show', [
            'bookCategory' => $bookCategory,
        ]);
    }

    public function edit(BookCategory $bookCategory)
    {
        return view('book-categories.edit', [
            'bookCategory' => $bookCategory,
        ]);
    }

    public function update(UpdateBookCategoryRequest $request, BookCategory $bookCategory)
    {
        $bookCategory->update($request->validated());

        // visszairányítás
        return redirect()->route('book-categories.index')->with('success', 'Sikeres mentés');
    }

    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();

        return redirect()->route('book-categories.index')->with('success', 'Sikeres törlés');
    }
}
