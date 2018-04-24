<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_title', 'blog_type', 'blog_content', 'user_id'
    ];
}
