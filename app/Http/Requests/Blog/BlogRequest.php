<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required',
        ];
    }

    public function data()
    {
        $data = [
            'title'                  => $this->get('title'),
            'image'                  => $this->get('image'),
            'date'               => $this->get('date'),
            'meta_description'      => $this->get('meta_description'),
            'content'                  =>  strip_tags($this->get('content')),
            'is_published'       => $this->get('is_published') ? 1 : 0,
        ];

        if ($this->has('publish')) {
            $data['is_published'] = true;
        }

        return $data;
    }
}
