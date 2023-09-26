<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class PostController extends Controller
{
    // public function index(User $user)
    // {
    //   return view('posts.index')->with(['users' => $user->getByUser()]);
    // }
    
    // public function index(User $user)
    // {
    //     return view('posts.index')->with(['user' => $user->get()]);
    // }
    
    
    
    public function index()
    {
        return view('posts.index');
    }
    
    
    public function mypage()
    {
        return view('posts.mypage', ['user' => Auth::user()]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function create2()
    {
        return view('posts.create2');
    }
    
    public function create3()
    {
        return view('posts.create3');
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post'=> $post, 'posts' => $post->get()]);  
    }
    
    public function detail(Post $post)
    {
        return view('posts.detail')->with(['user' => Auth::user(), 'post'=> $post,
        'comments'=>$post->getByPost_comments(), 'answers'=>$post->getByPost_answers(), 'count_like_users' => $post->like_users()->count()]);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    // public function mypage()
    // {
    //     $posts = Post::where('user_id', \Auth::user()->id)->get();
        
    //     return view('mypage.index', ['posts' => $posts]);
    // }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts/mypage');
    }
    
    public function store(PostRequest $request, Post $post, User $user)
    {
        $input = $request['post'];
        if($request->file('image')){ 
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input['image_url'] = $image_url;
        }
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        return redirect('/');
    }
    
}