<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostView;
use Doctrine\DBAL\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {

        $categories = Cache::remember('categories', Carbon::now()->addDays(3), function () {
            return Category::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        });

        return view('posts.index',
        [
            'categories' => $categories
        ]);
    }

    public function show(Post $post, Request $request)
    {

        $user = $request->user();
        PostView::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'post_id' => $post->id,
            'user_id' => $user?->id,
        ]);

        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }
}
