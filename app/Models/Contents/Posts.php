<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = ['id']; 

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function violations()
    {
        return $this->hasMany(ViolationReports::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function members()
    {
        return $this->belongsTo('App\Models\Members\Members');
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

    public function epizodes()
    {
        return $this->hasMany(Episodes::class);
    }

    public function getEpisodesTime()
    {
       $strtotime = 0;
        foreach ($this->epizodes as $key => $epizode) {
         $strtotime +=   strtotime($epizode->duration);

        }
        return date('H:i:s', $strtotime);
    }
   


   
    public function setDescAttribute($value)
    {
        return $this->attributes['desc']= nl2br($value);
    }
    public function setOtheroninformationAttribute($value)
    {
        return $this->attributes['otheroninformation']= nl2br($value);
    }
}
