<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
//        dd(Book::query()
//            ->take(4)
//            ->latest()
//            ->get()->toArray());
//            'latestBooks' => DB::raw('SELECT * FROM....')
        return view('home', [
            'latestBooks' => Book::query()
//                ->with('category')
                ->take(4)
//                ->orderByDesc('created_at')
                ->latest()
                ->get(),
        ]);
    }
}
