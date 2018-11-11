<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Review;
use App\Models\Tag;



class ReviewsController extends Controller
{
    public function __construct()
    {
        if (!in_array(app('router')->currentRouteName(), ['app.reviews.index', 'app.reviews.show']) && !auth()->check()) {
            $this->middleware('auth');
        }
    }

    public function index()
    {
        $reviewslist = Review::query();



        if (request()->filled('author')) {
            $reviewslist = $reviewslist->where('user_id', request()->author);
        }

        return view('app.reviews.index', [
            'reviewslist' => $reviewslist->paginate(3),
        ]);
    }

    public function create()
    {
        return view('app.reviews.create');
    }

    public function store()
    {


        $review = Review::create(request()->all());


        return redirect()->route('app.reviews.show', $review);
    }

    public function show(Review $review)
    {
        return view('app.reviews.show', compact('review'));
    }

    public function destroy(Review $review)
    {
        $this->checkUser($review);

        $review->delete();

        return redirect()->route('app.reviews.index');
    }

    public function addComment(Request $request, Review $review)
    {
        $validated = $request->validate([
            'message' => 'required|min:5',
            'user_id' => 'required'
        ]);

        $comment = $review->comments()->create($validated);

        if (auth()->user()->id === $request->user_id) {
            $comment->update(['approved' => 1]);
        }

        return back();
    }

    private function checkUser(Review $review) {
        if ($review->user_id !== auth()->user()->id) {
            return back();
        }
    }
}
