<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment, Post $post)
    {
        $input = $request['comment'];
        $input['post_id']=$post->id;
        $comment->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
