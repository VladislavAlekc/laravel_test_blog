<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        /**
         * @var Post $post
         */

        // $post = (object) [

        //     'id' => 1,
        //     'name' => 'Lorem ipsum',
        //     'title' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid.',
        //     'category_id' => 1,
        // ];

        $options = [
            null => __('Все категории'),
            1 => __('Первая категории'),
            2 => __('Вторая категории'),
        ];

        $validated = $request->validate([
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tags' => ['nullable', 'string', 'max:10'],
        ]);

        $limit = $validated['limit'] ?? 24;
        $page = $validated['page'] ?? 1;
        $offset = $limit * $page;

        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }
        if ($fromDate = $validated['from_date'] ?? null) {

            $query->where('published_at', '>=', new Carbon($fromDate));
        }
        if ($toDate = $validated['to_date'] ?? null) {

            $query->where('published_at', '<=', new Carbon($toDate));
        }
        if ($tags = $validated['tags'] ?? null) {

            $query->whereJsonContains('tags', $tags);
        }


        $posts = $query->latest('published_at')
            ->paginate($limit);


        // $posts = Post::query()
        //     ->limit($offset)
        //     ->get(['id', 'title',  'published_at']);


        // $posts = Post::query()
        //     ->when(
        //         $validated['search'] ?? null,
        //         function (Builder $query, string $search) {
        //             $query->where('title', 'like', "%{$search}%");
        //         }
        //     )
        //     ->latest('published_at')
        //     ->paginate($limit);

        // $posts = Post::query()
        //     ->where('published', false)
        //     ->paginate(12);

        //dd($posts);

        // $search = $request->input('search');
        // $category_id = $request->input('category_id');

        //$posts = array_fill(0, 10, $post);

        // $posts = array_filter($posts, function ($post) use ($search, $category_id) {
        //     if ($search && !str_contains(strtolower($post->title), strtolower($search))) {
        //         return false;
        //     };
        //     if ($category_id  && $post->category_id != $category_id) {
        //         return false;
        //     };
        //     return true;
        // });

        return view('pages.blog', compact('posts', 'options'));

        //
    }


    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post) //  так он дергает пост из БД
    {
        // $post = cache()->remember("posts.{$post}", now()->addHour(), function () use ($post) {
        //     info('test');
        //     return Post::query()->findOrFail($post);
        // });  Сохраняет в кеш, чтоб постоянно не дергать с БД
        //$post = cache(["posts" => $post], now()->addHour());
        // $post = (object) [

        //     'id' => 1,
        //     'name' => 'Lorem ipsum',
        //     'title' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, aliquid.',

        // ];

        //dd($post);
        return view('pages.show',  compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
