<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $advertisements = Advertisement::orderBy('created_at', 'desc')->take(3)->get();
        return view('posts.index')->with('posts', $posts)->with('advertisements', $advertisements);
    }
    
    public function show($id) {
        $post = Post::where('id', $id)->first();
        $likes = DB::table('posts_users')->where('post_id', '=', $id)->get();
        $likes = count($likes);
        $comment = DB::table('comments_posts')->where('post_id', '=', $id)->get();
        $comments = $comment;
        $comment = count($comment);        

        $me = DB::table('posts_users')->where('user_id', '=', auth()->id())->where('post_id', '=', $id)->first();
        if($me == null) {
            $me = 0;
        }
        return view('posts.show')
            ->with('post', $post)
            ->with('likes', $likes)
            ->with('me', $me)
            ->with('comment', $comment)
            ->with('comments', $comments);
    }

    public function search(Request $request) {
        $searchs = Post::where('title', 'like', '%' . $request->input('query') .'%')->take(3)->get();
        $advertisements = Advertisement::orderBy('created_at', 'desc')->take(3)->get();
        return view('posts.search')->with('searchs', $searchs)->with('advertisements', $advertisements);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => 'required',
            'url_img' => 'file|mimes:png,jpg,jpeg|max:204800'
        ]);

        $formFields['user_id'] = auth()->id();

        if($request->hasFile('url_img')) {
            $formFields['url_img'] = $request->file('url_img')->store('images', 'public'); 
        }

        Post::create($formFields);

        return redirect('/')->with('message', 'Post created successfully');

    }

    public function edit($id) {
        $post = Post::where('id', $id)->first();
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request) {
        
        $post = Post::where('id', $request->input('id'))->first();
        $formFields = $request->validate([
            'title' => ['required'],
            'description' => 'required',
            'url_img' => 'file|mimes:png,jpg,jpeg|max:204800',
        ]);

        if($request->hasFile('url_img')) {
            $formFields['url_img'] = $request->file('url_img')->store('images', 'public'); 
        }

        $post->update($formFields);

        return redirect('/')->with('message', 'Post updated successfully');

    }

    public function delete($id) {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect('/')->with('message', 'Post deleted successfully!');
    }

    public function like($id) {
        
        $me = DB::table('posts_users')->where('user_id', '=', auth()->id())->where('post_id', '=', $id)->get();
        if(count($me) == 0) {    
            DB::insert('insert into posts_users (user_id, post_id) values (?, ?)', [auth()->id(), $id]);
        }
        else {
            DB::table('posts_users')->where('user_id', auth()->id())->where('post_id', '=', $id)->delete();
        }
        
        return redirect()->back();

    }

    public function comment($id, Request $request) {
        
        $user_id = auth()->id();
        $post_id = $id;        
        $formFields = $request->validate([
            'comment' => ['required']
        ]);
        $comment = $request->input('comment');
        
        DB::insert('insert into comments_posts (user_id, post_id, comment, created_at) values (?, ?, ?, ?)', [$user_id, $post_id, $comment, now()]);
        return redirect()->back();

    }
}
