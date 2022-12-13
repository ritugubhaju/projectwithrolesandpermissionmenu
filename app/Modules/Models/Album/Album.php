<?php

namespace App\Modules\Models\Album;

use App\Modules\Models\Gallery\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Album extends Model
{
    use Sluggable;

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = array('title','slug','is_published',
    );

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function albums()
    {
        return $this->hasMany(Gallery::class,'album_id','id')->orderBy('created_at', 'desc');
    }

}
