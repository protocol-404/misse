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


    public function article() {
        $this->belongsTo('tags');
    }

    public function artUser() {
        $this->hasOne('users');
    }
}
