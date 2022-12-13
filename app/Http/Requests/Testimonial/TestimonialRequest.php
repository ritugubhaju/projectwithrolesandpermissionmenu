<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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

    public function rules()
    {
        return [
            'category_id' => 'required',
            'title' => 'required',
        ];
    }

    public function data()
    {
        $data = [
            'category_id'               => $this->get('category_id'),
            'title'                  => $this->get('title'),
            'meta_description'      => $this->get('meta_description'),
            'content'                  =>strip_tags($this->get('content')),
            'image'                  => $this->get('image'),
            'is_published'       => $this->get('is_published') ? 1 : 0,
        ];

        if ($this->has('publish')) {
            $data['is_published'] = true;
        }

        return $data;
    }
}
