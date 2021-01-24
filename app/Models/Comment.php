<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    use HasFactory;
}
