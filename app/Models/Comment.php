<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment_description',
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function replyComments(){
        return $this->hasMany(ReplyComment::class,'comment_id');
    }
}
