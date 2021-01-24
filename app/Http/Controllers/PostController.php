<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
       $post = Post::orderBy('id', 'DESC')->get();
       return view('index',['posts'=>$post]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     *
     */
    public function search(Request $request){
        $search = $request->get('search');
        $post = Post::where('title','like','%'.$search.'%')->orWhere('body','like','%'.$search.'%')->get();
        return view('index',['posts'=>$post]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('upload/blog_images');
        $image->move($destinationPath, $input['imagename']);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id= Auth::user()->id;
        $post->image = $input['imagename'];
        $post->save();
        return redirect()->route('posts');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {   dd($id);
        $post = Post::find($id);
        $post->delete();

    }

}
