<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'meta_description'      => $this->get('meta_description'),
            'content'                  =>  strip_tags($this->get('content')),
            'image'                  => $this->get('image'),
            'is_published'       => $this->get('is_published') ? 1 : 0,
        ];

        if ($this->has('publish')) {
            $data['is_published'] = true;
        }

        return $data;
    }
}
