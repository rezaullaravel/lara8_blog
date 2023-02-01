<?php

namespace App\Models;
use App\Models\Category;
use App\Models\User;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_title',
        'post_slug',
        'post_description',
        'post_image',
        'category',
        'user_id',
        'published_at',
    ];


    public function categories(){
        return $this->belongsTo(Category::class,'category');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag');
    }




}//end main
