<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        $posts= Post::paginate(5);
        $tags = Tag::all();
        return view('showpost.list',compact('posts','tags'));
    }

    public function show(Post $post) {
        return view('showpost.showpost', compact('post'));
    }
    public function filterByTags(Request $request)
    {
        $tag = $request->input('tags');
        $allTags = Tag::find($tag);
        if ($allTags) {
            $posts = $allTags->posts()->paginate(10);
            $tags = Tag::all();

            return view('showpost.list', compact('posts', 'tags'));
        } else {
            return redirect()->route('guest.index');
        };
    }
}
