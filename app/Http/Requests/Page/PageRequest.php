<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'why_choose'                  => $this->get('why_choose'),
            'why_choose_subtitle'                  => $this->get('why_choose_subtitle'),
            'why_meta_description'                  =>  strip_tags($this->get('why_meta_description')),
            'why_apply'                  => $this->get('why_apply'),
            'why_apply_subtitle'                  => $this->get('why_apply_subtitle'),
            'content'                  => strip_tags($this->get('content')),
            'meta_description'      => $this->get('meta_description'),
            'seo'                  => $this->get('seo'),
            'image'                  => $this->get('image'),
            'featured_image'                  => $this->get('featured_image'),
            'is_published'       => $this->get('is_published') ? 1 : 0,
            'is_parent'       => $this->get('is_parent') ? 1 : 0,
        ];

        if ($this->has('publish')) {
            $data['is_published'] = true;
        }

        return $data;
    }
}
