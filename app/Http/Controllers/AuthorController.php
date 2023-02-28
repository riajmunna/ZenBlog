<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public $author;
    public function index()
    {
        return view('admin.author.author',[
            'authors' => Author::all(),
        ]);
    }

    public function addAuthor(Request $request)
    {
        Author::saveAuthor($request);
        return back();
    }

    public function authorUpdate($id)
    {
        $this->author = Author::find($id);
        return view('admin.author.author-update',[
            'authors' => $this->author,
        ]);
    }

    public function authorUpdateForm(Request $request)
    {
        $this->author = Author::find($request->a_id);
        $this->author->author_name = $request->author_name;
        $this->author->save();
        return redirect(route('author'));
    }

    public function deleteAuthor(Request $request)
    {
        $this->author = Author::find($request->author_id);
        $this->author->delete();
        return back();
    }
}
