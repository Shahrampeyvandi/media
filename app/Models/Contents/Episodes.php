<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Episodes extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function post()
    {
        return $this->belongsTo(Posts::class,'posts_id');
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function members()
    {
        return $this->belongsTo('App\Models\Members\Members');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function languages()
    {
        return $this->belongsTo(Languages::class);
    }
    public function levels()
    {
        return $this->belongsTo(Levels::class);

    }
    public function subjects()
    {
        return $this->belongsTo(Subjects::class);
    }

    public function getEpisodesTime()
    {
        return $this->duration;
    }
   
}
