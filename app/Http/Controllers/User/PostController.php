<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {


        // $search = $request->input('search');
        // $category_id = $request->input('category_id');
        // $post = (object) [

        //     'id' => 1,
        //     'name' => 'Lorem ipsum',
        //     'title' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid.',
        //     'category_id' => 1,

        // ];
        $posts = Post::query()->paginate(12);
        $options = [
            null => __('Все категории'),
            1 => __('Первая категории'),
            2 => __('Вторая категории'),
        ];

        // $posts = array_fill(0, 5, $post);
        // $posts = array_filter($posts, function ($post) use ($search, $category_id) {
        //     if ($search && !str_contains(strtolower($post->title), strtolower($search))) {
        //         return false;
        //     };
        //     if ($category_id  && $post->category_id != $category_id) {
        //         return false;
        //     };
        //     return true;
        // });
        //dd($data);
        return view('user.posts.index', compact('posts', 'options'));
    }
    public function show($post)
    {
        $post = (object) [

            'id' => 1,
            'name' => 'Lorem ipsum',
            'title' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid.',

        ];

        return view('user.posts.show', compact('post'));
    }
    public function create()
    {

        return view('user.posts.create');
    }
    public function store(Request $request)
    {
        //$title = $request->input('title');
        //$content = $request->input('content');

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
        ]);

        $post = Post::query()->create([
            'user_id' => User::query()->value('id'),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at'] ?? null),
            'published' => $validated['published'] ?? false,
        ]);


        dd($post);

        alert(__('Сохранено!'));
        return redirect()->route('user.posts.show', 123);
    }

    public function edit($post)
    {
        $post = (object) [

            'id' => 1,
            'name' => 'Lorem ipsum',
            'title' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid.',

        ];
        return view('user.posts.edit', compact('post'));
    }
    public function update(Request $request, $post)
    {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
        ]);

        $post = Post::query()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
            'published' => $validated['published'],
        ]);


        dd($post);
        return redirect()->back();
        //dd($title, $content);

    }
    public function delete($post)
    {
        return redirect()->route('user.posts', $post);
    }
}
