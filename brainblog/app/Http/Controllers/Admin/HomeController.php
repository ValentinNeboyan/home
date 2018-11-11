<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Review;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function news()
    {
        $newslist = News::query();
        return view('admin.layouts.news.index', [
            'newslist' => $newslist->paginate(10)
        ]);
    }


    public function posts()
    {
        $postslist = Post::query();
        return view('admin.layouts.posts.index',[
            'postslist'=>$postslist->paginate(10)
        ]);
    }

    public function reviews()
    {
        $reviewslist = Review::query();
        return view('admin.layouts.reviews.index',[
            'reviewslist'=>$reviewslist->paginate(10)
        ]);
    }
}