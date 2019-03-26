<?php

namespace App\Http\Controllers;
use App\comment;
use App\Like;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Gate;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function getIndex()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        $tags = Tag::all();

        return view('post.list', compact('posts', 'tags'));

    }

    public function showAdd()
    {
        $tags = Tag::all();

        return view('post.create', compact('tags'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        return view('post.listCT', compact('post', 'tags'));
    }

    public function update(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|min:6|max:200',
                'content' => 'required',
                'auth' => 'required',

            ]
        );
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->auth = $request->input('auth');
        $post->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $currentImg = $post->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $post->image = $path;
        }

        $post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        Session::flash('success', 'UPDATE SUCCESS');

        return redirect()->route('Post.list');

    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->comments()->delete();
        $post->likes()->delete();
        $post->delete();
        Session::flash('success', 'DELETE SUCCESS');
        return redirect()->route('Post.list');

    }

    public function editShow(Post $post)
    {
        $tags = Tag::all();

        return view('post.edit', compact('tags', 'post'));
    }

    public function edit(Request $request, Post $post)
    {

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->auth = $request->input('auth');
        if ($request->hasFile('image')) {
            $currentImg = $post->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $post->image = $path;
        }
        $post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        Session::flash('success', 'EDIT SUCCESS');

        return redirect()->route('Post.list');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {

            return redirect()->route('Post.list');

        }
        $posts = Post::where('title', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $tags = Tag::all();
        return view('post.list', compact('posts','tags'));


    }

    public function filterByTags(Request $request)
    {
        $tag = $request->input('tags');
        $allTags = Tag::find($tag);
        if ($allTags) {
            $posts = $allTags->posts()->paginate(10);
            $tags = Tag::all();

            return view('post.list', compact('posts', 'tags'));
        } else {
            return redirect()->route('Post.list');
        };
    }

    public function comment(Request $request, $postid)
    {
        $comment = new comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $postid;
        $comment->content = $request->input('content');
        $comment->save();
        return redirect()->route('Post.show', $postid);
    }

    public function like(Post $post){

        $like = Like::firstOrCreate(['post_id'=> $post->id,'user_id'=>auth()->user()->id]);
              return redirect()->back();
        }

}
