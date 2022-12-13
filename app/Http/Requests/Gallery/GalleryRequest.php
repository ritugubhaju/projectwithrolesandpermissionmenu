<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'album_id' => 'required'
        ];
    }

    public function data()
    {
        $data = [
            'album_id'               => $this->get('album_id'),
            'title'                  => $this->get('title'),
            'meta_description'      =>  preg_replace("/^<p.*?>/", "",$this->get('meta_description')),
            'url'                  => $this->get('url'),
            'image'                  => $this->get('image'),
            'is_published'       => $this->get('is_published') ? 1 : 0,
        ];

        if ($this->has('publish')) {
            $data['is_published'] = true;
        }

        return $data;
    }
}
