<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public $fillable = ['title', 'summary', 'body', 'slug', 'thumbnail'];

    public $attributes = [];

    public function __constract($data)
    {
        $this->attributes = $data;
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes', 'post_id', 'user_id');
    }

    public function views()
    {
        return $this->hasMany('App\View');
    }

    public function setSlug(): void
    {
        $this->attributes['slug'] = str_slug($this->attributes['title']);
    }

    public function getAttributes(): array
    {
        $this->setSlug();

        return $this->attributes;
    }

    public function setTitleAttribute(string $title): void
    {
        $this->attributes['title'] = $title;

        $this->slug = str_slug($title);
    }
}
