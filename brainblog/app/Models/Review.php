<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title',
        'description',
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model->user_id = auth()->user()->getKey();
        });

        self::addGlobalScope('ordered', function ($builder) {
            $builder->latest('updated_at');
        });
    }

    public function medias(){

        return $this->morphToMany(Media::class, 'mediable');
    }
}
