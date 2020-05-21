<?php

namespace App\Models\Contents;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = ['id']; 
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
    
        $sum = [ 'h'=>0,'m'=>0,'s'=>0 ];

        foreach ($this->epizodes as $key => $epizode) {
         list($h,$m,$s) = explode(':',$epizode->duration);
         $sum['h'] += $h;
         $sum['m'] += $m;
         $sum['s'] += $s;

        }
        $sum['m'] += floor($sum['s']/60);
$sum['h'] += floor($sum['m']/60);
$sum['s'] = $sum['s']%60;
$sum['m'] = $sum['m']%60;

      
        return implode(':',$sum);
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
