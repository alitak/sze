<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'latestBooks' => Book
                ::search(request()->term)
                ->take(4)
                ->latest()
                ->get(),
        ]);
    }
}
