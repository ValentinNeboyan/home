<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'description',
        'user_id',
    ];

    public static $STATUSES = [
        'active' => 'Активен',
        'disabled' => 'Не активен',
        'deleted' => 'Удален',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeCurrent($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $exists = self::whereSlug(str_slug($model->title))->latest('id')->count();
            $model->slug = str_slug($model->title . ($exists > 0 ? '-2' : ''));
            $model->user_id = Auth::user()->id;
        });
    }
}
