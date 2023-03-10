<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'user_id'];
    use HasFactory;

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function scopeLatest(Builder $query){
        return $query->orderBy(static::CREATED_AT,'desc');
     }

    public function scopeMostCommentedPosts(Builder $query){
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }
}
