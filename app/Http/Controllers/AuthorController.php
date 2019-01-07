<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function show($id)
    {
        return Author::find($id);
    }

    public function store(Request $request)
    {
        return Author::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return $author;
    }

    public function delete(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return 204;
    }
}
