<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;



class PostsController extends Controller
{
    public function __construct()
    {
        if (!in_array(app('router')->currentRouteName(), ['app.posts.index', 'app.posts.show']) && !auth()->check()) {
            $this->middleware('auth');
        }
    }

    public function index()
    {
        $postslist = Post::query();

        if (request()->filled('tag')) {
            $postslist = $postslist->whereHas('tags', function ($q) {
                $q->where('tag_id', request('tag'));
            });
        }

        if (request()->filled('author')) {
           $postslist = $postslist->where('user_id', request()->author);
    }

        return view('app.posts.index', [
            'postslist' => $postslist->paginate(3),
        ]);
    }

    public function create()
    {
        return view('app.posts.create', [
            'categories' => Category::orderBy('title')->get(),
            'tags' => Tag::orderBy('title')->get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::create(request()->all());

        $post->tags()->attach(request('tags'));

        return redirect()->route('app.posts.show',$post);
    }

    public function show(Post $post)
    {
        return view('app.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->checkUser($post);

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('app.posts.index');
    }

    public function addComment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'message' => 'required|min:5',
            'user_id' => 'required'
        ]);

        $comment = $post->comments()->create($validated);

        if (auth()->user()->id === $request->user_id) {
            $comment->update(['approved' => 1]);
        }

        return back();
    }

    private function checkUser(Post $post) {
        if ($post->user_id !== auth()->user()->id) {
            return back();
        }
    }

}
