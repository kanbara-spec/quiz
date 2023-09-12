<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Answer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id',
        'user_answer'
    ];
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
