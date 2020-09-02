<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        //        dd(request()->only('company_id'));
        DB::enableQueryLog();
        $categorys = Category::orderBy('name')->pluck('name', 'id')->prepend('All Category', '');
        $posts = Post::latestTitle()->paginate(10);
        return view('posts.index', compact('posts', 'categorys'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post')); // ['contact' => $contact]
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();

        return back()->with('message', "Contact has been deleted successfully");
    }
}
