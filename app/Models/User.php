<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Like;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function getByUser(int $limit_count = 5)
    {
        return $this->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function posts_user()
    {
        return $this->belongsToMany(Post::class);
    }
    
    
    
    
    
    
    
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'post_user', 'user_id', 'post_id')->withTimestamps();
    }

    public function like($postId)
    {
        $exist = $this->is_like($postId);

        if($exist){
            return false;
        }else{
            $this->likes()->attach($postId);
            return true;
        }
    }

    public function unlike($postId)
    {
        $exist = $this->is_like($postId);

        if($exist){
            $this->likes()->detach($postId);
            return true;
        }else{
            return false;
        }
    }

    public function is_like($postId)
    {
        return $this->likes()->where('post_id',$postId)->exists();
    }
    
    
    // public function index()
    // {
    //     $count_like_users = $post->like_users()->count();

    //     $data=[
    //           'count_like_users'=>$count_like_users,
    //           ];

    //     return view('detail',$data
    //     );
    //}




    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
