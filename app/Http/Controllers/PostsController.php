<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;
use App\Models\PostMeta;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * This defines the various routes requiring authentication
     *
     * Customizable if any other middeware is should be added.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = DB::table('posts')->get();

        // dd($post);

        // return view('blog.index')->with('posts', $post);
        // return view('blog.index', compact('posts'));
        // return view('blog.index', [
        //     'posts' => $posts,
        // ]);

        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);

        // dd($posts);

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        // dd($request->all());
        $request->validated();
        /** For public function store(Request $request)
         * $request->validate([
            'title' => 'required|max:255|unique:posts,title,'.$id,
            'excerpt' => 'required',
            'body' => 'required',
            'image_path' => ['mimes:jpg,png,jpeg', 'max:5048'],
            // 'is_published' => '',
            'min_to_read' => 'min:0|max:10',
         * ]);
         */

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_published === 'on',
            'min_to_read' => $request->min_to_read,
        ]);

        $post->meta()->create([
            'post_id' => $post->id,
            'meta_description' => $request->meta_dexscription,
            'meta_keywords' => $request->meta_keywords,
            'meta_robots' => $request->meta_robots,
        ]);

        return redirect(route('blog.index'))->with('message', 'Post has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        // dd($post->meta);

        return view('blog.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();

        return view('blog.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        // dd($request->all());
        $request->validated();
        /** For public function update(Request $request, $id)
         * $request->validate([
            'title' => 'required|max:255|unique:posts,title,'.$id,
            'excerpt' => 'required',
            'body' => 'required',
            'image_path' => ['mimes:jpg,png,jpeg', 'max:5048'],
            // 'is_published' => '',
            'min_to_read' => 'min:0|max:10',
         * ]);
         */

        Post::where('id', $id)->update($request->except([
            '_token',
            '_method',
        ]));

        return redirect(route('blog.index'))->with('message', 'Post has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect(Route('blog.index'))->with('message', 'Post has been deleted.');
    }

    public function storeImage($request)
    {
        $newImageName = uniqid() . '_' . $request->title . '.' . $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);
    }
}
