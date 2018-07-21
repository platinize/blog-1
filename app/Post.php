<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public $fillable = ['title', 'thumbnail', 'summary', 'body'];

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes', 'user_id', 'post_id');
    }

    public function views()
    {
        return $this->hasMany('App\View');
    }

    public function setTitleAttribute(string $title): void
    {
        $this->attributes['title'] = $title;

        $this->slug = str_slug($title);

    }
}
