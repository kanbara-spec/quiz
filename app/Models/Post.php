<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Comment;
use App\Models\Answer;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'question',
        'answer',
        'image_url',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function getByPost_comments(int $limit_count = 3)
    {
        return $this->comments()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    public function getByPost_answers(int $limit_count = 1)
    {
        return $this->answers()->with('post')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function like_users()
    {
        return $this->belongsToMany(User::class,'post_user','post_id','user_id')->withTimestamps();
    }
}
