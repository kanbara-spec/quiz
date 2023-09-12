<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use App\Models\Post;

class AnswerController extends Controller
{
    public function store(AnswerRequest $request, Answer $answer, Post $post)
    {
        $input = $request['answer'];
        $input['post_id']=$post->id;
        $answer->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
