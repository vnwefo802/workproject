<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::findOrFail(1);
        $tag = Tag::findOrFail(1);
        $Categories = Category::findOrFail(1);
        return view('admin_dashboard.index',compact('post', 'tag', 'Categories'));
    }
}
