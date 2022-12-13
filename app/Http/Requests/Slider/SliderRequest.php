<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $rules = [
            'title'=>'required',
            'image' => 'max:5000'
        ];

        return $rules;
    }

    public function data()
    {

        $data = [
            'title'                  => $this->get('title'),
            'content'   => strip_tags($this->get('content')),
            'image'   => $this->get('image'),
            'status' => ($this->get('status') ? $this->get('status') : '') == 'on' ? '1' : '0',
        ];
        return $data;
    }
}
