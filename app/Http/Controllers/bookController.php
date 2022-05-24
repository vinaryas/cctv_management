<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class bookController extends Controller
{
    public function index()
    {
        $books = books::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = $request->all();
        $book['uuid'] = (string)Uuid::generate();

        // dd($request->file('cover'));
        // dd(Storage::putFile('public/cctv_video', $request->file('cover')));

        if ($request->hasFile('cover')) {
            $book['cover'] = $request->cover->getClientOriginalName();
            $request->cover->storeAs('books', $book['cover']);
        }
        books::create($book);
        return redirect()->route('books.index');
    }

    public function download($uuid)
    {
        $book = books::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/books/' . $book->cover);
        return response()->download($pathToFile);
    }
}
