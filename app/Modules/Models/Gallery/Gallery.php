<?php

namespace App\Modules\Models\Gallery;

use App\Modules\Models\Album\Album;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
    protected $path = 'uploads/gallery';

    protected $fillable = [
        'title',
        'album_id',
        'meta_description',
        'image',
        'url',
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




    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
