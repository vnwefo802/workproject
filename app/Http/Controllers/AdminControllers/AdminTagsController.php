<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tag;

class AdminTagsController extends Controller
{


    private $rules = [
        'name' => 'required|min:3|max:30',
    ];

    public function index()
    {
        return view('admin_dashboard.tags.index', [
            'tags' => Tag::with('posts')->paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin_dashboard.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        // $validated['user_id'] = auth()->id();
        Tag::create($validated);

        return redirect()->route('admin.tags.create')->with('success', 'Category has been Created.');
    }


    public function show(Tag $tag)
    {
        return view('admin_dashboard.tags.show', [
            'tag' => $tag
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag has been Deleted.');
    }
}
