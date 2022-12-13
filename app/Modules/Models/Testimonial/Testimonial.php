<?php

namespace App\Modules\Models\Testimonial;

use App\Modules\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Testimonial extends Model
{
    use Sluggable;

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $path = 'uploads/testimonial';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'meta_description',
        'content',
        'image',
        'is_published'
    ];


    /**
     * The attributes that should be typecast into boolean.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    protected $appends = [
        'thumbnail_path', 'image_path'
    ];
    /**
     * Get the route key for the model.
     *
     * @return string
     */

    /**
     * Set the title attribute and the slug.
     *
     * @param string $value
     */


    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */


    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getThumbnailPathAttribute()
    {
        return $this->path . '/thumb/' . $this->image;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
