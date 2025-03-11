<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'tag_id',
        'user_id'
    ];

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
