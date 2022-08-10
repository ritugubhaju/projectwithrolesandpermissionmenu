<?php

namespace App\Modules\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = "pages";

    protected $path = 'uploads/page';
    protected $banner_path = 'uploads/banner_image';

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $appends = [
        'thumbnail_path', 'image_path', 'banner_path'
    ];

    protected $fillable = [
        'slug',
        'title',
        'meta_description',
        'content',
        'image',
        'banner_image',
        'url',
        'is_published',
        'is_primary',
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    public function scopePrimary($query, $type = true)
    {
        return $query->where('is_primary', $type);
    }

    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getThumbnailPathAttribute()
    {
        return $this->path . '/thumb/' . $this->image;
    }

    function getBannerPathAttribute()
    {
        if ($this->banner_image) {
            return $this->banner_path . '/' . $this->banner_image;
        } else {
            return null;
        }
    }
}
